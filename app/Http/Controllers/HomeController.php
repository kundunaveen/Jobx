<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->roleUser->role->role == "admin")
        {
            return redirect(route('admin.dashboard'));
        }
        if(auth()->user()->roleUser->role->role == "employee")
        {
            return redirect(route('employee.home'));
        }
        if(auth()->user()->roleUser->role->role == "employer")
        {
            return redirect(route('employer.dashboard'));
        }
        return redirect(route('front-end.home'));
        
    }
}
