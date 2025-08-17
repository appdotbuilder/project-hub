<?php

namespace Database\Factories;

use App\Models\ClientSubscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientSubscription>
 */
class ClientSubscriptionFactory extends Factory
{
    protected $model = ClientSubscription::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchasedHours = $this->faker->randomFloat(2, 50, 500);
        $usedHours = $this->faker->randomFloat(2, 0, $purchasedHours * 0.8);
        
        return [
            'user_id' => User::factory(),
            'subscription_type_id' => SubscriptionType::factory(),
            'purchased_hours' => $purchasedHours,
            'used_hours' => $usedHours,
            'remaining_hours' => $purchasedHours - $usedHours,
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}