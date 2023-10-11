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
        Schema::create('persona_details', function (Blueprint $table) {
    $table->id();
    $table->foreignId('student_id')->constrained(); // Create a foreign key relationship with the student table.
    $table->string('address1');
    $table->string('address2')->nullable();
    $table->string('city');
    $table->string('state_province');
    $table->string('country'); // You can make it a foreign key to a "countries" table.
    $table->string('postcode');
    $table->date('date_of_birth');
    $table->string('marital_status');
    $table->string('timezone');
    $table->string('currency');
    $table->string('image_profile')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_details');
    }
};
