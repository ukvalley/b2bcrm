<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

// dashboard routes

Route::get('home', [App\Http\Controllers\Institution\InstitutionController::class, 'index'])->name('institution.home');

// profile routes

Route::get('EditProfile', [App\Http\Controllers\Institution\InstitutionController::class, 'EditProfile'])->name('institution.edit');
Route::put('UpdateProfile', [App\Http\Controllers\Institution\InstitutionController::class, 'UpdateProfile'])->name('institution.UpdateProfile');

Route::get('EditSecurity', [App\Http\Controllers\Institution\InstitutionController::class, 'EditProfile'])->name('institution.security');

Route::get('PasswordChange', [App\Http\Controllers\Institution\InstitutionController::class, 'editPassword'])->name('institution.editPassword');

Route::post('PasswordUpdate', [App\Http\Controllers\Institution\InstitutionController::class, 'updatePassword'])->name('institution.updatePassword');


