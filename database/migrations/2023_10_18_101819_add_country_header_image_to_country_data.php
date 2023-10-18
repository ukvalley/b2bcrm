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
        Schema::table('country_data', function (Blueprint $table) {
        $table->string('country_header_image')->nullable(); // Define the field with 'nullable' if it's optional.
        $table->string('youtube_link')->nullable(); // Define the field with 'nullable' if it's optional.
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('country_data', function (Blueprint $table) {
            //
        });
    }
};
