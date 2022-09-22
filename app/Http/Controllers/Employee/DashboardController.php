<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeeaccount']);
    }

    public function home()
    {
        return view('employee.dashboard.home');
    }
}
