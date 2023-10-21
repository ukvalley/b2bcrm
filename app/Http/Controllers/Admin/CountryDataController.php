<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\CountryData;
use Illuminate\Support\Facades\Artisan;


class CountryDataController extends Controller
{


     public function migrate_db()
    {
        Artisan::call('migrate');

        // Capture the output of the migration command
        $output = Artisan::output();

        // Return the migration output or a success message
        return $output ?: 'Migrations completed successfully.';

    }



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
        //print_r($request->input('information_data')); die();
        // Validate user input.
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'information_data' => 'nullable|string|max:65535',
            'country_header_image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'sometimes|nullable|string|max:9999',

        ]);

        // print_r($validatedData); die();

        // Create a new record.
        $CuountryData = CountryData::create($validatedData);





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
        $countryData = CountryData::find($id); // Find the record by its ID.
        $news = [null];
        return view('admin.panel.countries.countrydata', compact('countryData', 'news'));
    }
    public function edit($id)
    {
        $countryData = CountryData::with('links', 'news')->find($id); // Find the record by its ID.
        return view('admin.panel.countries.edit', compact('countryData'));
    }
    public function update(Request $request, $id)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'information_data' => 'nullable|string|max:65535',
            'country_header_image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'sometimes|nullable|string|max:9999',
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
