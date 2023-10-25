<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


     public function up()
     {
     Schema::create('applications_education', function (Blueprint $table) {
        $table->id();
        $table->string('title1');
        $table->string('title2');
        $table->text('address2')->nullable();
        $table->string('university')->nullable();
        $table->string('credit_transfer')->nullable();
        $table->string('puniversity')->nullable();
        $table->string('gap')->nullable();
        $table->string('pre_applied')->nullable();
        $table->string('pen')->nullable();
        $table->string('CEGEP')->nullable();
        $table->string('english_school')->nullable();
        $table->string('language')->nullable();
        $table->string('main_language')->nullable();
        $table->date('s_study_date')->nullable();
        $table->string('school_name')->nullable();
        $table->string('completed_study')->nullable();
        $table->string('course_title')->nullable();
        $table->string('result')->nullable();
        $table->string('equivalence')->nullable();
        $table->string('currently_studying')->nullable();
        $table->string('previous_study')->nullable();
        $table->string('s_country')->nullable();
        $table->string('s_institution')->nullable();
        $table->string('completed_successfully')->nullable();
        $table->string('study_fultime')->nullable();
        $table->string('experience')->nullable();
        $table->string('employment_status')->nullable();
        $table->string('first_language')->nullable();
        $table->string('language_known')->nullable();
        $table->string('proficiency')->nullable();
        $table->string('language_demo')->nullable();
        $table->string('eng_course')->nullable();
        $table->string('r_contact_details')->nullable();
        $table->string('agent_contact')->nullable();
        $table->string('contact_name')->nullable();
        $table->string('contact_mobile')->nullable();
        $table->string('contact_email')->nullable();
        $table->string('passport')->nullable();
        $table->string('passport_number')->nullable();
        $table->string('visa')->nullable();
        $table->string('visa_apply_note')->nullable();
        $table->string('married')->nullable();
        $table->string('citizenship')->nullable();
        $table->string('app_submitted_from')->nullable();
        $table->string('status_in_canada')->nullable();
        $table->string('sponcership_gov')->nullable();
        $table->string('receive_scholarship')->nullable();
        $table->string('medical_agreement')->nullable();
        $table->text('admission_note')->nullable();
        $table->text('notesContent')->nullable();
        $table->string('student_id')->nullable();
        $table->string('recruiter_id')->nullable();
        $table->string('communicationMedium')->nullable();
        $table->unsignedBigInteger('personal_id');
        $table->foreign('personal_id')->references('id')->on('applications_personal');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('applications_education');
}
};
