<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use Illuminate\Database\Eloquent\Builder;
use Session;

class VacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function index(Request $request)
    {
        $vacancies = Vacancy::when($request->status == 'new-application', function(Builder $builder){
            return $builder->whereHas('applicants', function(Builder $builder){
                return $builder->where('status', 0);
            });
        })->latest()->get();
        $employers = User::employerList();
        return view('admin.dashboard.vacancy.index', compact('vacancies', 'employers'));
    }

    public function create(Request $request)
    {
        if($request->method() == "POST")
        {
            $request->validate([
                'employer_id' => 'required|numeric',
                'job_title' => 'required|string|max:100',
                'location' => 'required|string|max:100',
                'zip' => 'required|numeric|digits_between:5,8',
                'department' => 'required|string|max:100',
                'job_role' => 'required|string|max:100',
                'description' => 'required'
                // 'skills' => 'required'
            ]);
            if($request->skills && count($request->skills) > 0){
                $skills = implode(',',$request->skills);
            }
            else{
                $skills = null;
            }
            Vacancy::create([
                'employer_id' => $request->employer_id,
                'job_title' => $request->job_title,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'location' => $request->location,
                'zip' => $request->zip,
                'department' => $request->department,
                'job_role' => $request->job_role,
                'description' => $request->description,
                'min_exp' => $request->min_exp,
                'salary_offer' => $request->salary_offer,
                'skills' => $skills,
                'job_type' => $request->job_type
            ]);
            Session::flash('success', 'Job Vacancy Created Successfully');
            return redirect(route('admin.manageVacancy'));
        }
        $skills = JobSkill::all();
        // $employers = User::employerList();
        $employers = User::whereHas('roleUser', function( $q){
                $q->where('role_id', 2);
            })->get();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
        return view('admin.dashboard.vacancy.create', compact('employers', 'countries', 'states', 'cities', 'skills', 'job_types'));
    }

    public function edit(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $countries = Country::all();
        $states = State::where('country_id', $vacancy->country)->get();
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
                // 'employer_id' => 'required|numeric',
                'job_title' => 'required|string|max:100',
                // 'city' => 'required|string|max:50',
                // 'country' => 'required|string|max:50',
                'location' => 'required|string',
                'zip' => 'required|numeric|digits_between:5,8',
                'department' => 'required|string|max:100',
                'job_role' => 'required|string|max:100',
                'description' => 'required'
                // 'skills' => 'required'
            ]);
            if($request->skills && count($request->skills) > 0){
                $skills = implode(',',$request->skills);
            }
            else{
                $skills = null;
            }
            // dd($request->job_type);
            $vacancy->update([
                'job_title' => $request->job_title,
                'city' => $request->city,
                'country' => $request->country,
                'location' => $request->location,
                'zip' => $request->zip,
                'department' => $request->department,
                'job_role' => $request->job_role,
                'description' => $request->description,
                'min_exp' => $request->min_exp,
                'salary_offer' => $request->salary_offer,
                'skills' => $skills,
                'job_type' => $request->job_type
            ]);
            Session::flash('success', 'Job Vacancy Updated Successfully');
            return redirect(route('admin.manageVacancy'));
        }
        $employers = User::whereHas('roleUser', function( $q){
            $q->where('role_id', 2);
        })->get();
        return view('admin.dashboard.vacancy.edit', compact('vacancy', 'employers', 'countries', 'states', 'cities', 'skills', 'allSkills', 'job_types'));
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
}
