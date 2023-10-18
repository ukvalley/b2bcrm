<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSettngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('project_settings')->insert([
        ['site_name' => 'CIVS MARKETPLACE']
        // Add more user types if needed
    ]);
    }
}
