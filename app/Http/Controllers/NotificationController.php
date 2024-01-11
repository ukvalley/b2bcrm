<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
       $admin = User::where('user_type_id','4')->first();
       
       if($admin){
            $adminid = $admin->id;
            //Retrieve and show notifications in the admin panel
            $notifications =Notification::where('user_id', $adminid)->get();

            return view('notifications.index', compact('notifications'));
        }
          
          return view('notifications.index');
    }
}
