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
            $table->string('application_submitted')->nullable();
            $table->string('lodge_institution')->nullable();
            $table->string('offer_received')->nullable();
            $table->string('visa_granted')->nullable();
            $table->string('student_commenced')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
