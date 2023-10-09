<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
