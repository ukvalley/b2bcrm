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
        Schema::table('country_data', function (Blueprint $table) {
            // Change the 'youtube_link' column from VARCHAR to TEXT
            $table->text('youtube_link')->change();
        });
    }

    public function down()
    {
        Schema::table('country_data', function (Blueprint $table) {
            // Change the 'youtube_link' column back to VARCHAR (if needed)
            $table->string('youtube_link')->change();
        });
    }
};
