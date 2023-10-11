<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

// dashboard routes

Route::get('home', [App\Http\Controllers\Agent\AgentController::class, 'index'])->name('agent.home');

// profile routes

Route::get('EditProfile', [App\Http\Controllers\Agent\AgentController::class, 'EditProfile'])->name('agent.edit');
Route::put('UpdateProfile', [App\Http\Controllers\Agent\AgentController::class, 'UpdateProfile'])->name('agent.UpdateProfile');

Route::get('EditSecurity', [App\Http\Controllers\Agent\AgentController::class, 'EditProfile'])->name('agent.security');

Route::get('PasswordChange', [App\Http\Controllers\Agent\AgentController::class, 'editPassword'])->name('agent.editPassword');

Route::post('PasswordUpdate', [App\Http\Controllers\Agent\AgentController::class, 'updatePassword'])->name('agent.updatePassword');



// student registration and updation routes



Route::get('StudentBasic', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasic'])->name('agent.student_basic');




Route::post('StudentBasicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasicRegistration'])->name('agent.student_basic_registration');

Route::get('StudentAcademic/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademic'])->name('agent.student_academic');

Route::post('StudentAcademicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademicRegistration'])->name('agent.student_academic_registration');


Route::get('StudentPersona/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersona'])->name('agent.student_persona');

Route::post('StudentPersonaRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersonaRegistration'])->name('agent.student_persona_registration');


Route::get('StudentStudyPreferance/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentStudyPreferance'])->name('agent.StudentStudyPreferance');

Route::post('StudentStudyPreferanceRegstration', [App\Http\Controllers\Agent\StudentController::class, 'StudentStudyPreferanceRegstration'])->name('agent.StudentStudyPreferanceRegstration');









