<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Debit Card','Credit Card']),
            'balance' => fake()->randomNumber(4),
            'currency' => fake()->randomElement(['$','€']),
            'description'=> fake()->sentence(6),
        ];
    }
}
