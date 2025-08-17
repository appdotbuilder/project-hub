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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title')->comment('Task title');
            $table->text('description')->nullable()->comment('Task description');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->decimal('estimated_hours', 8, 2)->comment('Estimated hours to complete');
            $table->decimal('actual_hours', 8, 2)->default(0)->comment('Actual hours spent');
            $table->enum('status', ['todo', 'in_progress', 'review', 'completed'])->default('todo');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->date('due_date')->nullable()->comment('Task due date');
            $table->timestamps();
            
            $table->index('project_id');
            $table->index('assigned_to');
            $table->index('status');
            $table->index('priority');
            $table->index('due_date');
            $table->index(['project_id', 'status']);
            $table->index(['assigned_to', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};