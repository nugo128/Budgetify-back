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
        $categories = [
            'category1' => fake()->randomElement(['Apartment','Car', 'Fun']),
                'category2' => fake()->randomElement(['Food','Home', 'Transport']),
        ];
        return [
            'title' => fake()->sentence(1),
            'category' => json_encode($categories),
            'description' => fake()->sentence(3),
            'date' => fake()->dateTimeBetween('2023-01-01','now'),
            'author' => fake()->name(),
            'transaction_type' => fake()->randomElement(['Expenses','Income']),
            'amount' => fake()->randomNumber(3),
            
        ];
    }
}
