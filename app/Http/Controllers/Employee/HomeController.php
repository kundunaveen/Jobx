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
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeeaccount']);
    }

    public function home()
    {
        return view('employee.profile.home');
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
            'current_password' => 'bail|required|max:129',
            'password' => 'bail|required|min:8|max:129|confirmed'
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
        $jobs = Vacancy::latest();
        if ($request->job_type) {
            $jobs->whereIn('job_type', $request->job_type);
        }
        if ($request->industry) {
            $jobs->whereHas('user', function ($q) use ($request) {
                $q->whereHas('profile', function ($query) use ($request) {
                    $query->whereIn('industry_type_id', $request->industry);
                });
            });
        }
        if ($request->skill) {
            $jobs->whereRaw("FIND_IN_SET(?, skills)", $request->skill);
        }
        if ($request->sortby == "newest") {
            $jobs = Vacancy::orderBy('created_at', 'DESC');
        }
        if ($request->sortby == "highest_salary") {
            $jobs = Vacancy::orderBy('salary_offer', 'DESC');
        }
        if ($request->sortby == "lowest_experience") {
            $jobs = Vacancy::orderBy('min_exp');
        }
        if ($request->min_salary && $request->max_salary) {
            $jobs->whereBetween('salary_offer', [$request->min_salary, $request->max_salary])->get();
        }
        if ($request->min_exp && $request->max_exp) {
            $jobs->whereBetween('min_exp', [$request->min_exp, $request->max_exp])->get();
        }

        $salaries = Vacancy::selectRaw("MIN(salary_offer) AS MinSalary, MAX(salary_offer) AS MaxSalary")->first();
        $industry = MasterAttribute::where('master_attribute_category_id', '4')->get();
        $job_types = MasterAttribute::whereHas('masterCategory', function ($q) {
            $q->where('name', 'Job Type');
        })->get();
        $applied_jobs = AppliedJob::where('user_id', auth()->user()->id)->pluck('vacancy_id')->toArray();
        $skills = JobSkill::all();
        $jobs = $jobs->simplePaginate(3);

        return view('employee.profile.search', compact('salaries', 'job_types', 'jobs', 'industry', 'applied_jobs', 'skills'));
    }

    /* edit profile */

    public function editProfile(Request $request)
    {
        $employee = User::with('profile')->where('id', auth()->user()->id)->firstOrFail();
        $genders = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Gender')->select('master_attributes.*')->get();
        $allLanguages = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Languages')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', $employee->profile->country)->get();
        $cities = City::where('state_id', $employee->profile->state)->get();
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
                'gender' => 'required',
                'profile_image' => 'nullable|image|max:2000|mimes:'.implode(',', Profile::SUPPORTED_IMAGE_MIME_TYPE),
                'profile_video' => 'nullable|max:10000|mimes:'.implode(',', Profile::SUPPORTED_VIDEO_MIME_TYPE)
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
                $employee->update($user_data);

                if ($request->file('resume')) {
                    $request->validate([
                        'resume' => 'mimes:pdf,docx|max:2000'
                    ]);
                    $resume = $request->file('resume');
                    $resumeName = date('YmdHis') . $resume->getClientOriginalName();
                    $destinationPath = public_path() . '/image/resume';
                    $resume->move($destinationPath, $resumeName);
                }
                $profile_data = [];
                $profile_data['gender'] = $request->gender;
                $profile_data['user_id'] = auth()->user()->id;
                if ($request->current_salary) {
                    $profile_data['current_salary'] = $request->current_salary;
                }
                if ($request->expected_salary) {
                    $profile_data['expected_salary'] = $request->expected_salary;
                }
                if ($request->experience) {
                    $profile_data['experience'] = $request->experience;
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
                if ($request->file('employee_image')) {
                    //$profile_data['logo'] = $fileName;
                    $profile_data['logo'] = '';
                }

                if ($request->file('employee_intro')) {
                    //$profile_data['intro_video'] = $videoFileName;
                    $profile_data['intro_video'] = '';
                }

                if ($request->file('resume')) {
                    $profile_data['resume'] = $resumeName;
                }

                if ($request->hasFile('profile_image')) {
                    $image_file = $request->file('profile_image');
                    $status = $image_file->storeAs(
                        Profile::IMAGE_PATH,
                        $image_file->hashName(),
                        config('settings.file_system_service')
                    );
                    if($status && optional($employee->profile)->profile_image_path){
                        Storage::disk(config('settings.file_system_service'))->delete(optional($employee->profile)->profile_image_path);
                    }
                    $profile_data['logo'] = $image_file->hashName();
                }

                if($request->hasFile('profile_video')){
                    $video_file = $request->file('profile_video');
                    $status = $video_file->storeAs(
                        Profile::VIDEO_PATH,
                        $video_file->hashName(),
                        config('settings.file_system_service')
                    );
                    if($status && optional($employee->profile)->profile_video_path){
                        Storage::disk(config('settings.file_system_service'))->delete(optional($employee->profile)->profile_video_path);
                    }
                    $profile_data['intro_video'] = $video_file->hashName();
                }

                $profile = Profile::where('user_id', auth()->user()->id)->first();


                if ($profile == null) {
                    Profile::create($profile_data);
                } else {
                    $profile->update($profile_data);
                }

                return redirect(route('employee.profile.edit'))->with('success', 'Employee details updated successfully');
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
