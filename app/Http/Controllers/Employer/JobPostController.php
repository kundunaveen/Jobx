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
                'city' => 'nullable',
                'state' => 'nullable',
                'country' => 'required',
                'zip' => 'required|numeric',
                'address' => 'required|string',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'description' => 'nullable',
                'salary_offer' => 'required',
                'min_exp' => 'required',
                'skills' => 'required|array',
                'job_type' => 'required',
                'images_input' => 'required|array',
                'images_input.*' => 'image|max:2000|mimes:'.implode(',', Vacancy::SUPPORTED_IMAGE_MIME_TYPE),
                'video_input' => 'mimes:mp4|max:20000'
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

                $image_files = [];
                if($request->hasFile('images_input'))
                {
                    foreach($request->file('images_input') as $file)
                    {
                        $name = time().rand(1,100).'.'.$file->extension();
                        $file->move(public_path('/image/company_images'), $name);  
                        $image_files[] = $name;  
                    }                    
                }
                
                $input['images'] = implode(',', $image_files);
                
                if($request->hasFile('video_input')){
                    $fileVideo = $request->file('video_input');
                    $videoFileName = date('YmdHis').$fileVideo->getClientOriginalName();
                    $destinationPath = public_path().'/image/company_videos';
                    $fileVideo->move($destinationPath,$videoFileName);
                    $input['video'] = $videoFileName;
                }

                $input['location'] = $request->address;
                Vacancy::create($input);
                
            } catch (\Exception $e) {
                dd($e->getMessage());
                return back()->with([
                    'error' => $e->getMessage()
                ]);
            }            
            
            return redirect()->route('employer.posted.jobs')->with('success', 'Job Posted Successfully');
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
                'city' => 'nullable',
                'state' => 'nullable',
                'country' => 'required',
                'zip' => 'required|numeric',
                'address' => 'required|string',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'description' => 'nullable',
                'salary_offer' => 'required',
                'min_exp' => 'required',
                'skills' => 'required|array',
                'job_type' => 'required',
                'images_input' => 'array',
                'images_input.*' => 'image|max:2000|mimes:'.implode(',', Vacancy::SUPPORTED_IMAGE_MIME_TYPE),
                'video_input' => 'mimes:mp4|max:20000'
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
