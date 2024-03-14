<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
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
            'amount'=>fake()->numberBetween(10,100),
            'date_from' => fake()->dateTimeBetween('2023-01-01','now'),
            'date_to' => fake()->date(),
            
        ];
    }
}
