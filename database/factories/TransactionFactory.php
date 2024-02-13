<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(4),
            'date' => fake()->date(),
            'author' => fake()->name(),
            'transaction_type' => fake()->randomElement(['Expenses','Income']),
            'amount' => fake()->randomNumber(3),
            
        ];
    }
}
