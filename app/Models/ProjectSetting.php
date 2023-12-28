<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_description',
        'site_logo',
        'site_favicon',
        'primary_color',
        'secondary_color',
        'footer_text',
        'youtube_link'
    ];
}