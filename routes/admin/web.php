<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

// dashboard routes

Route::get('home','App\Http\Controllers\Admin\AdminController@index')->name('admin.home');

//Settings display a specific project record 
Route::get('setting', 'App\Http\Controllers\Admin\ProjectController@show')->name('project.show');

// Update a specific project record
Route::put('setting/{id}','App\Http\Controllers\Admin\ProjectController@update')->name('project.update');

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
