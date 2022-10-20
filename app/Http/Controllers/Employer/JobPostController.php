<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\State;
use App\Models\JobSkill;
use App\Models\User;
use App\Models\MasterAttribute;
use Session;
use App\Models\City;
use Validator;

class JobPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function index(Request $request)
    {
        $jobs = Vacancy::where('employer_id', auth()->user()->id);
        if($request->search)
        {
            $jobs->where('job_title', 'LIKE', '%' . $request->search . '%')->orWhere('job_role', 'LIKE', '%' . $request->search . '%');
        }
        if($request->job_type && $request->job_type != 'empty')
        {
            // dd($request->job_type);
            $jobs->where('job_type', $request->job_type);
        }
        if($request->salary && $request->salary != 'empty')
        {   
            if($request->salary == 25)
            {
                $jobs->where('salary_offer','>',24);
            }
            else{
                $salaries = explode('-',$request->salary);
                // dd($salaries);
                $jobs->where('salary_offer', '>', $salaries[0])->where('salary_offer', '<=', $salaries[1]);
            }
        }
        if($request->experience && $request->experience != 'empty')
        {   
            // dd('yes');
            if($request->experience == 16)
            {
                $jobs->where('min_exp','>',15);
            }
            else{
                $exp = explode('-',$request->experience);
                $jobs->where('min_exp', '>', $exp[0])->where('min_exp', '<=', $exp[1]);
            }
        }
        $jobs = $jobs->simplePaginate(9);
        return view('employer.dashboard.posted-jobs.posted-jobs', compact('jobs'));
    }

    public function create(Request $request)
    {
        if($request->method() == "POST")
        {
            $request->validate([
                'job_title' => 'required|string|max:129',
                'address' => 'required|string',
                'zip' => 'required|numeric',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'zip' => 'required'
            ]);

           

            try {

                if($request->skills && count($request->skills) > 0){
                    $skills = implode(',',$request->skills);
                }
                else{
                    $skills = null;
                }
                $input = $request->all();
                $input['employer_id'] = auth()->user()->id;
                $input['skills'] = $skills;
                $imagesarr = [];
                if(count($request->images_input) > 0)
                {
                    // $request->validate([
                    //     'images_input.*' => 'mimes:jpeg,bmp,png,jpg|max:2000'
                    // ]);
                    foreach($request->images_input as $image){
    
                        $file = $image;
                        $fileName = date('YmdHis').$file->getClientOriginalName();
                        $destinationPath = public_path().'/image/company_images';
                        $file->move($destinationPath,$fileName);
                        
                        array_push($imagesarr, $fileName);
                    }
                    $imagesstr = implode(',',$imagesarr);
                    $input['images'] = $imagesstr;
                    // dd('Image: error'. $imagesstr);
                }
                
                if($request->file('video_input')){
                    $request->validate([
                        'video_input' => 'mimes:mp4|max:20000'
                    ]);
                    $fileVideo = $request->file('video_input');
                    $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
                    $destinationPath = public_path().'/image/company_videos';
                    $fileVideo->move($destinationPath,$videoFileName);
                    $input['video'] = $videoFileName;
                }

                $input['location'] = $request->address;
                Vacancy::create($input);
                
            } catch (\Exception $e) {
                dd('Catch: error'.$e->getMessage());
            }

            
            
            return redirect(route('employer.posted.jobs'))->with('success', 'Job Posted Successfully');
        }
        $skills = JobSkill::all();
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        return view('employer.dashboard.posted-jobs.post-job', compact('countries', 'states', 'cities', 'skills', 'job_types'));
        // return view('employer.profile.post-job', compact('countries', 'states', 'cities', 'skills'));
    }

    public function edit(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $countries = Country::all();
        $states = State::where('country_id',$vacancy->country)->get();
        $cities = City::where('state_id', $vacancy->state)->get();
        $allSkills = JobSkill::all();
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
        if($vacancy->skills)
        {
            $skills = explode(',', $vacancy->skills);
        }
        else
        {
            $skills = null;
        }
        if($request->method() == "POST")
        {
            $request->validate([
                'job_title' => 'required|string|max:129',
                'address' => 'required|string',
                'zip' => 'required|numeric',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'zip' => 'required'
            ]);
            if($request->skills && count($request->skills) > 0){
                $skills = implode(',',$request->skills);
            }
            else{
                $skills = null;
            }
            $input = $request->all();
            if($request->images_input)
            {
                $request->validate([
                    'images_input' => 'mimes:jpeg,bmp,png,jpg|max:2000'
                ]);

                $file = $request->file('images_input');
                $fileName = date('YmdHis').$file->getClientOriginalName();
                $destinationPath = public_path().'/image/company_images';
                $file->move($destinationPath,$fileName);
                $input['images'] = $fileName;
            }
            if($request->file('video_input')){
                $request->validate([
                    'video_input' => 'mimes:mp4|max:20000'
                ]);
                $fileVideo = $request->file('video_input');
                $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
                $destinationPath = public_path().'/image/company_videos';
                $fileVideo->move($destinationPath,$videoFileName);
                $input['video'] = $videoFileName;
            }
            $input['skills'] = $skills;
            $input['location'] = $request->address;
            $vacancy->update($input);
            

            return redirect(route('employer.posted.jobs'))->with('success', 'Job Post Updated Successfully');
        }
        return view('employer.dashboard.posted-jobs.edit-post-job', compact('vacancy','countries', 'states', 'cities', 'skills', 'allSkills', 'job_types'));
    }

    public function delete(Request $request)
    {
        Vacancy::find($request->id)->delete();
        Session::flash('info', 'Job Vacancy Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Job vacancy has been deleted successfully'
        ]);
    }

    public function jobCandidates(Request $request, $id)
    {
        $job = Vacancy::find($id);
        $requireSkills = $job->skills;
        $employee = User::where('id',4)->orWhere('id',5)->get();
        return view('employer.dashboard.posted-jobs.view-candidates', compact('job', 'employee'));
        
    }
}
