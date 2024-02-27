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
            'category1' => fake()->word(),
                'category2' => fake()->word(),
                'category3' => fake()->word(),
        ];
        return [
            'title' => fake()->sentence(1),
            'category' => json_encode($categories),
            'description' => fake()->sentence(3),
            'date' => fake()->date(),
            'author' => fake()->name(),
            'transaction_type' => fake()->randomElement(['Expenses','Income']),
            'amount' => fake()->randomNumber(3),
            
        ];
    }
}
