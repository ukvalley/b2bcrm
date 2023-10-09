<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RecruiterRegistrationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recruiter/registration/step1', [RecruiterRegistrationController::class, 'step1']);

Route::get('/recruiter/registration/step2', [RecruiterRegistrationController::class, 'step2']);

Route::post('/recruiter/registration/step2', [RecruiterRegistrationController::class, 'step2'])->name('recruiter.registration.step2');

Route::get('/recruiter/registration/step3', [RecruiterRegistrationController::class, 'step3']);
Route::post('/recruiter/registration/step3', [RecruiterRegistrationController::class, 'step3'])->name('recruiter.registration.step3');

Route::get('/recruiter/registration/step4', [RecruiterRegistrationController::class, 'step4']);

Route::post('/recruiter/registration/step4', [RecruiterRegistrationController::class, 'step4'])->name('recruiter.registration.step4');

Route::post('/recruiter/registration/step5', [RecruiterRegistrationController::class, 'step5'])->name('recruiter.registration.step5');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


