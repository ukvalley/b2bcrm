<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define any relationships here, such as a belongsTo relationship with the "Student" model.
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
