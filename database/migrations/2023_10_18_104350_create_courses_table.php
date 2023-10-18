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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id');
            $table->string('name');
            $table->string('level');
            $table->string('course_code');
            $table->string('currency');
            $table->decimal('tuition_fee', 10, 2); // Adjust precision and scale as needed
            $table->integer('duration'); // You can change this data type based on your needs
            $table->string('duration_type'); // "week" or "year" for example
            $table->decimal('application_fees', 10, 2); // Adjust precision and scale as needed
            $table->string('fees_type');
            $table->string('code');
            $table->text('summary');
            $table->text('attendance_pattern');
            $table->text('learning_objectives');
            $table->text('outcomes');
            $table->text('course_particulars');
            $table->text('admission_requirements');
            $table->text('international_students');
            $table->text('english_requirements');
            $table->string('course_dates');
            $table->text('institution_overview');
            $table->text('key_selling_points');
            $table->string('institution_type');
            $table->string('university_ownership');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
