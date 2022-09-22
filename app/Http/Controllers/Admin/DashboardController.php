<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function home()
    {
        return view('admin.dashboard.home');
    }
}
