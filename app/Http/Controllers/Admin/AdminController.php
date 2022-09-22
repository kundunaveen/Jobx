<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AdminController extends Controller
{
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->current_password, $user->password))
        {
            // dd('false');
            session::flash('wrongpassword', 'The password is incorrect');
            return redirect()->back();
        }

        $request->validate([
            'current_password' => 'bail|required|max:129',
            'password' => 'bail|required|min:8|max:129|confirmed'
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        // $user->update(['password', Hash::make($request->password)]);
        return redirect()->back()->with('success', 'Your password has been changed successfully.');
        
    }

    public function checkPasswordValidation(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->current_password, $user->password))
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'The password is incorrect'
            ]);
        }

        $request->validate([
            'current_password' => 'bail|required|max:129',
            'password' => 'bail|required|min:8|max:129|confirmed'
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

}
