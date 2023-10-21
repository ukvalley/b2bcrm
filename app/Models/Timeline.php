<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'action'];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
