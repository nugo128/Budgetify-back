<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PiggyBank>
 */
class PiggyBankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'goal' => fake()->randomElement(['Apartment','Car', 'Fun']),
            'goal_amount' => fake()->randomNumber(4),
            'saved_amount' => fake()->randomNumber(3),
            'date'=> fake()->date(),
        ];
    }
}
