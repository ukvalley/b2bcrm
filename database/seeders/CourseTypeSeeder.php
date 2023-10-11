<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        $courseTypes = [
            'Advanced Diploma',
            'All course levels',
            'Associate Degree',
            'Attestation d’études collégiales',
            'Attestation of College Studies',
            'Bachelor Degree',
            'Bachelor Honours Degree',
            'Certificate 1 to 4',
            'Diploma',
            'Diplôme d’études professionnelles',
            'Doctorate (PhD)',
            'Dual Degree',
            'English Pathway Program',
            'Foundation Program',
            'Graduate Pathway',
            'High School Program',
            'Integrated Masters',
            'Language Pathway',
            'Masters Coursework',
            'Masters Research',
            'Middle School (Grades 6 to 8)',
            'Pathway Program',
            'Post Graduate Certificate',
            'Post Graduate Diploma',
            'Pre- Masters',
            'Pre- Qualifying Program',
            'Primary School (Elementary)',
            'Professional Programs',
            'Short Courses',
            'Study Abroad',
            'Summer School',
        ];

        foreach ($courseTypes as $courseType) {
            \App\Models\CourseType::create(['name' => $courseType]);
        }
    }
}
