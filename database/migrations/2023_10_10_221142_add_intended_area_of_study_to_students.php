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
        Schema::table('students', function (Blueprint $table) {
            $table->string('intended_area_of_study')->nullable();
            $table->string('intended_course_level')->nullable();
            $table->text('courses_or_fields_comments')->nullable();
            $table->text('career_paths')->nullable();
            $table->string('intended_institution')->nullable();
            $table->string('intended_intake_quarter')->nullable();
            $table->integer('intended_intake_year')->nullable();
            $table->text('intended_intake_comments')->nullable();
            $table->string('funding_source')->nullable();
            $table->string('intended_destination_1')->nullable();
            $table->string('intended_destination_2')->nullable();
            $table->string('intended_destination_3')->nullable();
            $table->text('intended_destination_comments')->nullable();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'intended_area_of_study',
                'intended_course_level',
                'courses_or_fields_comments',
                'career_paths',
                'intended_institution',
                'intended_intake_quarter',
                'intended_intake_year',
                'intended_intake_comments',
                'funding_source',
                'intended_destination_1',
                'intended_destination_2',
                'intended_destination_3',
                'intended_destination_comments',
            ]);
        });
    }
};
