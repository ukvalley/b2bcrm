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

         $countries =  [
    "results" => [
        ["text" => "Adelie Land (France)", "id" => "Adelie Land (France)"],
        ["text" => "Andorra", "id" => "Andorra"],
        ["text" => "Australia", "id" => "Australia"],
        ["text" => "Austria", "id" => "Austria"],
        ["text" => "Belgium", "id" => "Belgium"],
        ["text" => "Brazil", "id" => "Brazil"],
        ["text" => "Cambodia", "id" => "Cambodia"],
        ["text" => "Canada", "id" => "Canada"],
        ["text" => "China", "id" => "China"],
        ["text" => "Croatia", "id" => "Croatia"],
        ["text" => "Cyprus", "id" => "Cyprus"],
        ["text" => "Czech Republic", "id" => "Czech Republic"],
        ["text" => "Denmark", "id" => "Denmark"],
        ["text" => "England", "id" => "England"],
        ["text" => "Finland", "id" => "Finland"],
        ["text" => "France", "id" => "France"],
        ["text" => "Georgia", "id" => "Georgia"],
        ["text" => "Germany", "id" => "Germany"],
        ["text" => "Ghana", "id" => "Ghana"],
        ["text" => "Greece", "id" => "Greece"],
        ["text" => "Grenada", "id" => "Grenada"],
        [
            "text" => "Hong Kong (SAR of China)",
            "id" => "Hong Kong (SAR of China)",
        ],
        ["text" => "Hungary", "id" => "Hungary"],
        ["text" => "India", "id" => "India"],
        ["text" => "Indonesia", "id" => "Indonesia"],
        ["text" => "Ireland", "id" => "Ireland"],
        ["text" => "Italy", "id" => "Italy"],
        ["text" => "Japan", "id" => "Japan"],
        ["text" => "Kazakhstan", "id" => "Kazakhstan"],
        ["text" => "South Korea", "id" => "South Korea"],
        ["text" => "Lebanon", "id" => "Lebanon"],
        ["text" => "Lithuania", "id" => "Lithuania"],
        ["text" => "Malaysia", "id" => "Malaysia"],
        ["text" => "Malta", "id" => "Malta"],
        ["text" => "Mauritius", "id" => "Mauritius"],
        ["text" => "Mexico", "id" => "Mexico"],
        ["text" => "Monaco", "id" => "Monaco"],
        ["text" => "Mongolia", "id" => "Mongolia"],
        ["text" => "Netherlands", "id" => "Netherlands"],
        ["text" => "New Zealand", "id" => "New Zealand"],
        ["text" => "Philippines", "id" => "Philippines"],
        ["text" => "Poland", "id" => "Poland"],
        ["text" => "Portugal", "id" => "Portugal"],
        ["text" => "Scotland", "id" => "Scotland"],
        ["text" => "Singapore", "id" => "Singapore"],
        ["text" => "South Africa", "id" => "South Africa"],
        ["text" => "Spain", "id" => "Spain"],
        ["text" => "Sweden", "id" => "Sweden"],
        ["text" => "Switzerland", "id" => "Switzerland"],
        ["text" => "Taiwan", "id" => "Taiwan"],
        ["text" => "Thailand", "id" => "Thailand"],
        ["text" => "Turkey", "id" => "Turkey"],
        ["text" => "United Arab Emirates", "id" => "United Arab Emirates"],
        [
            "text" => "United Kingdom (Inc Channel Islands and Isle of Man)",
            "id" => "United Kingdom (Inc Channel Islands and Isle of Man)",
        ],
        [
            "text" => "United States of America",
            "id" => "United States of America",
        ],
        ["text" => "Uzbekistan", "id" => "Uzbekistan"],
        ["text" => "Vietnam", "id" => "Vietnam"],
        ["text" => "Wales", "id" => "Wales"],
    ],
];

    foreach($countries["results"] as $country)
    {
    
            DB::table('countries')->insert([
                'name' => $country["text"],
                'code' => $country["id"],
            ]);
        }
    }
}
