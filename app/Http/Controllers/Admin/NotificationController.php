<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
	{
		$id= Auth::user()->id;
		//Retrieve and show notifications in the admin panel
		$notifications =Notification::where('user_id', $id)->get();
		return view('admin.panel.notifications.index', compact('notifications'));
	}
}
