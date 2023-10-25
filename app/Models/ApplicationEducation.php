<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationEducation extends Model
{
    protected $table = 'applications_education';
    protected $fillable = [
        'title1',
        'title2',
        'address2',
        'university',
        'credit_transfer',
        'puniversity',
        'gap',
        'pre_applied',
        'pen',
        'CEGEP',
        'english_school',
        'language',
        'main_language',
        's_study_date',
        'school_name',
        'completed_study',
        'course_title',
        'result',
        'equivalence',
        'currently_studying',
        'previous_study',
        's_country',
        's_institution',
        'completed_successfully',
        'study_fultime',
        'experience',
        'employment_status',
        'first_language',
        'language_known',
        'proficiency',
        'language_demo',
        'eng_course',
        'r_contact_details',
        'agent_contact',
        'contact_name',
        'contact_mobile',
        'contact_email',
        'passport',
        'passport_number',
        'visa',
        'visa_apply_note',
        'married',
        'citizenship',
        'app_submitted_from',
        'status_in_canada',
        'sponcership_gov',
        'receive_scholarship',
        'medical_agreement',
        'admission_note',
        'notesContent',
        'student_id',
        'recruiter_id',
        'personal_id',
        'communicationMedium',
    ];

    public function personal()
    {
        return $this->belongsTo(ApplicationPersonal::class, 'personal_id');
    }
}
