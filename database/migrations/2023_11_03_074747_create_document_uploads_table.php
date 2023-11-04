<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('document_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->string('document_info')->nullable();
            $table->string('file_name')->nullable();
            $table->string('institution')->nullable();
            $table->string('status')->nullable();
            $table->string('upload')->nullable();
            $table->string('student_uid')->nullable(); // Add the "Student UID" field
            $table->text('note')->nullable();
            $table->timestamps();

            // Define a foreign key constraint for the "document_type_id" column
            $table->foreign('document_type_id')->references('id')->on('documents');
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_uploads');
    }
}
