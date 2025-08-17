<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('filename')->comment('Original filename');
            $table->string('file_path')->comment('Storage path');
            $table->string('mime_type')->comment('File MIME type');
            $table->bigInteger('file_size')->comment('File size in bytes');
            $table->foreignId('uploaded_by')->constrained('users');
            $table->timestamps();
            
            $table->index('project_id');
            $table->index('uploaded_by');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_attachments');
    }
};