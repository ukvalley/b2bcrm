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

}
