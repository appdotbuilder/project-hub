<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TimeLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeLog>
 */
class TimeLogFactory extends Factory
{
    protected $model = TimeLog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $workDate = $this->faker->dateTimeBetween('-30 days', 'now');
        $startTime = $this->faker->dateTimeBetween($workDate->format('Y-m-d 08:00:00'), $workDate->format('Y-m-d 16:00:00'));
        $hoursLogged = $this->faker->randomFloat(2, 0.5, 8);
        $endTime = clone $startTime;
        $endTime->modify('+' . ($hoursLogged * 60) . ' minutes');
        
        return [
            'task_id' => Task::factory(),
            'user_id' => User::factory(),
            'hours_logged' => $hoursLogged,
            'description' => $this->faker->paragraph(1),
            'work_date' => $workDate->format('Y-m-d'),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}