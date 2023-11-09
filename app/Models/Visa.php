<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{  
    use HasFactory;

    protected $table = 'visas';
    protected $fillable = [
        'current_visa',
        'current_visa_application',
        'criminal_activity',
        'old_visa',
        'sibling',
        'married',
        'spouse',
        'child',
        'funding',
        's_fund',
        'r_sponcer',
        'award',
        's_occupation',
        'visa_funding',
    ];

}
