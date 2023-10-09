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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming "user_id" is a foreign key to the "users" table
            $table->string('company_name');
            $table->string('company_short_name');
            $table->string('client_id')->default('');
            $table->string('your_role')->default('');
            $table->integer('country_count')->default(0);
            $table->string('employee_count')->default(0);
            $table->integer('students_sent_count')->default(0);
            $table->string('aimed_students_count')->default(0);
            $table->timestamps();
        });
    }

 public function down()
    {
        Schema::dropIfExists('recruiters');
    }

};
