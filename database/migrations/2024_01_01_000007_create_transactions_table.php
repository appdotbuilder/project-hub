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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_subscription_id')->constrained();
            $table->enum('type', ['subscription_fee', 'hour_purchase', 'hour_usage', 'refund'])->comment('Transaction type');
            $table->decimal('amount', 10, 2)->comment('Transaction amount');
            $table->decimal('hours', 10, 2)->nullable()->comment('Hours involved in transaction');
            $table->string('description')->comment('Transaction description');
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->json('metadata')->nullable()->comment('Additional transaction data');
            $table->timestamps();
            
            $table->index('client_subscription_id');
            $table->index('type');
            $table->index('status');
            $table->index(['type', 'status']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};