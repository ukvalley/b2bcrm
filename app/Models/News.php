<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CountryData;


class News extends Model
{
    protected $fillable = ['title', 'content', 'country_id'];

    public function country()
    {
        return $this->belongsTo(CountryData::class, 'country_id');
    }
}