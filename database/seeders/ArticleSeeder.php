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

        $articles = Article::factory(20)
            ->recycle($categories)
            ->create();

        $articles->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(2));
        });
    }
}
