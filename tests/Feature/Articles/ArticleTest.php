<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use function Pest\Laravel\delete;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

it('can show a list of articles', function () {
    $articles = Article::factory(10)->create();

    get(route('article.index'))
        ->assertSee($articles[0]->title)
        ->assertSee($articles[0]->short_text)
        ->assertSee($articles[7]->title)
        ->assertSee($articles[7]->short_text)
        ->assertOk();
});

it('can show a specific article', function () {
    $article = Article::factory()->create();

    get(route('article.show', $article))
        ->assertSee($article->title)
        ->assertSeeText($article->text)
        ->assertOk();
});

it('can create a new article', function () {
    login();

    get(route('article.create'))->assertOk();

    $category = Category::factory()->create();
    $tags = Tag::factory(2)->create();
    $attributes = [
        'title' => 'Test Title',
        'text' => str('test')->repeat(20)->toString(),
        'category_id' => $category->id,
        'tags' => [$tags[0]->id, $tags[1]->id],
    ];

    followingRedirects()
        ->post(route('article.store'), $attributes)
        ->assertOk();

    $article = Article::with(['category', 'tags'])->whereTitle('Test Title')->first();
    expect($article)->not->toBeNull();
    expect($article->category->name)->toEqual($category->name);
    expect($article->tags[0]->name)->toEqual($tags[0]->name);
    expect($article->tags[1]->name)->toEqual($tags[1]->name);
});

it('can edit an article', function () {
    login();

    $article = Article::factory()->create();
    $oldTags = Tag::factory(2)->create();
    $article->tags()->attach($oldTags);

    get(route('article.edit', $article))->assertOk();

    $newCategory = Category::factory()->create();
    $newTags = Tag::factory(2)->create();
    $changedAttributes = [
        'title' => 'Changed Title',
        'text' => str('changed')->repeat(10)->toString(),
        'category_id' => $newCategory->id,
        'tags' => [$newTags[0]->id, $newTags[1]->id],
    ];

    followingRedirects()
        ->patch(route('article.update', $article), $changedAttributes)
        ->assertOk();

    $article->refresh();

    expect($article)->not->toBeNull();
    expect($article->title)->toEqual($changedAttributes['title']);
    expect($article->text)->toEqual($changedAttributes['text']);
    expect($article->category->name)->toEqual($newCategory->name);
    expect($article->tags[0]->name)->toEqual($newTags[0]->name);
    expect($article->tags[1]->name)->toEqual($newTags[1]->name);
});

it('can delete an article', function () {
    login();

    $article = Article::factory()->create(['title' => 'Test Title Destroy']);
    $oldTags = Tag::factory(2)->create();
    $article->tags()->attach($oldTags);

    followingRedirects()
        ->delete(route('article.destroy', $article))
        ->assertOk();

    $deletedArticle = Article::whereTitle('Test Title Destroy')->first();
    expect($deletedArticle)->toBeNull();
});

it('is not allowed to reach these endpoints without being logged in', function (Closure $request) {
    Auth::logout();

    $article = Article::factory()->create();

    $request($article)->assertRedirectToRoute('login');
})->with([
    'create' => [fn () => get(route('article.create'))],
    'store' => [fn () => post(route('article.store'))],
    'edit' => [fn (Article $article) => get(route('article.edit', $article))],
    'update' => [fn (Article $article) => patch(route('article.update', $article))],
    'delete' => [fn (Article $article) => delete(route('article.destroy', $article))],
]);
