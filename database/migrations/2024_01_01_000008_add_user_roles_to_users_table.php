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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['client', 'account_manager', 'project_manager', 'finance_manager', 'talent', 'admin'])
                  ->default('client')
                  ->after('password')
                  ->comment('User role in the system');
            $table->boolean('is_active')->default(true)->after('role')->comment('Whether user account is active');
            
            $table->index('role');
            $table->index(['role', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['role', 'is_active']);
            $table->dropColumn(['role', 'is_active']);
        });
    }
};