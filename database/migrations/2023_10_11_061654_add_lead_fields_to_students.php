<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
    $table->enum('lead_status', ['cold', 'pending', 'warm', 'hot'])->nullable();
    $table->enum('prospect_rating', ['1star', '2star', '3star', '4star', '5star'])->nullable();
    $table->date('preferred_appointment_date')->nullable();
    $table->time('preferred_appointment_time')->nullable();
    $table->string('lead_source')->nullable();
    $table->text('candidate_comments')->nullable();
    $table->string('signup_country')->nullable();
    $table->string('signup_city')->nullable();
    $table->string('signup_state_province')->nullable();
    $table->string('signup_ip')->nullable();
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
