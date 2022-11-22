<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use App\Models\MasterAttribute;
use Illuminate\Support\Facades\Storage;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function home()
    {
        return view('employer.profile.home');
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->current_password, $user->password))
        {
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
        if(!Hash::check($request->current_password, $user->password))
        {
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

    public function editProfile(Request $request)
    {
        if($request->method()=="POST")
        {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'contact' => 'required',
                'company_name' => 'required',
                'industry' => 'required',
                // 'country' => 'required',
                // 'state' => 'required',
                // 'city' => 'required',
                'address' => 'required',
                'profile_image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
                'profile_video' => 'mimes:mp4|max:20000'
            ]);
            User::find(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact' => $request->contact
            ]);
            
            // if($request->profile_image){

            //     $file = $request->file('profile_image');
            //     $fileName = date('YmdHis').$file->getClientOriginalName();
            //     $destinationPath = public_path().'/image/company_images';
            //     $file->move($destinationPath,$fileName);
            // }
            // else{
            //     $fileName = null;
            // }

            // if($request->file('profile_video')){
            //     $fileVideo = $request->file('profile_video');
            //     $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
            //     $destinationPath = public_path().'/image/company_videos';
            //     $fileVideo->move($destinationPath,$videoFileName);
               
            // }
            // else{
            //     $videoFileName = null;
            // }

            $profile = Profile::where('user_id',auth()->user()->id)->first();

            $fileName = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $file_name = $file->hashName();
                $file->storeAs(
                    Profile::EMPLOYER_IMAGE_PATH,
                    $file_name,
                    config('settings.file_system_service')
                );
                if(filled($profile->employer_image_path)){
                    Storage::disk(config('settings.file_system_service'))->delete($profile->employer_image_path);
                }
                $fileName = $file_name;
            }

            $videoFileName = null;
            if ($request->hasFile('profile_video')) {
                $file = $request->file('profile_video');
                $file_name = $file->hashName();
                $file->storeAs(
                    Profile::EMPLOYER_VIDEO_PATH,
                    $file_name,
                    config('settings.file_system_service')
                );
                if(filled($profile->employer_video_path)){
                    Storage::disk(config('settings.file_system_service'))->delete($profile->employer_video_path);
                }
                $videoFileName = $file_name;
            }
            
            Profile::where('user_id', auth()->user()->id)->update([
                'company_name' => $request->company_name,
                'industry_type_id' => $request->industry,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'zip' => $request->zip,
                'company_size' => $request->company_size,
                'company_role' => $request->company_role,
                'notification_option' => $request->notification_option,
                'description' => '',
                'logo' => $fileName ? $fileName : $profile->logo,
                'intro_video' => $videoFileName ? $videoFileName : $profile->intro_video
            ]);
            return redirect(route('employer.dashboard'));

        }
        $employer = User::find(auth()->user()->id);
        $industries = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Industries');
        })->get();
        $countries = Country::all();
        if($employer->profile->country != null)
        {
            $states = State::where('country_id', $employer->profile->country)->get();
        }
        else{
            $states = State::where('country_id', 1)->get();
        }
        if($employer->profile->state != null)
        {
            $cities = City::where('state_id', $employer->profile->state)->get();
        }
        else{
            foreach($states as $state)
            {
                $cities = City::where('state_id', $state->id)->get();
                break;
            }

        }
        $genders = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Gender');
        })->get();
        return view('employer.dashboard.profile.edit', compact('employer', 'industries', 'countries', 'states', 'cities', 'genders'));
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
}
