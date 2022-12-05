<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Profile;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\AppliedJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeeaccount'])->except('searchJob');
    }

    public function home()
    {
        $employee = User::with([
            'profile',
            'educations',
            'experience'
        ])->where('id', auth()->id())->firstOrFail();
        return view('employee.profile.home', [
            'employee' => $employee
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!Hash::check($request->current_password, $user->password)) {
            // dd('false');
            session::flash('wrongpassword', 'The password is incorrect');
            return redirect()->back();
        }

        $request->validate([
            'current_password' => 'bail|required|max:15',
            'password' => 'bail|required|min:6|max:15|confirmed'
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        // $user->update(['password', Hash::make($request->password)]);
        return redirect()->back()->with('success', 'Your password has been changed successfully.');
    }

    public function checkPasswordValidation(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The password is incorrect'
            ]);
        }

        $request->validate([
            'current_password' => 'bail|required|max:129',
            'password' => 'bail|required|min:8|max:129|confirmed'
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function searchJob(Request $request)
    {

        $search_keyword = $request->get('search_keyword');
        $search_location = $request->get('search_location');
        $job_type = $request->get('job_type');
        $industry = $request->get('industry');
        $skill = $request->get('skill');
        $min_salary = $request->get('min_salary');
        $max_salary = $request->get('max_salary');
        $min_exp = $request->get('min_exp');
        $max_exp = $request->get('max_exp');
        $sort_by = $request->get('sort_by');
        $show_favorite_job = $request->get('show_favorite_job');

        $jobs = Vacancy::query();

        $jobs->when($search_keyword, function (Builder $builder, $value) {
            return $builder->where(function (Builder $builder) use ($value) {
                return $builder->where(function (Builder $builder) use ($value) {
                    return $builder->where('job_title', 'like', "%{$value}%")
                        ->orWhere('job_role', 'like', "%{$value}%")
                        ->orWhere('department', 'like', "%{$value}%");
                });
            });
        });
        $jobs->when($search_location, function (Builder $builder, $value) {
            return $builder->where(function (Builder $builder) use ($value) {
                return $builder->where(function (Builder $builder) use ($value) {
                    return $builder->where('location', 'like', "%{$value}%")
                        ->orWhereHas('countrydetail', function (Builder $builder) use ($value) {
                            return $builder->where('name', 'like', "%{$value}%");
                        })
                        ->orWhereHas('statedetail', function (Builder $builder) use ($value) {
                            return $builder->where('name', 'like', "%{$value}%");
                        })
                        ->orWhereHas('citydetail', function (Builder $builder) use ($value) {
                            return $builder->where('city', 'like', "%{$value}%");
                        });
                });
            });
        });
        $jobs->when($job_type, function (Builder $builder, $value) {
            return $builder->whereIn('job_type', $value);
        });
        $jobs->when($industry, function (Builder $builder, $value) {
            return $builder->whereHas('user.profile', function (Builder $builder) use ($value) {
                return $builder->whereIn('industry_type_id', $value);
            });
        });
        $jobs->when($show_favorite_job, function (Builder $builder) {
            return $builder->whereHas('favoriteJobs', function(Builder $builder){
                return $builder->where('user_id', auth()->id());
            });
        });
        $jobs->when($skill, function (Builder $builder, $value) {
            return $builder->whereRaw("FIND_IN_SET(?, skills)", $value);
        });
        $jobs->when($sort_by == 'newest', function (Builder $builder, $value) {
            return $builder->orderBy('created_at', 'DESC');
        });
        $jobs->when($sort_by == 'highest_salary', function (Builder $builder, $value) {
            return $builder->orderByRaw('cast(salary_offer as decimal(10,2)) DESC');
        });
        $jobs->when($sort_by == 'lowest_experience', function (Builder $builder, $value) {
            return $builder->orderByRaw('cast(min_exp as decimal(10,2)) ASC');
        });
        if($request->has(['min_salary', 'max_salary'])){
            $jobs->whereRaw('cast(salary_offer as decimal(10,2)) >= '.$min_salary.' AND cast(salary_offer as decimal(10,2)) <= ' .$max_salary);
        }

        if($request->has(['min_exp', 'max_exp'])){
            $jobs->whereRaw('cast(min_exp as decimal(10,2)) >= '.$min_exp.' AND cast(min_exp as decimal(10,2)) <= ' .$max_exp);
        }

        $jobs = $jobs->paginate(config('setting.pagination_no'));

        $salaries = Vacancy::selectRaw("MIN(salary_offer) AS MinSalary, MAX(salary_offer) AS MaxSalary")->first();
        $industry = MasterAttribute::where('master_attribute_category_id', '4')->get();
        $job_types = MasterAttribute::whereHas('masterCategory', function ($q) {
            $q->where('name', 'Job Type');
        })->get();
        $applied_jobs = AppliedJob::where('user_id', optional(auth()->user())->id)->pluck('vacancy_id')->toArray();
        $skills = JobSkill::all();

        return view('employee.profile.search', compact('salaries', 'job_types', 'jobs', 'industry', 'applied_jobs', 'skills'));
    }

    /* edit profile */

    public function editProfile(Request $request)
    {
        $employee = User::with('profile')->where('id', auth()->user()->id)->firstOrFail();

        $genders = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Gender')->select('master_attributes.*')->get();
        $allLanguages = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Languages')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', optional($employee->profile)->country)->get();
        $cities = City::where('state_id', optional($employee->profile)->state)->get();
        $allSkills = JobSkill::all();

        if ($employee->profile && $employee->profile->skills) {
            $skills = explode(',', $employee->profile->skills);
        } else {
            $skills = null;
        }
        if ($employee->profile && $employee->profile->languages) {
            $languages = explode(',', $employee->profile->languages);
        } else {
            $languages = null;
        }
        if ($request->method() == "POST") {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'contact' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required|date|before:today',
                'current_job_title' => 'required',
                'current_salary' => 'nullable|numeric',
                'expected_salary' => 'required|numeric',
                'experience' => 'nullable|numeric',
                'languages' => 'required|array',
                'skills' => 'required|array',
                'have_driving_license' => 'required',
                'resume' => 'max:2000|mimes:' . implode(',', Profile::SUPPORTED_RESUME_MIME_TYPE),
                'profile_summary' => 'nullable',
                'description' => 'nullable',
                'address' => 'required',
                'country' => 'required',
                'state' => 'nullable',
                'city' => 'nullable',
                'zip' => 'nullable',
                'profile_image' => 'nullable|image|max:2000|mimes:' . implode(',', Profile::SUPPORTED_IMAGE_MIME_TYPE),
                'profile_video' => 'nullable|max:40000|mimes:' . implode(',', Profile::SUPPORTED_VIDEO_MIME_TYPE),
                'video_link' => 'nullable|url',
                'website_link' => 'nullable|url',
                'social_media_link' => 'nullable|array',
                'social_media_link.*' => 'nullable|url',
                'notification_option' => 'required',
            ]);

            try {
                $user_data = $request->all();
                if ($request->password && $request->password != null) {
                    $request->validate([
                        'password' => 'min:8|max:100'
                    ]);
                    $user_data['password'] = Hash::make($request->password);
                } else {
                    unset($user_data['password']);
                }
                unset($user_data['resume']);
                unset($user_data['profile_image']);
                unset($user_data['profile_video']);
                unset($user_data['video_link']);
                unset($user_data['current_salary']);
                unset($user_data['languages']);
                unset($user_data['address']);
                unset($user_data['skills']);
                unset($user_data['country']);
                unset($user_data['state']);
                unset($user_data['city']);
                unset($user_data['zip']);
                unset($user_data['experience']);
                unset($user_data['date_of_birth']);
                unset($user_data['current_job_title']);
                unset($user_data['website_link']);
                unset($user_data['social_media_link']);
                unset($user_data['description']);
                unset($user_data['profile_summary']);
                unset($user_data['have_driving_license']);
                unset($user_data['notification_option']);

                $employee->update($user_data);

                $profile_data = [];
                if ($request->hasFile('resume')) {
                    $resume_file = $request->file('resume');
                    $status = $resume_file->storeAs(
                        Profile::RESUME_PATH,
                        $resume_file->hashName(),
                        config('settings.file_system_service')
                    );
                    if ($status && optional($employee->profile)->profile_resume_path) {
                        Storage::disk(config('settings.file_system_service'))->delete(optional($employee->profile)->profile_resume_path);
                    }
                    $profile_data['resume'] = $resume_file->hashName();
                }

                $profile_data['gender'] = $request->gender;
                $profile_data['user_id'] = auth()->user()->id;
                if ($request->current_salary) {
                    $profile_data['current_salary'] = $request->current_salary;
                }
                if ($request->expected_salary) {
                    $profile_data['expected_salary'] = $request->expected_salary;
                }
                if ($request->languages && count($request->languages) > 0) {
                    $profile_data['languages'] = implode(',', $request->languages);
                }
                if ($request->skills && count($request->skills) > 0) {
                    $profile_data['skills'] = implode(',', $request->skills);
                }
                if ($request->address) {
                    $profile_data['address'] = $request->address;
                }
                if ($request->city) {
                    $profile_data['city'] = $request->city;
                }
                if ($request->state) {
                    $profile_data['state'] = $request->state;
                }
                if ($request->country) {
                    $profile_data['country'] = $request->country;
                }
                if ($request->zip) {
                    $profile_data['zip'] = $request->zip;
                }

                $profile_data['experience'] = $request->experience;
                $profile_data['date_of_birth'] = $request->date_of_birth;
                $profile_data['current_job_title'] = $request->current_job_title;
                $profile_data['website_link'] = $request->website_link;
                $profile_data['social_media_link'] = $request->social_media_link;
                $profile_data['description'] = $request->description;
                $profile_data['profile_summary'] = $request->profile_summary;
                $profile_data['have_driving_license'] = $request->have_driving_license;
                $profile_data['notification_option'] = $request->notification_option;

                if ($request->hasFile('profile_image')) {
                    $image_file = $request->file('profile_image');
                    $status = $image_file->storeAs(
                        Profile::IMAGE_PATH,
                        $image_file->hashName(),
                        config('settings.file_system_service')
                    );
                    if ($status && optional($employee->profile)->profile_image_path) {
                        Storage::disk(config('settings.file_system_service'))->delete(optional($employee->profile)->profile_image_path);
                    }
                    $profile_data['logo'] = $image_file->hashName();
                }

                if ($request->hasFile('profile_video')) {
                    $video_file = $request->file('profile_video');
                    $status = $video_file->storeAs(
                        Profile::VIDEO_PATH,
                        $video_file->hashName(),
                        config('settings.file_system_service')
                    );
                    if ($status && optional($employee->profile)->profile_video_path) {
                        Storage::disk(config('settings.file_system_service'))->delete(optional($employee->profile)->profile_video_path);
                    }
                    $profile_data['intro_video'] = $video_file->hashName();
                }

                $profile_data['video_link'] = $request->video_link ?? null;

                $profile = Profile::where('user_id', auth()->user()->id)->first();


                if ($profile == null) {
                    Profile::create($profile_data);
                } else {
                    $profile->update($profile_data);
                }

                //return redirect(route('employee.profile.edit'))->with('', '');

                return Redirect::route('employee.home')->with('success', 'Employee details updated successfully');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        if ($employee->roleUser->role->role == 'employee') {
            return view('employee.profile.edit', compact('employee', 'languages', 'allLanguages', 'genders', 'countries', 'states', 'cities', 'skills', 'allSkills'));
        } else {
            return redirect()->back();
        }
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json([
            'status' => 'success',
            'states' => $states,
        ]);
    }

    public function getCities(Request $request)
    {
        $cities = city::where('state_id', $request->state_id)->get();
        return response()->json([
            'status' => 'success',
            'cities' => $cities
        ]);
    }
}
