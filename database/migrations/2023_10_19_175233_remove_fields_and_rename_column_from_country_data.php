<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsAndRenameColumnFromCountryData extends Migration
{
    public function up()
    {
        Schema::table('country_data', function (Blueprint $table) {
            // Remove fields
            $table->dropColumn('diverse_scenery');
            $table->dropColumn('distinctive_native_animals');
            $table->dropColumn('student_cities');
            // Rename the 'urban_environment' column to 'information_data'
            DB::statement('ALTER TABLE country_data CHANGE urban_environment information_data TEXT');
        });
    }

    public function down()
    {
        Schema::table('country_data', function (Blueprint $table) {
            // Re-add the removed fields
            $table->text('diverse_scenery');
            $table->text('distinctive_native_animals');
            $table->text('student_cities');
            // Rename the 'information_data' column back to 'urban_environment'
            DB::statement('ALTER TABLE country_data CHANGE information_data urban_environment TEXT');
        });
    }
}
