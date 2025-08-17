<?php

namespace Database\Factories;

use App\Models\ClientSubscription;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['subscription_fee', 'hour_purchase', 'hour_usage', 'refund']);
        $amount = $this->faker->randomFloat(2, 10, 1000);
        $hours = in_array($type, ['hour_purchase', 'hour_usage']) ? $this->faker->randomFloat(2, 1, 50) : null;
        
        return [
            'client_subscription_id' => ClientSubscription::factory(),
            'type' => $type,
            'amount' => $amount,
            'hours' => $hours,
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed', 'cancelled']),
            'metadata' => null,
        ];
    }
}