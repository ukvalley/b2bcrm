<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationPersonal extends Model
{
    protected $table = 'applications_personal';
    protected $fillable = [
        'title',
        'fname',
        'pname',
        'dob',
        'gender',
        'nationality',
        'ethnicity',
        'born',
        'address',
        'city',
        'province',
        'postcode',
        'current_country',
        'email',
        'phone',
        'cell',
        'number',
        'semail',
        'wid',
        'e_address',
        'lang_of_c',
        'disability',
    ];

    public function personal()
    {
        return $this->belongsTo(ApplicationPersonal::class);
    }
}
