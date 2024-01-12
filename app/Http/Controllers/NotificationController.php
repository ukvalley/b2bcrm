<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function index()
	{
		$id= Auth::user()->id;
		//Retrieve and show notifications in the admin panel
		$notifications =Notification::where('user_id', $id)->get();
		return view('notifications.index', compact('notifications'));
	}
}
