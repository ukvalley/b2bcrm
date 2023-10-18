<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CountryData;


class Links extends Model
{
    protected $table = 'links';

    protected $fillable = ['title', 'url', 'country_id'];

    public function country()
    {
        return $this->belongsTo(CountryData::class, 'country_id');
    }
}