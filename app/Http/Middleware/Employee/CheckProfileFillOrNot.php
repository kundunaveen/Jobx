<?php

namespace App\Http\Middleware\Employee;

use App\Models\Profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckProfileFillOrNot
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
        $have_profile = Profile::where('user_id', $request->user()->id)
        ->where('gender', '>', 0)
        ->count();

        if($have_profile == 0){
            return Redirect::route('employee.profile.edit')->with('error', 'Before you applied the profile you need to fill up the profile');
        }
        return $next($request);
    }
}
