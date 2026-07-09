<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(3, 6)),
            'done' => fake()->boolean(),
            'priority' => fake()->numberBetween(1, 5),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
