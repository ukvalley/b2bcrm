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
         Schema::create('country_data', function (Blueprint $table) {
        $table->id();
        $table->string('country_name');
        $table->text('urban_environment');
        $table->text('diverse_scenery');
        $table->text('distinctive_native_animals');
        $table->text('student_cities');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_data');
    }
};
