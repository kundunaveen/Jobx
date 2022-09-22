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
        $employers = User::whereHas('roleUser', function($q){
            $q->where('role_id', 2);
        })->get();
        return view('admin.dashboard.employer.index', compact('employers'));
    }

    public function create(Request $request)
    {
        if($request->method()=="POST")
        {
            $request->validate([
                'first_name' => 'required|string|max:129',
                'last_name' => 'required|string|max:129',
                'email' => 'required|email|max:129|unique:users',
                'password' => 'required|max:129|min:8|confirmed',
                'company_name' => 'required',
                'contact' => 'required'
            ]);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact' => $request->contact
            ]);
            
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => 2
            ]);

            // Profile::create([
            //     'user_id' => $user->id,
            //     'company_name' => $request->company_name,
            //     'industry_type_id' => $request->industry_type,
            //     'description' => $request->description
            // ]);

            $profile_data = [];
            $profile_data['user_id'] = $user->id;
            $profile_data['company_name'] = $request->company_name;
            $profile_data['industry_type_id'] = $request->industry_type;

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
            if($request->description){
                $profile_data['description'] = $request->description;
            }
            $profile = Profile::create($profile_data);
            
            return redirect(route('admin.manageEmployer'))->with('success', 'Employer created successfully');
        }
        $industries = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Industries')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        return view('admin.dashboard.employer.create', compact('industries', 'states','cities', 'countries'));
    }

    public function edit(Request $request, $id)
    {
        $employer = User::find($id);
        $industries = MasterAttribute::join('master_attribute_categories', 'master_attribute_categories.id', 'master_attributes.master_attribute_category_id')->where('master_attribute_categories.name', 'Industries')->select('master_attributes.*')->get();
        $countries = Country::all();
        $states = State::where('country_id', $employer->profile->country)->get();
        $cities = City::where('state_id', $employer->profile->state)->get();
        if($request->method() == "POST"){
            $request->validate([
                'first_name' => 'required|string|max:129',
                'last_name' => 'required|string|max:129',
                'company_name' => 'required',
                'contact' => 'required'
            ]);
            
            $user_data = $request->all();
            
            if($request->password && $request->password != null){
                $request->validate([
                    'password' => 'min:8'
                ]);
                $user_data['password'] = Hash::make($request->password);
            }
            else{
                unset($user_data['password']);
            }
            $employer->update($user_data);

            if($request->file('company_image')){
                $request->validate([
                    'company_image' => 'mimes:jpeg,bmp,png,jpg|max:2000'
                ]);
                $file = $request->file('company_image');
                $fileName = date('YmdHis').$file->getClientOriginalName();
                $destinationPath = public_path().'/image/company_images';
                $file->move($destinationPath,$fileName);
               
            }

            if($request->file('company_intro')){
                $request->validate([
                    'company_intro' => 'mimes:mp4|max:20000'
                ]);
                $fileVideo = $request->file('company_intro');
                $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
                $destinationPath = public_path().'/image/company_videos';
                $fileVideo->move($destinationPath,$videoFileName);
               
            }

            $profile_data = [];
            $profile_data['user_id'] = $id;
            $profile_data['company_name'] = $request->company_name;
            $profile_data['industry_type_id'] = $request->industry_type;

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
            if($request->description){
                $profile_data['description'] = $request->description;
            }
            if($request->file('company_image'))
            {
                $profile_data['logo'] = $fileName;
            }
            if($request->file('company_intro'))
            {
                $profile_data['intro_video'] = $videoFileName;
            }
            if($request->file('company_intro'))
            {
                $profile_data['intro_video'] = $videoFileName;
            }
            $profile = Profile::where('user_id', $id)->update($profile_data);
            // $profile = Profile::where('user_id', $id)->first();
            // if($profile == null)
            // {
            //     Profile::create([
            //         'user_id' => $id,
            //         'company_name' => $request->company_name,
            //         'industry_type_id' => $request->industry_type,
            //         'description' => $request->description,
            //         'logo' => $request->file('company_image')? $fileName:null,
            //         'intro_video' => $request->file('company_intro')?$videoFileName : null,

            //     ]);
            // }
            // else{
            //     if($request->file('company_image') && $request->file('company_intro'))
            //     {
            //         $profile->update([
            //             'company_name' => $request->company_name,
            //             'industry_type_id' => $request->industry_type,
            //             'description' => $request->description,
            //             'logo' => $fileName,
            //             'intro_video' => $videoFileName,
            //         ]);
            //     }
            //     elseif($request->file('company_image'))
            //     {
            //         $profile->update([
            //             'company_name' => $request->company_name,
            //             'industry_type_id' => $request->industry_type,
            //             'description' => $request->description,
            //             'logo' => $fileName
            //         ]);
            //     }
            //     elseif($request->file('company_intro'))
            //     {
            //         $profile->update([
            //             'company_name' => $request->company_name,
            //             'industry_type_id' => $request->industry_type,
            //             'description' => $request->description,
            //             'intro_video' => $videoFileName
            //         ]);
            //     }
            //     else{
            //         $profile->update([
            //             'company_name' => $request->company_name,
            //             'industry_type_id' => $request->industry_type,
            //             'description' => $request->description,
            //         ]);
            //     }
            // }
            return redirect(route('admin.manageEmployer'))->with('success', 'Employer details updated successfully');
        }
        if($employer->roleUser->role->role == 'employer'){
            return view('admin.dashboard.employer.edit', compact('employer', 'industries', 'countries', 'states', 'cities'));
        }
        else{
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
        if($request->status == 1)
        {
            $employer = User::find($request->emp_id);
            $employer->is_active = 0;
            $employer->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status changed successfully'
            ]);
        }
        else{
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
