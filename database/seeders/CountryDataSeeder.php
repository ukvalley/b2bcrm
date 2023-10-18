<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CountryData;

class CountryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CountryData::create([
            'country_name' => 'Country 1',
            'urban_environment' => 'Sample urban environment text for Country 1.',
            'diverse_scenery' => 'Sample diverse scenery text for Country 1.',
            'distinctive_native_animals' => 'Sample distinctive native animals text for Country 1.',
            'student_cities' => 'Sample student cities for Country 1.',
        ]);

        CountryData::create([
            'country_name' => 'Country 2',
            'urban_environment' => 'Sample urban environment text for Country 2.',
            'diverse_scenery' => 'Sample diverse scenery text for Country 2.',
            'distinctive_native_animals' => 'Sample distinctive native animals text for Country 2.',
            'student_cities' => 'Sample student cities for Country 2.',
        ]);

        // Add more sample data for other countries as needed.
    }
}
