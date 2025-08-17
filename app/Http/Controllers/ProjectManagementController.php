<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SubscriptionType;
use App\Models\User;
use Inertia\Inertia;

class ProjectManagementController extends Controller
{
    /**
     * Display the project management dashboard.
     */
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'in_progress')->count(),
            'total_clients' => User::clients()->count(),
            'subscription_types' => SubscriptionType::active()->count(),
        ];

        $recent_projects = Project::with(['client', 'projectManager'])
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('project-management', [
            'stats' => $stats,
            'recent_projects' => $recent_projects,
        ]);
    }
}