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

Route::get('CourseBasic2/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasic2'])->name('institution.course_Basic2');

Route::get('CourseBasic3/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasic3'])->name('institution.course_basic3');



Route::post('CourseBasicRegistration', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicRegistration'])->name('institution.course_basic_registration');

Route::post('CourseBasicRegistration2/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourceBasicResistration2'])->name('institution.course_basic_registration2');
Route::post('CourseBasicRegistration3/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicRegistration3'])->name('institution.course_basic_registration3');



Route::get('course', [App\Http\Controllers\Institution\CourceController::class, 'course'])->name('institution.course');
Route::get('getCourse', [App\Http\Controllers\Institution\CourceController::class,'getCourse'])->name('institution.getCourse');
Route::get('courseView/{course_id}', [App\Http\Controllers\Institution\CourceController::class,'courseById'])->name('institution.courseView');
Route::get('previewCourse', [App\Http\Controllers\Institution\CourceController::class, 'previewCourse'])->name('institution.previewCourse');
Route::get('courseView', [App\Http\Controllers\Institution\CourceController::class, 'courseView'])->name('institution.course_view');



Route::get('CourseBasicUpdate/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicUpdate'])->name('institution.CourseBasicUpdate');

Route::post('CourseBasicUpdateRegistration/{course_id}', [App\Http\Controllers\Institution\CourceController::class, 'CourseBasicUpdateRegistration'])->name('institution.CourseBasicUpdateRegistration');

