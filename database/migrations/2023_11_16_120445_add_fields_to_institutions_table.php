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
         Schema::table('institutions', function (Blueprint $table) {
            // Add the new columns here
            $table->boolean('premium')->default(false); // Change 'false' to 'true' if it's a premium institution by default
            // Add more fields if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institutions', function (Blueprint $table) {
            //
        });
    }
};
