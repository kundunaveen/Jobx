<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ThemeController extends Controller
{
    public function checkAdmin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if($user == null)
        {
            return response()->json([
                'status' => 'success'
            ]);
        }
        else
        {
            if($user->roleUser->role->role != 'admin')
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
