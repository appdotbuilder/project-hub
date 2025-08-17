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
        Schema::create('client_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subscription_type_id')->constrained();
            $table->decimal('purchased_hours', 10, 2)->default(0)->comment('Total purchased man-hours');
            $table->decimal('used_hours', 10, 2)->default(0)->comment('Hours used on projects');
            $table->decimal('remaining_hours', 10, 2)->default(0)->comment('Hours available for use');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->date('expires_at')->nullable()->comment('Subscription expiry date');
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('status');
            $table->index(['user_id', 'status']);
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_subscriptions');
    }
};