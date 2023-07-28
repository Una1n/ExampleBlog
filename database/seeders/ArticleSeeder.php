<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();

        for ($i = 0; $i < 20; $i++) {
            $article = Article::factory()
                ->create([
                    'category_id' => $categories->random()->id,
                ]);

            $foundTags = $tags->random(2);
            $article->tags()->attach($foundTags);
        }
    }
}
