<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->default('')->nullable();;
            $table->foreignId('user_id')->constrained(); // Assuming "user_id" is a foreign key to the "users" table
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('current_school')->default('')->nullable();
            $table->string('field_of_study')->default('')->nullable();
            $table->unsignedInteger('expected_graduation_year')->nullable();;
            $table->text('academic_interests')->default('')->nullable();
            $table->string('gpa')->nullable();;
            $table->text('languages_spoken')->default('')->nullable();
            $table->text('language_proficiency_levels')->default('')->nullable();
            $table->text('test_scores')->default('')->nullable();
            $table->text('test_dates')->default('')->nullable();
            $table->text('extracurricular_activities')->default('')->nullable();
            $table->text('leadership_roles')->default('')->nullable();
            $table->text('interests_and_hobbies')->default('')->nullable();
            $table->string('desired_major')->default('')->nullable();
            $table->text('future_career_goals')->default('')->nullable();
            $table->text('uploads')->nullable()->default('')->nullable();
            $table->text('additional_information')->nullable();
            $table->string('how_they_heard')->nullable();
            $table->text('special_accommodations')->nullable();
            $table->string('username')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};


