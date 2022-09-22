<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(auth()->user()->roleUser->role->role != "admin")
            {
                if(auth()->user()->roleUser->role->role == "employee"){
                    return redirect(route('home'));
                }
                if(auth()->user()->roleUser->role->role == "employer"){
                    return redirect(route('home'));
                }
            }
        }
        return $next($request);
    }
}
