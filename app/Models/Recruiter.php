<?php

namespace App\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Recruiter extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'company_short_name',
        'client_id',
        'your_role',
        'country_count',
        'employee_count',
        'students_sent_count',
        'aimed_students_count',
        'timezone',
        'avatar',
        'email',
        'mobile_number'
        
    ];

    // Define a relationship with the User model if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
