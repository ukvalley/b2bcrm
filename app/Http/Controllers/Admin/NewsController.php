<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\CountryData;

class NewsController extends Controller
{

    public function newsindex()
    {
        $news = News::all(); // Fetch all records from the table.
        return view('admin.panel.countries.news.index', compact('news'));
    }


    public function newscreate()
    {
        $countrydata = CountryData::all();
        return view('admin.panel.countries.news.create', compact('countrydata'));
    }

    public function newsstore(Request $request)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'country_id' => 'required',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:65535',
        ]);

        // Create a new record.
        News::create($validatedData);

        return redirect()->route('country-data.news.index')->with('success', 'Record created successfully.');
    }

    // public function newsshow($id)
    // {
    //     $countryData = News::find($id); // Find the record by its ID.
    //     return view('admin.panel.countries.news.countrydata', compact('countryData'));
    // }
    public function newsedit($id)
    {
        $countrydata = CountryData::all();
        $news = News::find($id); // Find the record by its ID.
        return view('admin.panel.countries.news.edit', compact('news','countrydata'));
    }

    public function newsupdate(Request $request, $id)
    {
        // Validate user input.
        $validatedData = $request->validate([
            'country_id' => 'required',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:65535',
        ]);

        // Update the existing record.
        $news = News::find($id);
        $news->update($validatedData);
        return redirect()->route('country-data.news.index')->with('success', 'Record updated successfully.');
    }

}
