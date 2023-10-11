<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyType;


class StudyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        $studyTypes = [
            'Aeronautical Engineering and Aviation',
            'Agriculture and Animal Sciences',
            'Architecture',
            'Arts',
            'Beauty Culture / Cosmetology',
            'Business',
            'Computing and Technology',
            'Culinary Arts',
            'Design',
            'Education (Early Childhood)',
            'Education (Primary)',
            'Education (Secondary)',
            'Education (Special)',
            'Emergency Training and Management',
            'Engineering',
            'English Programs',
            'Environment',
            'Fashion',
            'Film, Television and Theatre Studies',
            'Finance',
            'General Education',
            'Health',
            'History',
            'Hospitality',
            'Journalism',
            'Languages Other Than English Programs',
            'Law',
            'Linguistics',
            'Literature',
            'Marketing',
            'Mathematics',
            'Mechanics',
            'Media and Communication',
            'Medicine',
            'Nursing',
            'Performing Arts',
            'Philosophy',
            'Political Sciences',
            'Retail',
            'Science',
            'Social Sciences',
            'Sports',
            'Statistics',
            'Teaching',
            'Theology',
            'Visual Arts',
            'World Languages and Cultures',
        ];

        foreach ($studyTypes as $studyType) {
            StudyType::create(['name' => $studyType]);
        }
    }
}
