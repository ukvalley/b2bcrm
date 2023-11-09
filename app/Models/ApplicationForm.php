<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    protected $table = 'applicationforms';
    protected $fillable = [
        'course_id',
        'student_id',
        'a',
       
    ];
}
