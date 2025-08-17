<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectManagementController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Main dashboard - shows project management overview
    Route::get('dashboard', [ProjectManagementController::class, 'index'])->name('dashboard');
    
    // Project management routes
    Route::resource('projects', ProjectController::class);
    
    // Subscription management routes
    Route::resource('subscriptions', SubscriptionController::class)->except(['edit', 'update', 'destroy']);
    
    // Placeholder routes for additional functionality
    Route::get('/tasks', function () {
        return Inertia::render('tasks/index', ['tasks' => []]);
    })->name('tasks.index');
    
    Route::get('/time-logs', function () {
        return Inertia::render('time-logs/index', ['time_logs' => []]);
    })->name('time-logs.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
