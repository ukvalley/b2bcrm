<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
	{
		$id= Auth::user()->id;
		//Retrieve and show notifications in the admin panel
		$notifications =Notification::where('user_id', $id)->get();
		return view('recruiter.panel.notifications.index', compact('notifications'));
	}
}
