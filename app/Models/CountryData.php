<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryData extends Model
{
    use HasFactory;

    protected $fillable = [
    'country_name',
    'urban_environment',
    'diverse_scenery',
    'distinctive_native_animals',
    'student_cities',
    'country_header_image', // Add the new field here.
    'youtube_link',
];

public function news()
{
    return $this->hasMany(News::class, 'country_id');
}

public function links()
{
    return $this->hasMany(Links::class, 'country_id');
}
}
