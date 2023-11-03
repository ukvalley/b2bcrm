<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonaDetail;
use App\Models\Note;
use App\Models\Message;
use App\Models\Tasks;



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
    'status',
    'current_status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ApplicationEducation()
    {
        return $this->hasOne(ApplicationEducation::class);
    }


    public function personaDetail()
    {
    return $this->hasOne(PersonaDetail::class);
    }


    public function Notes()
    {
    return $this->hasMany(Note::class);
    }

    public function Messages()
    {
    return $this->hasMany(Message::class);
    }

    public function tasks()
{
    return $this->hasMany(Task::class);
}


public function addDefaultTasks()
{
    $defaultTasks = [
        'Collect Personal Information',
        'Complete Study Preferences',
        'Capture Any Additional Details',
        'Search Courses',
        'Save Courses',
        'Shortlist Courses',
        'Complete Application Form',
        'Collect Documents',
        'Review Application',
        'Submit Application to Adventus',
    ];

    foreach ($defaultTasks as $taskName) {
        $this->tasks()->create([
            'title' => $taskName,
            'completed' => false,
        ]);
    }

    $this->update(['default_task' => true]);
}



public function Timeline()
    {
        return $this->hasMany(Timeline::class);    
    }


    public function shortlistedCourses()
    {
        return $this->belongsToMany(Course::class, 'shortlists', 'student_id', 'course_id');
    }

    


}
