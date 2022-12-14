<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Profile;
use App\Models\MasterAttribute;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Notifications\Auth\Credential;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Session;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function index()
    {
        // $employers = User::employerList();
        $employers = User::whereHas('roleUser', function ($q) {
            $q->where('role_id', 2);
        })->latest()->get();
        return view('admin.dashboard.employer.index', compact('employers'));
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:users',
                'password' => 'required|max:100|min:8|confirmed',
                'company_name' => 'required',
                'contact' => 'required',
                'address'=>'required',
                'zip'=>'required||numeric|digits_between:4,8',
                'password_confirmation'=>'required'
            ]);

            try {
                $password = $request->password;

                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    'contact' => $request->contact
                ]);

                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => 2
                ]);

                $profile_data = [];
                $profile_data['user_id'] = $user->id;
                $profile_data['company_name'] = $request->company_name;
                $profile_data['industry_type_id'] = $request->industry_type;

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
                if ($request->description) {
                    $profile_data['description'] = $request->description;
                }
                $profile = Profile::create($profile_data);

                $user->sendEmailVerificationNotification();

                $credential = [];
                $credential['password'] = $password;
                $user->notify(new Credential($credential));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('error', $e->getMessage())->withInput();
            }

            return redirect(route('admin.manageEmployer'))->with('success', 'Employer created successfully');
        }
        $industries = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Industries')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach ($states as $state) {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        return view('admin.dashboard.employer.create', compact('industries', 'states', 'cities', 'countries'));
    }

    public function edit(Request $request, $id)
    {
        $employer = User::find($id);
        $industries = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Industries')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', optional($employer->profile)->country)->get();
        $cities = City::where('state_id', optional($employer->profile)->state)->get();
        if ($request->method() == "POST") {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'company_name' => 'required',
                'contact' => 'required',
                'company_image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
                'company_intro' => 'mimes:mp4|max:20000'
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
                $employer->update($user_data);

                $profile = Profile::where('user_id', $id)->first();

                $fileName = null;
                if ($request->hasFile('company_image')) {
                    $file = $request->file('company_image');
                    $file_name = $file->hashName();
                    $file->storeAs(
                        Profile::EMPLOYER_IMAGE_PATH,
                        $file_name,
                        config('settings.file_system_service')
                    );
                    if ($profile instanceof Profile && filled($profile->employer_image_path)) {
                        Storage::disk(config('settings.file_system_service'))->delete($profile->employer_image_path);
                    }
                    $fileName = $file_name;
                }

                $videoFileName = null;
                if ($request->hasFile('company_intro')) {
                    $file = $request->file('company_intro');
                    $file_name = $file->hashName();
                    $file->storeAs(
                        Profile::EMPLOYER_VIDEO_PATH,
                        $file_name,
                        config('settings.file_system_service')
                    );
                    if ($profile instanceof Profile && filled($profile->employer_video_path)) {
                        Storage::disk(config('settings.file_system_service'))->delete($profile->employer_video_path);
                    }
                    $videoFileName = $file_name;
                }

                $profile_data = [];
                $profile_data['user_id'] = $id;
                $profile_data['company_name'] = $request->company_name;
                $profile_data['industry_type_id'] = $request->industry_type;

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
                if ($request->description) {
                    $profile_data['description'] = $request->description;
                }
                if ($request->file('company_image')) {
                    $profile_data['logo'] = $fileName;
                }
                if ($request->file('company_intro')) {
                    $profile_data['intro_video'] = $videoFileName;
                }
                if ($request->file('company_intro')) {
                    $profile_data['intro_video'] = $videoFileName;
                }
                $profile = Profile::where('user_id', $id)->update($profile_data);

                return redirect()->route('admin.manageEmployer')->with('success', 'Employer details updated successfully');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->withInput()->with('error', $e->getMessage());
            }
        }
        if ($employer->roleUser->role->role == 'employer') {
            return view('admin.dashboard.employer.edit', compact('employer', 'industries', 'countries', 'states', 'cities'));
        } else {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        Session::flash('info', 'Employer Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Employee has been deleted successfully'
        ]);
    }

    public function updateCompanyLogo(Request $request)
    {
        dd($request);
    }

    public function deleteCompanyImage(Request $request)
    {
        Profile::where('user_id', $request->id)->update(['logo' => null]);
        Session::flash('success', 'Image removed successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function deleteCompanyVideo(Request $request)
    {
        Profile::where('user_id', $request->id)->update(['intro_video' => null]);
        Session::flash('success', 'Video removed successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        // foreach($states as $state)
        // {
        //     $cities = City::where('state_id', $state->id)->get();
        // }
        return response()->json([
            'status' => 'success',
            'states' => $states,
            // 'cities' => $cities
        ]);
    }

    public function getCities(Request $request)
    {
        // dd($request);
        $cities = city::where('state_id', $request->state_id)->get();
        return response()->json([
            'status' => 'success',
            'cities' => $cities
        ]);
    }

    public function changeStatus(Request $request)
    {
        if ($request->status == 1) {
            $employer = User::find($request->emp_id);
            $employer->is_active = 0;
            $employer->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status changed successfully'
            ]);
        } else {
            $employer = User::find($request->emp_id);
            $employer->is_active = 1;
            $employer->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status changed successfully'
            ]);
        }
    }
}
