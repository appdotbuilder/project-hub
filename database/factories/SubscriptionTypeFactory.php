<?php

namespace Database\Factories;

use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionType>
 */
class SubscriptionTypeFactory extends Factory
{
    protected $model = SubscriptionType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Basic', 'Professional', 'Enterprise', 'Premium']),
            'description' => $this->faker->sentence(10),
            'hourly_rate' => $this->faker->randomFloat(2, 25, 150),
            'included_hours' => $this->faker->numberBetween(10, 100),
            'monthly_fee' => $this->faker->randomFloat(2, 100, 1000),
            'is_active' => true,
        ];
    }
}