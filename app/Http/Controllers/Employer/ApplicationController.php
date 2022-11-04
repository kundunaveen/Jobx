<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliedJob;
use App\Models\User;
use Session;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function index()
    {
        $applications = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->get();
        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request)
    {
        $appJob =  AppliedJob::find($request->id);
        $appJob->status = $request->status;
        $appJob->save();
        // dd($appJob);

        
        Session::flash('info', 'Applicant status updated successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function viewEmployeeProfile($id)
    {
        $user = User::find(base64_decode($id));
        return view('employer.dashboard.applications.employee_profile', compact('user'));
    }

}
