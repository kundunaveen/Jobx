<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeeaccount']);
    }

    public function home()
    {
        return view('employee.profile.home');
    }

    public function searchJob(Request $request)
    {
        $jobs = Vacancy::all();
        return view('employee.profile.search', compact('jobs'));
    }
}
