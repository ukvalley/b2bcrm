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
        Schema::create('institutions', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->foreignId('user_id')->constrained(); // Assuming "user_id" is a foreign key to the "users" table
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('contact_person');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('institution_type');
            $table->boolean('accreditation_status');
            $table->integer('number_of_students');
            $table->integer('year_founded');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('accept_terms');
            $table->boolean('authorized_signup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
