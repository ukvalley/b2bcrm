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
            $table->string('level')->nullable();
            $table->string('course_code')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('tuition_fee', 10, 2)->nullable(); // Adjust precision and scale as needed
            $table->integer('duration')->nullable(); // You can change this data type based on your needs
            $table->string('duration_type')->nullable(); // "week" or "year" for example
            $table->decimal('application_fees', 10, 2)->nullable(); // Adjust precision and scale as needed
            $table->string('fees_type')->nullable();
            $table->string('code')->nullable();
            $table->text('summary')->nullable();
            $table->text('attendance_pattern')->nullable();
            $table->text('learning_objectives')->nullable();
            $table->text('outcomes')->nullable();
            $table->text('course_particulars')->nullable();
            $table->text('admission_requirements')->nullable();
            $table->text('international_students')->nullable();
            $table->text('english_requirements')->nullable();
            $table->string('course_dates')->nullable();
            $table->text('institution_overview')->nullable();
            $table->text('key_selling_points')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('university_ownership')->nullable();
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
