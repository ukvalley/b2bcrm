<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterRegistrationController;

Route::get('home', [App\Http\Controllers\Agent\AgentController::class, 'index'])->name('agent.home');

Route::get('StudentBasic', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasic'])->name('agent.student_basic');

Route::post('StudentBasicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasicRegistration'])->name('agent.student_basic_registration');

Route::get('StudentAcademic', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademic'])->name('agent.student_academic');


Route::post('StudentAcademicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademicRegistration'])->name('agent.student_academic_registration');



