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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('current_visa')->nullable(); // Make the field nullable
            $table->string('current_visa_application')->nullable();
            $table->string('criminal_activity')->nullable();
            $table->string('old_visa')->nullable();
            $table->string('sibling')->nullable();
            $table->string('married')->nullable();
            $table->string('spouse')->nullable();
            $table->string('child')->nullable();
            $table->string('funding')->nullable();
            $table->string('s_fund')->nullable();
            $table->string('r_sponcer')->nullable();
            $table->string('award')->nullable();
            $table->string('s_occupation')->nullable();
            $table->string('visa_funding')->nullable();
            $table->string('student_id')->nullable();
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visas');
    }
};