<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\CountryData;

class LinksController extends Controller
{

    public function linksindex()
    {
        $links = Links::all(); // Fetch all records from the table.
        return view('admin.panel.countries.links.index', compact('links'));
    }

    public function linkscreate()
    {
        $countrydata = CountryData::all();
        return view('admin.panel.countries.links.create', compact('countrydata'));
    }

    public function linksstore(Request $request)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'country_id' => 'required',
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Create a new record.
        Links::create($validatedData);
        return redirect()->route('country-data.links.index')->with('success', 'Record created successfully.');
    }

    // public function linksshow($id)
    // {
    //     $countryData = Links::find($id); // Find the record by its ID.
    //     return view('admin.panel.countries.links.countrydata', compact('countryData'));
    // }

    public function linksedit($id)
    {
        $countrydata = CountryData::all();
        $link = Links::find($id); // Find the record by its ID.
        return view('admin.panel.countries.links.edit', compact('link','countrydata'));
    }

    public function linksupdate(Request $request, $id)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'country_id' => 'required',
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Update the existing record.
        $links = Links::find($id);
        if ($links) {
            // Update the existing record.
            $links->update($validatedData);
            return redirect()->route('country-data.links.index')->with('success', 'Record updated successfully.');
        } else {
            return redirect()->route('country-data.links.index')->with('error', 'Record not found.');
        }
        
        // $news->update($validatedData);
        // return redirect()->route('country-data.links.index')->with('success', 'Record updated successfully.');
    }

}
