<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\RecruiterRegistrationController;
use App\Http\Controllers\InstitutionRegistrationController;
use App\Http\Controllers\NotificationController;

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


Route::get('/check', function () {
    return view('welcome1');
});

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');




Route::get('/easyAddInstitute', [RecruiterRegistrationController::class, 'easyAddInstitute']);

Route::post('/easyAddInstitutePost', [RecruiterRegistrationController::class, 'easyAddInstitutePost'])->name('easyAddInstitutePost');



// routes for agent registration


Route::get('/recruiter/registration/step1', [RecruiterRegistrationController::class, 'step1']);

Route::get('/recruiter/registration/step2', [RecruiterRegistrationController::class, 'step2']);

Route::post('/recruiter/registration/step2', [RecruiterRegistrationController::class, 'step2'])->name('recruiter.registration.step2');

Route::get('/recruiter/registration/step3', [RecruiterRegistrationController::class, 'step3']);
Route::post('/recruiter/registration/step3', [RecruiterRegistrationController::class, 'step3'])->name('recruiter.registration.step3');

Route::get('/recruiter/registration/step4', [RecruiterRegistrationController::class, 'step4']);

Route::post('/recruiter/registration/step4', [RecruiterRegistrationController::class, 'step4'])->name('recruiter.registration.step4');

Route::post('/recruiter/registration/step5', [RecruiterRegistrationController::class, 'step5'])->name('recruiter.registration.step5');


  
   

// routes for institution registration

// Institution Registration Routes
Route::get('/institution/registration/step1', [InstitutionRegistrationController::class, 'step1']);
Route::post('/institution/registration/step1', [InstitutionRegistrationController::class, 'step1'])->name('institution.registration.step1');

Route::get('/institution/registration/step2', [InstitutionRegistrationController::class, 'step2']);
Route::post('/institution/registration/step2', [InstitutionRegistrationController::class, 'step2'])->name('institution.registration.step2');

Route::get('/institution/registration/step3', [InstitutionRegistrationController::class, 'step3']);
Route::post('/institution/registration/step3', [InstitutionRegistrationController::class, 'step3'])->name('institution.registration.step3');

Route::get('/institution/registration/step4', [InstitutionRegistrationController::class, 'step4']);
Route::post('/institution/registration/step4', [InstitutionRegistrationController::class, 'step4'])->name('institution.registration.step4');

Route::post('/institution/registration/step5', [InstitutionRegistrationController::class, 'step5'])->name('institution.registration.step5');



 
Auth::routes();

Route::group(["prefix" => "/agent", "middleware" => "CheckUserRole:Agent"], function () {
    require __DIR__.'/agent/web.php';

    // ...
}); 

Route::group(["prefix" => "/student", "middleware" => "CheckUserRole:Student"], function () {
    require __DIR__.'/student/web.php';

});

Route::group(["prefix" => "/institution", "middleware" => "CheckUserRole:Institution"], function () {
    require __DIR__.'/institution/web.php';

    // ...
});


Route::group(["prefix" => "/admin" , "middleware" => "CheckUserRole:Admin"], function () {
    require __DIR__.'/admin/web.php';

    // ...
});

//notification
Route::get('notification', [NotificationController::class, 'index'])->name('notification');

//messages
Route::get('message', [App\Http\Controllers\MessageController::class, 'message'])->name('message');
Route::get('message/{id}/{student_id}', [App\Http\Controllers\MessageController::class, 'messageView'])->name('message_view');
Route::post('send-message', [App\Http\Controllers\MessageController::class, 'messagesend'])->name('messagesend');
Route::post('fetch-messages', [App\Http\Controllers\MessageController::class, 'fetchMessages'])->name('fetchMessages');