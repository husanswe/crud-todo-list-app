<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Work', 'Personal', 'Health', 'Learning', 'Finance'];

        foreach ($names as $name)
        {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
