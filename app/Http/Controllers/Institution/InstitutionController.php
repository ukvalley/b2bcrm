<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Storage;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class InstitutionController extends Controller
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
        $institutions   = Institution::get();
        return view('institution.panel.dashboard', compact('institutions'));
    }

    public function EditProfile()
    {
        // Get the currently authenticated recruiter
        $institution = auth()->user()->institution;
        // $timezones = TimeZone::get();
        // print_r($recruiter);
        // die();

        return view('institution.panel.profile.edit_profile', compact('institution'));
    }
    public function UpdateProfile(Request $request)
    {
        // Validate the update data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate avatar upload
            // 'timezone' => 'required|string|exists:timezones,timezone', // Validate timezone exists in the timezones table
        ]);

        // Get the currently authenticated institute
        $institute = auth()->user()->institution;
        $user = $institute->user;

        $institute->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'city' => $request->input('city'),
         
        ]);

        $user->update([
            'name' => $request->input('name'), // Or any specific user data you want to update
            'email' => $request->input('email'),
            // Other user data...
        ]);

        if ($request->hasFile('logo')) {
            // Delete the old avatar if it exists
            if ($institute->logo) {
                Storage::disk('public')->delete($institute->logo);
            }
        
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('institute_img'), $fileName); // Store in the root folder
        
            // Set the logo attribute and save
            $institute->logo = $fileName;
            $institute->save();
        }
        



        return redirect()->route('institution.edit')->with('success', 'Profile updated successfully!');
    }


    public function editPassword()
    {
        return view('institution.panel.profile.update_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('institution.editPassword')->with('success', 'Password changed successfully.');
        } else {
            return back()->withErrors(['current_password' => 'Incorrect current password.'])->withInput();
        }
    }
}
