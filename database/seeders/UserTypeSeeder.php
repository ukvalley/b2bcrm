<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('user_types')->insert([
        ['name' => 'Institution'],
        ['name' => 'Agent'],
        ['name' => 'Student'],
        // Add more user types if needed
    ]);
}
}
