<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        for ($i = 0; $i < 20; $i++) {
            Article::factory()->create([
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
