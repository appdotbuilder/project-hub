<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create subscription types
        $subscriptionTypes = [
            [
                'name' => 'Starter',
                'description' => 'Perfect for small projects and startups',
                'hourly_rate' => 50.00,
                'included_hours' => 20,
                'monthly_fee' => 500.00,
                'is_active' => true,
            ],
            [
                'name' => 'Professional',
                'description' => 'Ideal for growing businesses with regular project needs',
                'hourly_rate' => 75.00,
                'included_hours' => 40,
                'monthly_fee' => 1200.00,
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise',
                'description' => 'Comprehensive solution for large organizations',
                'hourly_rate' => 100.00,
                'included_hours' => 80,
                'monthly_fee' => 2500.00,
                'is_active' => true,
            ],
        ];

        foreach ($subscriptionTypes as $type) {
            SubscriptionType::create($type);
        }

        // Create users with different roles
        $users = [
            [
                'name' => 'John Client',
                'email' => 'client@example.com',
                'password' => bcrypt('password'),
                'role' => 'client',
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Account Manager',
                'email' => 'account@example.com',
                'password' => bcrypt('password'),
                'role' => 'account_manager',
                'is_active' => true,
            ],
            [
                'name' => 'Mike Project Manager',
                'email' => 'project@example.com',
                'password' => bcrypt('password'),
                'role' => 'project_manager',
                'is_active' => true,
            ],
            [
                'name' => 'Lisa Finance Manager',
                'email' => 'finance@example.com',
                'password' => bcrypt('password'),
                'role' => 'finance_manager',
                'is_active' => true,
            ],
            [
                'name' => 'Alex Talent',
                'email' => 'talent@example.com',
                'password' => bcrypt('password'),
                'role' => 'talent',
                'is_active' => true,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Create some sample projects
        $client = User::where('role', 'client')->first();
        $accountManager = User::where('role', 'account_manager')->first();
        $projectManager = User::where('role', 'project_manager')->first();

        $projects = [
            [
                'title' => 'E-commerce Website Development',
                'description' => 'Build a modern e-commerce platform with payment integration and inventory management.',
                'client_id' => $client->id,
                'account_manager_id' => $accountManager->id,
                'project_manager_id' => $projectManager->id,
                'allocated_hours' => 120.00,
                'used_hours' => 45.50,
                'expected_deadline' => now()->addMonths(3),
                'status' => 'in_progress',
                'priority' => 'high',
            ],
            [
                'title' => 'Mobile App UI/UX Design',
                'description' => 'Design user interface and experience for iOS and Android mobile application.',
                'client_id' => $client->id,
                'account_manager_id' => $accountManager->id,
                'project_manager_id' => $projectManager->id,
                'allocated_hours' => 80.00,
                'used_hours' => 15.25,
                'expected_deadline' => now()->addMonths(2),
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
            [
                'title' => 'Brand Identity Package',
                'description' => 'Complete brand identity design including logo, colors, typography, and brand guidelines.',
                'client_id' => $client->id,
                'account_manager_id' => $accountManager->id,
                'project_manager_id' => $projectManager->id,
                'allocated_hours' => 60.00,
                'used_hours' => 60.00,
                'expected_deadline' => now()->subWeeks(1),
                'status' => 'completed',
                'priority' => 'medium',
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}