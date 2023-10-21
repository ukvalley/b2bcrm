<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseBatch;

class Batch extends Model
{
    use HasFactory;

    public function courseBatches()
    {
        return $this->hasMany(CourseBatch::class, 'batch_id');
    }
}
