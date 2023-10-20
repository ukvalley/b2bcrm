<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\CountryData;
class Institution extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class);
}

public function Courses()
{
    return $this->hasMany(Course::class);
}

public function CountryData()
{
    return $this->belongsTo(CountryData::class);
}
}


