<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(50)->create();

        Task::all()->each(function ($task) {
            $task->tags()->attach(
                Tag::inRandomOrder()->take(rand(1, 3))->pluck('id')
            );
        });
    }
}
