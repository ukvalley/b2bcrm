<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
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

}
