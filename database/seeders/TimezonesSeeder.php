<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TimezonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = [
    ['timezone' => 'Africa/Abidjan', 'name' => 'Coordinated Universal Time (UTC)'],
    ['timezone' => 'Africa/Cairo', 'name' => 'Eastern European Time (EET)'],
    ['timezone' => 'Africa/Lagos', 'name' => 'West Africa Time (WAT)'],
    ['timezone' => 'America/New_York', 'name' => 'Eastern Standard Time (EST)'],
    ['timezone' => 'America/Chicago', 'name' => 'Central Standard Time (CST)'],
    ['timezone' => 'America/Denver', 'name' => 'Mountain Standard Time (MST)'],
    ['timezone' => 'America/Los_Angeles', 'name' => 'Pacific Standard Time (PST)'],
    ['timezone' => 'Asia/Dubai', 'name' => 'Gulf Standard Time (GST)'],
    ['timezone' => 'Asia/Kolkata', 'name' => 'Indian Standard Time (IST)'],
    ['timezone' => 'Asia/Tokyo', 'name' => 'Japan Standard Time (JST)'],
    ['timezone' => 'Australia/Sydney', 'name' => 'Australian Eastern Standard Time (AEST)'],
    ['timezone' => 'Europe/London', 'name' => 'Greenwich Mean Time (GMT)'],
    ['timezone' => 'Europe/Berlin', 'name' => 'Central European Time (CET)'],
    ['timezone' => 'Pacific/Honolulu', 'name' => 'Hawaii-Aleutian Standard Time (HST)'],
    // Add more timezones as needed
];

DB::table('timezones')->insert($timezones);

    }
}
