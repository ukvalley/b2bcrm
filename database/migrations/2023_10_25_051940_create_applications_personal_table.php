<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('applications_personal', function (Blueprint $table) {
            $table->id();

            // Add the 'student_id' field to the table
            $table->unsignedBigInteger('student_id')->nullable();

            $table->string('title');
            $table->string('fname');
            $table->string('pname');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('born')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postcode')->nullable();
            $table->string('current_country')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
            $table->string('number')->nullable();
            $table->string('semail')->nullable();
            $table->string('wid')->nullable();
            $table->string('e_address')->nullable();
            $table->string('lang_of_c')->nullable();
            $table->string('disability')->nullable();
            $table->timestamps();

            // Add a foreign key constraint for the 'student_id' field
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::table('applications_personal', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('applications_personal');
    }
};
