<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(['name' => 'sport']);
        Category::factory()->create(['name' => 'tech']);
        Category::factory()->create(['name' => 'hobby']);
        Category::factory()->create(['name' => 'work']);
    }
}
