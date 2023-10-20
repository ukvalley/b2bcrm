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
        Schema::table('institutions', function (Blueprint $table) {
            $table->text('overview')->nullable()->after('description');
            // Change 'other_column_name' to the name of the column after which you want to add 'overview'
        });
    }

    public function down()
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->dropColumn('overview');
        });
    }
};
