<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSetting;
use Illuminate\Http\Request;
use App\Models\CountryData;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function show()
    {
        $data = ProjectSetting::find(1); // Find the record by its ID.
        // return view('admin.panel.projects.edit', compact('data'));
        return view('admin.panel.profile', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:65535',
            'secondary_color' => 'nullable|string|max:255',
            'primary_color' => 'nullable|string|max:255',
            'youtube_link' => 'nullable|string|max:255',
            // 'site_logo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'site_favicon' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the existing record.
        $data = ProjectSetting::find($id);
        
        $data->update($validatedData);

        if ($request->hasFile('site_logo')) {

            $logo_directory = "images/projects/logo/";
            // Delete the old logo if it exists
            if (Storage::disk('public')->exists($logo_directory . $data->site_logo)) {
                Storage::disk('public')->delete($logo_directory . $data->site_logo);
            }

            $file = $request->file('site_logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/projects/logo'), $fileName); // Store in the root folder

            $data->update(['site_logo' => '' . $fileName]);
        }

        if ($request->hasFile('site_favicon')) {

            // Delete the old logo if it exists
            if ($data->site_logo) {
                $favicon_directory = "images/projects/favicon/";
                Storage::disk('public')->delete($favicon_directory . $data->site_favicon);
            }

            $faviconfile = $request->file('site_favicon');
            $faviconfileName = time() . '_' . $faviconfile->getClientOriginalName();
            $faviconfile->move(public_path('images/projects/site_favicon'), $faviconfileName); // Store in the root folder

            $data->update(['site_favicon' => '' . $faviconfileName]);
        }

        
        return redirect()->route('project.show')->with('success', 'Record updated successfully.');
    }


}
