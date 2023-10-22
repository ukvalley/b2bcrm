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
        Schema::create('course_batches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->enum('status', ['Active', 'Inactive', 'Batch_full'])->default('Active');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('batch_id')->references('id')->on('batches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_batches');
    }
};
