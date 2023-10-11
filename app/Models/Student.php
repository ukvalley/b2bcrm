<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonaDetail;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
    'current_school',
    'field_of_study',
    'expected_graduation_year',
    'academic_interests',
    'gpa',
    'languages_spoken',
    'language_proficiency_levels',
    'test_scores',
    'test_dates',
    'intended_area_of_study',
    'intended_course_level',
    'courses_or_fields_comments',
    'career_paths',
    'intended_institution',
    'intended_intake_quarter',
    'intended_intake_year',
    'intended_intake_comments',
    'funding_source',
    'intended_destination_1',
    'intended_destination_2',
    'intended_destination_3',
    'intended_destination_comments',
    'lead_status',
    'prospect_rating',
    'preferred_appointment_date',
    'preferred_appointment_time',
    'lead_source',
    'candidate_comments',
    'signup_country',
    'signup_city',
    'signup_state_province',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personaDetail()
    {
    return $this->hasOne(PersonaDetail::class);
    }
}
