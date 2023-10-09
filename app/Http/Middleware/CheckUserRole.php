<?php

namespace App\Http\Middleware;
use App\Models\UserType;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckUserRole
{

    public function handle($request, Closure $next,$usertypes)
    {

        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the user's role
            $userRole = Auth::user();

          //  print_r($usertypes);
            // dd('Reached here!');

            // Check if the user's role matches the required role
            if (Auth::user()->userType->name == $usertypes) {
                return $next($request);
            }
        }

        // Redirect or return an error response if access is denied
        return redirect('/')->with('error', 'Access denied. You do not have the required role.');
    }
}
