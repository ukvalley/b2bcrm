<?php

namespace Database\Seeders;
use PragmaRX\Countries\Package\Services\Config;
use PragmaRX\Countries\Package\Services\Countries;
use DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        // Initialize the countries package
        $countries = new Countries(new Config());

        // Get all countries
        $allCountries = $countries->all();

        // Seed the countries table
        foreach ($allCountries as $country) {
            DB::table('countries')->insert([
                'name' => $country->name->common,
                'code' => $country->cca2,
            ]);
        }
    }
}
