<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('project_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_description')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->text('footer_text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_settings');
    }
}
