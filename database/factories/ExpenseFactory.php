<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Categorie;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $houseId = Colocation::factory();
        return [
            'amount' => $this->faker->randomFloat(0, 10, 1000),
            'user_id' => User::factory(),
            'payer_id' => User::factory(),
            'colocation_id' => $houseId,
            'categorie_id' => Categorie::factory(['colocation_id' => $houseId]),
            'payment_status' => $this->faker->randomElement(['unpaid', 'paid']),
        ];
    }
}
