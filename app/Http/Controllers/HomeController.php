<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
       // return view('home');

        return redirect($this->redirectTo());
      //  return view('recruiter.panel.dashboard');
    }


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
}
