<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'user')->inRandomOrder()->first()->id,
            'title' => fake()->sentence(5),
            'description' => fake()->sentence(15),
            'category_id' => Category::inRandomOrder()->first()->id,
            'priority' => fake()->randomElement(['high', 'medium', 'low']),
            'status' => 'open',
        ];
    }
}
