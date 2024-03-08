<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obligatory>
 */
class ObligatoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(1),
            'description' => fake()->sentence(3),
            'amount'=>fake()->numberBetween(10,100),
            'date_from' => fake()->date(),
            'date_to' => fake()->date(),
            
        ];
    }
}
