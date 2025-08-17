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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Project title');
            $table->text('description')->comment('Project description');
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('account_manager_id')->nullable()->constrained('users');
            $table->foreignId('project_manager_id')->nullable()->constrained('users');
            $table->decimal('allocated_hours', 10, 2)->comment('Man-hours allocated to this project');
            $table->decimal('used_hours', 10, 2)->default(0)->comment('Hours already used');
            $table->date('expected_deadline')->comment('Expected completion date');
            $table->enum('status', ['pending', 'in_progress', 'on_hold', 'completed', 'cancelled'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->timestamps();
            
            $table->index('client_id');
            $table->index('account_manager_id');
            $table->index('project_manager_id');
            $table->index('status');
            $table->index('priority');
            $table->index('expected_deadline');
            $table->index(['status', 'priority']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};