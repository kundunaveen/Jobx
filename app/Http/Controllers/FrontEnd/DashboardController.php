<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use App\Models\User;


class DashboardController extends Controller
{
    public function home()
    {
        return view('front-end.dashboard.home');
    }

    public function companies()
    {
        $employers = User::whereHas('roleUser', function($q){
            $q->where('role_id', 2);
        })->get();
        return view('front-end.dashboard.company-listing', compact('employers'));
    }

    public function jobs(Request $request)
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
        $skills = JobSkill::all();
        $jobs = $jobs->simplePaginate(3);
        return view('front-end.dashboard.job-listing', compact('salaries', 'job_types', 'jobs', 'industry', 'skills'));
    }
}
