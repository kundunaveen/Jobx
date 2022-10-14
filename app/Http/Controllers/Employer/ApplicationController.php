<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliedJob;

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
        });
        return view('employer.dashboard.applications.index', compact('applications'));
    }
}
