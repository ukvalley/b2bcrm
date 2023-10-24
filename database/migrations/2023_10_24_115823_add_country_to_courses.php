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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('country')->nullable(); // You can change 'string' to the appropriate data type.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->dropColumn('country');
    });
}
};
