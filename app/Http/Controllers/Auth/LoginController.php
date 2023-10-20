<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
       // print_r(Auth::user()->userType->name); die();
        // Check the user's role and return the appropriate route
        if (Auth::user()->userType->name =='student') {
            return route('student.home');
        } 
        elseif (Auth::user()->userType->name == 'agent') {
            return route('agent.home');
        } 
        elseif (Auth::user()->userType->name == 'Institution') {
            return route('institution.home');
        } 
        elseif (Auth::user()->userType->name == 'Admin') {
            return route('admin.home');
        } 
        else {
            // Default redirect for other user types or unauthenticated users
            return route('login');
        }
    }


    public function logout()
    {
        Auth::logout(); // This logs the user out
    
        // Clear all session data
        session()->flush();
    
        return redirect('/');
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
