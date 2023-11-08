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



// countries

Route::get('countries', [App\Http\Controllers\Agent\AgentController::class, 'countries'])->name('agent.countries');
Route::get('country_details/{id}', [App\Http\Controllers\Agent\AgentController::class, 'country_details'])->name('agent.country_details');



// student registration and updation routes







Route::get('StudentBasic', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasic'])->name('agent.student_basic');




Route::post('StudentBasicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasicRegistration'])->name('agent.student_basic_registration');

Route::get('StudentAcademic/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademic'])->name('agent.student_academic');

Route::post('StudentAcademicRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentAcademicRegistration'])->name('agent.student_academic_registration');


Route::get('StudentPersona/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersona'])->name('agent.student_persona');

Route::post('StudentPersonaRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersonaRegistration'])->name('agent.student_persona_registration');


Route::get('StudentStudyPreferance/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentStudyPreferance'])->name('agent.StudentStudyPreferance');

Route::post('StudentStudyPreferanceRegstration', [App\Http\Controllers\Agent\StudentController::class, 'StudentStudyPreferanceRegstration'])->name('agent.StudentStudyPreferanceRegstration');


Route::get('StudentLeadTracking/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentLeadTracking'])->name('agent.StudentLeadTracking');

Route::post('StudentLeadTrackingRegstration', [App\Http\Controllers\Agent\StudentController::class, 'StudentLeadTrackingRegstration'])->name('agent.StudentLeadTrackingRegstration');

Route::get('StudentPersonalDetail/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersonalDetail'])->name('agent.StudentPersonalDetail');

Route::post('StudentPersonalDetailRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentPersonalDetailRegistration'])->name('agent.StudentPersonalDetailRegistration');




Route::get('StudentBasicUpdate/{student_id}', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasicUpdate'])->name('agent.StudentBasicUpdate');

Route::post('StudentBasicUpdateRegistration', [App\Http\Controllers\Agent\StudentController::class, 'StudentBasicUpdateRegistration'])->name('agent.StudentBasicUpdateRegistration');


Route::get('getStudents', [App\Http\Controllers\Agent\StudentController::class,'getStudents'])->name('agent.getStudents');

Route::get('Students', [App\Http\Controllers\Agent\StudentController::class,'Students'])->name('agent.Students');

Route::get('PreviewStudents/{id}', [App\Http\Controllers\Agent\StudentController::class,'PreviewStudents'])->name('agent.PreviewStudents');




// notes section


Route::post('StudentAddNotes', [App\Http\Controllers\Agent\StudentController::class, 'StudentAddNotes'])->name('agent.StudentAddNotes');


Route::put('/tasks/{task}/complete', 'App\Http\Controllers\Agent\StudentController@complete')->name('agent.task.complete');



// course search options

Route::get('CourseSearch/{id}', [App\Http\Controllers\Agent\StudentController::class,'CourseSearch'])->name('agent.CourseSearch');



Route::get('CourseDetails/{id}', [App\Http\Controllers\Agent\StudentController::class,'CourseDetails'])->name('agent.CourseDetails');



//ShortList

Route::get('ShortListView/{id}', [App\Http\Controllers\Agent\StudentController::class, 'ShortListView'])->name('agent.ShortListView');

// student application form



Route::get('showApplicationForm/{id}', [App\Http\Controllers\Agent\ApplicationFormController::class,'showApplicationForm'])->name('agent.showApplicationForm');
Route::get('DocumentsUpload/{id}', [App\Http\Controllers\Agent\ApplicationFormController::class,'DocumentsUpload'])->name('agent.DocumentsUpload');
Route::post('/uploadDocument', [App\Http\Controllers\Agent\ApplicationFormController::class,'uploadDocument'])->name('agent.uploadDocument');

Route::post('/updatedocument/{id}', [App\Http\Controllers\Agent\ApplicationFormController::class,'updatedocument'])->name('agent.updatedocument');

Route::get('/deleteDocument/{id}', [App\Http\Controllers\Agent\ApplicationFormController::class,'deleteDocument'])->name('agent.deleteDocument');


Route::post('personalApplicationForm', [App\Http\Controllers\Agent\ApplicationFormController::class, 'personalApplicationForm'])->name('agent.personalApplicationForm');


// Handle adding courses to the shortlist
Route::post('/shortlist/add', 'App\Http\Controllers\Agent\StudentController@addCourse')->name('agent.shortlist.add');





Route::post('educationUpdate', [App\Http\Controllers\Agent\ApplicationFormController::class, 'educationUpdate'])->name('agent.educationUpdate');
Route::post('languageUpdate', [App\Http\Controllers\Agent\ApplicationFormController::class, 'languageUpdate'])->name('agent.languageUpdate');
Route::post('adminstrationUpdate', [App\Http\Controllers\Agent\ApplicationFormController::class, 'adminstrationUpdate'])->name('agent.adminstrationUpdate');
Route::post('preferenceUpdate', [App\Http\Controllers\Agent\ApplicationFormController::class, 'preferenceUpdate'])->name('agent.preferenceUpdate');



// all courses
Route::get('/course_all', [App\Http\Controllers\Agent\AgentController::class,'course_all'])->name('agent.course_all');




