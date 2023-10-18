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




Route::get('CourseBasic', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasic'])->name('institution.course_basic');




Route::post('CourseBasicRegistration', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicRegistration'])->name('institution.course_basic_registration');











Route::get('CourseBasicUpdate/{student_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicUpdate'])->name('institution.StudentBasicUpdate');

Route::post('CourseBasicUpdateRegistration', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicUpdateRegistration'])->name('institution.StudentBasicUpdateRegistration');

