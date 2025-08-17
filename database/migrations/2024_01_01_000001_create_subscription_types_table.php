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
        Schema::create('subscription_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Subscription type name');
            $table->text('description')->nullable()->comment('Subscription description');
            $table->decimal('hourly_rate', 10, 2)->comment('Cost per man-hour in this subscription');
            $table->integer('included_hours')->default(0)->comment('Hours included in base subscription');
            $table->decimal('monthly_fee', 10, 2)->default(0)->comment('Monthly subscription fee');
            $table->boolean('is_active')->default(true)->comment('Whether subscription is available');
            $table->timestamps();
            
            $table->index('is_active');
            $table->index(['is_active', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_types');
    }
};