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
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained();
            $table->decimal('hours_logged', 8, 2)->comment('Hours worked on this task');
            $table->text('description')->nullable()->comment('Description of work done');
            $table->date('work_date')->comment('Date when work was performed');
            $table->timestamp('start_time')->nullable()->comment('Work start time');
            $table->timestamp('end_time')->nullable()->comment('Work end time');
            $table->timestamps();
            
            $table->index('task_id');
            $table->index('user_id');
            $table->index('work_date');
            $table->index(['task_id', 'user_id']);
            $table->index(['work_date', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_logs');
    }
};