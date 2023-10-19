<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\institution;

class Course extends Model
{ 
    use HasFactory;
    protected $table = 'courses';

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
   
}
