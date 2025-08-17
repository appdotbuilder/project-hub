<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'client_id' => User::factory(),
            'account_manager_id' => User::factory(),
            'project_manager_id' => User::factory(),
            'allocated_hours' => $this->faker->randomFloat(2, 10, 200),
            'used_hours' => $this->faker->randomFloat(2, 0, 50),
            'expected_deadline' => $this->faker->dateTimeBetween('now', '+6 months'),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'on_hold', 'completed', 'cancelled']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
        ];
    }
}