<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoty;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Transaction::factory(10)->create();
        \App\Models\PiggyBank::factory(2)->create();
        \App\Models\Account::factory(2)->create();
        \App\Models\Subscription::factory(2)->create();
        \App\Models\Obligatory::factory(2)->create();

        $titles = [
            'Salary',
            'Debt',
            'Home',
            'Shopping',
            'Fun',
            'Food',
            'Subscription',
            'Pet Food',
            'Cinema',
            'Music',
            'Health',
        ];
        foreach ($titles as $title) {
            Categoty::create([
                'title' => $title,
                'type'=>fake()->randomElement(['Income','Expenses'])
            ]);
        }
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
