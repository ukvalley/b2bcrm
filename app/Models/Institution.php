<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Country;
class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'user_id',
    'email',
    'phone_number',
    'password','city', 'address', 'website', 'contact_person', 'contact_email', 'contact_phone', 'institution_type', 'number_of_students', 'year_founded', 'description',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function Courses()
{
    return $this->hasMany(Course::class);
}



public function Countries()
{
    return $this->belongsTo(Country::class,'country');
}


}


