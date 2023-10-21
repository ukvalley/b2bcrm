<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

// dashboard routes

Route::get('home','App\Http\Controllers\Admin\AdminController@index')->name('admin.home');

//Settings display a specific project record 
Route::get('setting', 'App\Http\Controllers\Admin\ProjectController@show')->name('project.show');

// Update a specific project record
Route::put('setting/{id}','App\Http\Controllers\Admin\ProjectController@update')->name('project.update');


//NEWS ROUTE
Route::get('country-data/news', 'App\Http\Controllers\Admin\NewsController@newsindex')->name('country-data.news.index'); // List all Country Data`s News records
Route::get('country-data/news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@newsedit')->name('country-data.news.edit'); // Display the form to edit a specific Country Data`s News record
Route::put('country-data/news{id}', 'App\Http\Controllers\Admin\NewsController@newsupdate')->name('country-data.news.update'); // Update a specific Country Data`s News record
Route::get('country-data/news/create', 'App\Http\Controllers\Admin\NewsController@newscreate')->name('country-data.news.create'); // Display the form to create a new Country Data`s News record
Route::post('country-data/news', 'App\Http\Controllers\Admin\NewsController@newsstore')->name('country-data.news.store'); // Create a new Country Data`s News record
Route::get('country-data/news/{id}', 'App\Http\Controllers\Admin\NewsController@show')->name('country-data.news.show'); // Display a specific Country Data`s News record

// LINKS ROUTE
Route::get('country-data/links', 'App\Http\Controllers\Admin\LinksController@linksindex')->name('country-data.links.index'); // List all Country Data`s Links records
Route::get('country-data/links/{id}/edit', 'App\Http\Controllers\Admin\LinksController@linksedit')->name('country-data.links.edit'); // Display the form to edit a specific Country Data`s Links record
Route::put('country-data/links{id}', 'App\Http\Controllers\Admin\LinksController@linksupdate')->name('country-data.links.update'); // Update a specific Country Data`s Links record
Route::get('country-data/links/create', 'App\Http\Controllers\Admin\LinksController@linkscreate')->name('country-data.links.create'); // Display the form to create a new Country Data`s Links record
Route::post('country-data/links', 'App\Http\Controllers\Admin\LinksController@linksstore')->name('country-data.links.store'); // Create a new Country Data`s Links record
Route::get('country-data/links/{id}', 'App\Http\Controllers\Admin\LinksController@linksshow')->name('country-data.links.show'); // Display a specific Country Data`s Links record

// List all country_data records
Route::get('country-data', 'App\Http\Controllers\Admin\CountryDataController@index')->name('country-data.index');

// Display the form to create a new country_data record
Route::get('country-data/create', 'App\Http\Controllers\Admin\CountryDataController@create')->name('country-data.create');

// Store a new country_data record
Route::post('country-data', 'App\Http\Controllers\Admin\CountryDataController@store')->name('country-data.store');

// Display a specific country_data record
Route::get('country-data/{id}', 'App\Http\Controllers\Admin\CountryDataController@show')->name('country-data.show');

// Display the form to edit a specific country_data record
Route::get('country-data/{id}/edit', 'App\Http\Controllers\Admin\CountryDataController@edit')->name('country-data.edit');

// Update a specific country_data record
Route::put('admin/country-data/{country_data}', 'App\Http\Controllers\Admin\CountryDataController@update')->name('admin.country-data.update');

// Delete a specific country_data record
Route::delete('country-data/{id}', 'App\Http\Controllers\Admin\CountryDataController@destroy')->name('country-data.destroy');


Route::get('migrate_db', 'App\Http\Controllers\Admin\CountryDataController@migrate_db')->name('migrate_db');


