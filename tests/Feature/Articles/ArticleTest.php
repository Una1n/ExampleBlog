<?php

use App\Models\Article;
use function Pest\Laravel\get;

it('can show a list of articles', function () {
    $articles = Article::factory(10)->create();

    get(route('blog.index'))
        ->assertSee($articles[0]->title)
        ->assertSee($articles[0]->short_text)
        ->assertSee($articles[7]->title)
        ->assertSee($articles[7]->short_text)
        ->assertOk();
});

it('can show a specific article', function () {
    $article = Article::factory()->create();

    get(route('blog.show', $article))
        ->assertSee($article->title)
        ->assertSeeText($article->text)
        ->assertOk();
});
