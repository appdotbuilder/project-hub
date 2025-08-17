<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estimatedHours = $this->faker->randomFloat(2, 1, 40);
        $actualHours = $this->faker->randomFloat(2, 0, $estimatedHours * 1.2);
        
        return [
            'project_id' => Project::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(2),
            'assigned_to' => User::factory(),
            'estimated_hours' => $estimatedHours,
            'actual_hours' => $actualHours,
            'status' => $this->faker->randomElement(['todo', 'in_progress', 'review', 'completed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'due_date' => $this->faker->dateTimeBetween('now', '+2 months'),
        ];
    }
}