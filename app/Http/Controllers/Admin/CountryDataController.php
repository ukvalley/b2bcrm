<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryData;

class CountryDataController extends Controller
{




    public function index()
{
    $countries = CountryData::all(); // Fetch all records from the table.
    return view('admin.panel.countries.index', compact('countries'));
}

public function create()
{
    return view('admin.panel.countries.create');
}

public function store(Request $request)
{
    // Validate user input.
    $validatedData = $request->validate([
        'country_name' => 'required',
        'country_name' => 'required|string|max:255',
        'urban_environment' => 'required|string',
        'diverse_scenery' => 'required|string',
        'distinctive_native_animals' => 'required|string',
        'student_cities' => 'required|string',
        'country_header_image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'youtube_link' => 'sometimes|nullable|string|max:255',

    ]);

    // Create a new record.
    $CuountryData =CountryData::create($validatedData);



    if ($request->hasFile('country_header_image')) {
        // Delete the old avatar if it exists
        

        
        
            $file = $request->file('country_header_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/country_header_image'), $fileName); // Store in the root folder

           
        

        
        $CuountryData->update(['country_header_image' => '' . $fileName]);
    }



    return redirect()->route('country-data.index')->with('success', 'Record created successfully.');
}
public function show($id)
{
    $country = CountryData::find($id); // Find the record by its ID.
    return view('admin.countries.show', compact('country'));
}
public function edit($id)
{
    $countryData = CountryData::find($id); // Find the record by its ID.
    return view('admin.panel.countries.edit', compact('countryData'));
}
public function update(Request $request, $id)
{
    // Validate user input.
    $validatedData = $request->validate([
        'country_name' => 'required',
        'country_name' => 'required|string|max:255',
        'urban_environment' => 'required|string',
        'diverse_scenery' => 'required|string',
        'distinctive_native_animals' => 'required|string',
        'student_cities' => 'required|string',
        'country_header_image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'youtube_link' => 'sometimes|nullable|string|max:255',
    ]);

    // Update the existing record.
    $country = CountryData::find($id);
    $country->update($validatedData);

    if ($request->hasFile('country_header_image')) {
        // Delete the old avatar if it exists
        

        
        
            $file = $request->file('country_header_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/country_header_image'), $fileName); // Store in the root folder

           
        

        
        $country->update(['country_header_image' => '' . $fileName]);
    }

    return redirect()->route('country-data.index')->with('success', 'Record updated successfully.');
}
public function destroy($id)
{
    $country = CountryData::find($id); // Find the record by its ID.
    $country->delete();

    return redirect()->route('country-data.index')->with('success', 'Record deleted successfully.');
}

}
