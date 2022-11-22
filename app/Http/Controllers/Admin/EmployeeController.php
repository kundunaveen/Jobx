<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Profile;
use Session;
use App\Models\MasterAttribute;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\JobSkill;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function index()
    {
        // $employees = User::employeeList();
        $employees = User::whereHas('roleUser', function($q){
            $q->where('role_id', 3);
        })->latest()->get();
        return view('admin.dashboard.employee.index', compact('employees'));
    }

    public function create(Request $request)
    {
        if($request->method()=="POST")
        {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:users',
                'password' => 'required|max:100|min:8|confirmed',
                'gender' => 'required'
            ]);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => 3
            ]);
            $profile_data = [];
            $profile_data['user_id'] = $user->id;
            $profile_data['gender'] = $request->gender;
            if($request->current_salary){
                $profile_data['current_salary'] = $request->current_salary;
            }
            if($request->expected_salary){
                $profile_data['expected_salary'] = $request->expected_salary;
            }
            if($request->experience){
                $profile_data['experience'] = $request->experience;
            }
            if($request->languages && count($request->languages) > 0){
                $profile_data['languages'] = implode(',',$request->languages);
            }
            if($request->skills && count($request->skills) > 0){
                $profile_data['skills'] = implode(',',$request->skills);
            }
            if($request->address){
                $profile_data['address'] = $request->address;
            }
            if($request->city){
                $profile_data['city'] = $request->city;
            }
            if($request->state){
                $profile_data['state'] = $request->state;
            }
            if($request->country){
                $profile_data['country'] = $request->country;
            }
            if($request->zip){
                $profile_data['zip'] = $request->zip;
            }
            $profile = Profile::create($profile_data);
        
            return redirect(route('admin.manageEmployee'))->with('success', 'Employee created successfully');
        }
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        $skills = JobSkill::all();
        $genders = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Gender')->select('master_attributes.*')->get();
        $languages = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Languages')->select('master_attributes.*')->get();
        return view('admin.dashboard.employee.create', compact('genders', 'languages', 'countries', 'states', 'cities', 'skills'));
    }

    public function edit(Request $request, $id)
    {
        $employee = User::find($id);
        $genders = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Gender')->select('master_attributes.*')->get();
        $allLanguages = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Languages')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', optional($employee->profile)->country)->get();
        $cities = City::where('state_id', optional($employee->profile)->state)->get();
        $allSkills = JobSkill::all();
        if($employee->profile && optional($employee->profile)->skills)
        {
            $skills = explode(',', $employee->profile->skills);
        }
        else
        {
            $skills = null;
        }
        if($employee->profile && $employee->profile->languages)
        {
            $languages = explode(',',$employee->profile->languages);
        }
        else{
            $languages = null;
        }
        if($request->method() == "POST"){
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'gender' => 'required',
                'employee_image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
                'employee_intro' => 'mimes:mp4|max:20000',
                'resume' => 'mimes:pdf,docx|max:2000'
            ]);
            
            $user_data = $request->all();
            if($request->password && $request->password != null){
                $request->validate([
                    'password' => 'min:8|max:100'
                ]);
                $user_data['password'] = Hash::make($request->password);
            }
            else{
                unset($user_data['password']);
            }
            $employee->update($user_data);

            // if($request->file('employee_image')){
            //     $request->validate([
            //         'employee_image' => 'mimes:jpeg,bmp,png,jpg|max:2000'
            //     ]);
            //     $file = $request->file('employee_image');
            //     $fileName = date('YmdHis').$file->getClientOriginalName();
            //     $destinationPath = public_path().'/image/employee_images';
            //     $file->move($destinationPath,$fileName);
               
            // }
            $profile_data = [];
            if ($request->hasFile('employee_image')) {
                $image_file = $request->file('employee_image');
                $status = $image_file->storeAs(
                    Profile::IMAGE_PATH,
                    $image_file->hashName(),
                    config('settings.file_system_service')
                );
                if ($status && optional($employee->loadMissing('profile')->profile)->profile_image_path) {
                    Storage::disk(config('settings.file_system_service'))->delete(optional($employee->loadMissing('profile')->profile)->profile_image_path);
                }
                $profile_data['logo'] = $image_file->hashName();
            }

            // if($request->file('employee_intro')){
            //     $request->validate([
            //         'employee_intro' => 'mimes:mp4|max:20000'
            //     ]);
            //     $fileVideo = $request->file('employee_intro');
            //     $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
            //     $destinationPath = public_path().'/image/employee_videos';
            //     $fileVideo->move($destinationPath,$videoFileName);
               
            // }

            if ($request->hasFile('employee_intro')) {
                $video_file = $request->file('employee_intro');
                $status = $video_file->storeAs(
                    Profile::VIDEO_PATH,
                    $video_file->hashName(),
                    config('settings.file_system_service')
                );
                if ($status && optional($employee->loadMissing('profile')->profile)->profile_video_path) {
                    Storage::disk(config('settings.file_system_service'))->delete(optional($employee->loadMissing('profile')->profile)->profile_video_path);
                }
                $profile_data['intro_video'] = $video_file->hashName();
            }

            // if($request->file('resume')){
            //     $request->validate([
            //         'resume' => 'mimes:pdf,docx|max:2000'
            //     ]);
            //     $resume = $request->file('resume');
            //     $resumeName = date('YmdHis').$resume->getClientOriginalName();
            //     $destinationPath = public_path().'/image/resume';
            //     $resume->move($destinationPath,$resumeName);
               
            // }

            if ($request->hasFile('resume')) {
                $resume_file = $request->file('resume');
                $status = $resume_file->storeAs(
                    Profile::RESUME_PATH,
                    $resume_file->hashName(),
                    config('settings.file_system_service')
                );
                if ($status && optional($employee->loadMissing('profile')->profile)->profile_resume_path) {
                    Storage::disk(config('settings.file_system_service'))->delete(optional($employee->loadMissing('profile')->profile)->profile_resume_path);
                }
                $profile_data['resume'] = $resume_file->hashName();
            }

            $profile_data['gender'] = $request->gender;
            $profile_data['user_id'] = $id;
            if($request->current_salary){
                $profile_data['current_salary'] = $request->current_salary;
            }
            if($request->expected_salary){
                $profile_data['expected_salary'] = $request->expected_salary;
            }
            if($request->experience){
                $profile_data['experience'] = $request->experience;
            }
            if($request->languages && count($request->languages) > 0){
                $profile_data['languages'] = implode(',',$request->languages);
            }
            if($request->skills && count($request->skills) > 0){
                $profile_data['skills'] = implode(',',$request->skills);
            }
            if($request->address){
                $profile_data['address'] = $request->address;
            }
            if($request->city){
                $profile_data['city'] = $request->city;
            }
            if($request->state){
                $profile_data['state'] = $request->state;
            }
            if($request->country){
                $profile_data['country'] = $request->country;
            }
            if($request->zip){
                $profile_data['zip'] = $request->zip;
            }
            // if($request->file('employee_image'))
            // {
            //     $profile_data['logo'] = $fileName;
            // }

            // if($request->file('employee_intro'))
            // {
            //     $profile_data['intro_video'] = $videoFileName;
            // }

            // if($request->file('resume'))
            // {
            //     $profile_data['resume'] = $resumeName;
            // }

            $profile = Profile::where('user_id', $id)->first();
            if($profile == null)
            {
                Profile::create($profile_data);
            }
            else{
                $profile->update($profile_data);
            }
            return redirect(route('admin.manageEmployee'))->with('success', 'Employee details updated successfully');
        }
        if($employee->roleUser->role->role == 'employee'){
            return view('admin.dashboard.employee.edit', compact('employee', 'languages', 'allLanguages', 'genders', 'countries', 'states', 'cities', 'skills', 'allSkills'));
        }
        else{
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        Session::flash('info','Employee Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Employee has been deleted successfully'
        ]);
    }

    public function deleteEmployeeImage(Request $request)
    {
        Profile::where('user_id', $request->id)->update(['logo' => null]);
        Session::flash('success', 'Image removed successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function deleteEmployeeVideo(Request $request)
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
        if($request->status == 1)
        {
            $employee = User::find($request->emp_id);
            $employee->is_active = 0;
            $employee->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status changed successfully'
            ]);
        }
        else{
            $employee = User::find($request->emp_id);
            $employee->is_active = 1;
            $employee->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status changed successfully'
            ]);
        }
    }
}
