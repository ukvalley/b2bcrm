<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EducationType;


class EducationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $educationTypes = [
            'High School',
            'Language Pathway',
            'Undergraduate - Foundation',
            'Undergraduate - Certificate',
            'Undergraduate - Diploma',
            'Undergraduate - Associate Degree',
            'Undergraduate - Bachelor',
            'Postgraduate - Certificate',
            'Postgraduate - Diploma',
            'Masters',
            'Doctorate / PHD',
        ];

        foreach ($educationTypes as $type) {
            EducationType::create(['name' => $type]);
        }
    }
}
