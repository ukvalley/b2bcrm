<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsUpload extends Model
{
    use HasFactory;
    protected $table = 'document_uploads';
    protected $fillable = [
        'document_type_id',
        'document_info',
        'file_name',
        'institution',
        'status',
        'upload',
        'student_uid',
        'note',


       
    ];

}
