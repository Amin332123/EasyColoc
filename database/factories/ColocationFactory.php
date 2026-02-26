<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colocation>
 */
class ColocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city() . 'House',
            'status' => $this->faker->randomElement(['active' , 'canceled' , 'active' , 'active']),
            'token' => hash('sha256', Str::random(60)),

        ];
    }
}
