<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function home()
    {
        $applied_jobs = Vacancy::withCount([
            'applicants',
            'applicants as new_application_count' => function (Builder $builder) {
                return $builder->where('status', 0);
            },
            'applicants as shortlisted_count' => function (Builder $builder) {
                return $builder->where('status', 1);
            },
            'applicants as rejected_count' => function (Builder $builder) {
                return $builder->where('status', 2);
            },
            'applicants as hired_count' => function (Builder $builder) {
                return $builder->where('status', 3);
            },
            'applicants as on_hold_count' => function (Builder $builder) {
                return $builder->where('status', 4);
            },
        ])->latest()->get();

        $date = Date('Y-m-d', strtotime(Date('Y-m-d').' -6 days'));
        for($i=0; $i<=6; $i++)
        {
            $newdate = Date('Y-m-d', strtotime($date.'+ '.$i.' days'));
            $date_arr[$newdate] = 0;
        }
        $app_day = DB::select(DB::raw('SELECT COUNT(id) as total, DATE(created_at) as date_at FROM applied_jobs GROUP BY date_at'));
        
        foreach($app_day as $data)
        {
            $date_arr[$data->date_at] = $data->total;
        }

        $new_applications = AppliedJob::with('user')->whereHas('vacancy')->where('status', 0)->get();
        $applied_job_count = $applied_jobs[0]->applicants_count > 0 ? $applied_jobs[0]->applicants_count : 1;
        $posted_vacancies= Vacancy::limit(5)->latest()->get();
        // return view('admin.dashboard.home', [
        //     'applied_jobs' => $applied_jobs,
        //     'applied_job_count' => $applied_jobs[0]->applicants_count > 0 ? $applied_jobs[0]->applicants_count : 1,
        //     'date_arr' => $date_arr,
        //     'posted_vacancies' => Vacancy::limit(5)->latest()->get(),
        //     'new_applications' => $new_applications,
        // ]);
        return view('admin.dashboard.home',compact('applied_jobs','applied_job_count','date_arr','posted_vacancies','new_applications'));
    }
}
