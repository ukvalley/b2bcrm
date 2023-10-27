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
        //
         Schema::table('institutions', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('website')->nullable()->change();
            $table->string('contact_person')->nullable()->change();
            $table->string('contact_email')->nullable()->change();
            $table->string('contact_phone')->nullable()->change();
            $table->string('overview')->nullable()->change();
            $table->string('institution_type')->nullable()->change();
            $table->string('accreditation_status')->nullable()->change();
            $table->string('number_of_students')->nullable()->change();
            $table->string('year_founded')->nullable()->change();
            $table->string('logo')->nullable()->change();
            $table->string('accept_terms')->nullable()->change();
            $table->string('authorized_signup')->nullable()->change();

   

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
