<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Storage;
use App\Models\CountryData;
use Illuminate\Support\Facades\Artisan;



class AgentController extends Controller
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

        return view('recruiter.panel.dashboard');
    }

    public function EditProfile()
    {
         // Get the currently authenticated recruiter
        $recruiter = auth()->user()->recruiter;
        $timezones = TimeZone::get();

       // print_r($recruiter);
       // die();

        return view('recruiter.panel.profile.edit_profile', compact('recruiter','timezones'));

    }
    public function UpdateProfile(Request $request)
    {
        // Validate the update data
    $request->validate([
        'company_name' => 'required|string|max:255',
        'company_short_name' => 'required|string|max:255',
        'client_id' => 'required|string|max:255',
        'your_role' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate avatar upload
        'timezone' => 'required|string|exists:timezones,timezone', // Validate timezone exists in the timezones table
    ]);
  



    // Get the currently authenticated recruiter
    $recruiter = auth()->user()->recruiter;

     $recruiter->update([
        'company_name' => $request->input('company_name'),
        'company_short_name' => $request->input('company_short_name'),
        'client_id' => $request->input('client_id'),
        'your_role' => $request->input('your_role'),
        'timezone' => $request->input('timezone'), // Assign the selected timezone
    ]);

     if ($request->hasFile('avatar')) {
        // Delete the old avatar if it exists
        if ($recruiter->avatar) {
            Storage::disk('public')->delete($recruiter->avatar);
        }

        
        
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avtar'), $fileName); // Store in the root folder

           
        

        
        $recruiter->update(['avatar' => $fileName]);
    }

    

    return redirect()->route('agent.edit')->with('success', 'Profile updated successfully!');

    }


    public function editPassword()
{
    return view('recruiter.panel.profile.update_password');
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

        return redirect()->route('user.editPassword')->with('success', 'Password changed successfully.');
    } else {
        return back()->withErrors(['current_password' => 'Incorrect current password.'])->withInput();
    }
}


    public function countries()
    {
        $CountryData = CountryData::get();
        return view('recruiter.panel.countries.countries',compact('CountryData'));

    }

    public function country_details($id)
    {
        $countryData = CountryData::find($id);
        $news = $countryData->news()->get();
        $links = $countryData->links()->get();
        return view('recruiter.panel.countries.country_details',compact('countryData','news','links'));

    }


    

}
