<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('admin.auth.login');
    }

    public function checkUser(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if($user == null)
        {
            return response()->json([
                'status' => 'failed'
            ]);
        }
        else
        {
            if($user->roleUser->role->role == 'admin')
            {
                return response()->json([
                    'status' => 'success'
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 'failed'
                ]);
            }
        }
    }
}
