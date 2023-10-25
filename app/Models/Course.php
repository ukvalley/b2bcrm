<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institution;
use App\Models\Batch;
use App\Models\CourseBatch;


class Course extends Model
{ 
    use HasFactory;
    protected $table = 'courses';

    protected $fillable = ['image'];
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }


    public function addDefaultBatches()
{
    
    $DefaultBatchs = Batch::get();

    foreach ($DefaultBatchs as $DefaultBatch) {
        $this->CourseBatches()->create([
            'batch_id' => $DefaultBatch->id,
            'status' => "Inactive",
        ]);
    }

    //$this->update(['default_task' => true]);
}

 public function CourseBatches()
{
    return $this->hasMany(CourseBatch::class);
}
   
}
