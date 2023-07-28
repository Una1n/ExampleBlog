<?php

use App\Models\Category;
use function Pest\Laravel\delete;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

beforeEach(function () {
    login();
});

it('can show a list of categories', function () {
    $categories = Category::factory(3)->create();

    get(route('category.index'))
        ->assertSee($categories[0]->name)
        ->assertSee($categories[2]->name)
        ->assertOk();
});

it('can create a new category', function () {
    get(route('category.create'))->assertOk();

    followingRedirects()
        ->post(route('category.store'), ['name' => 'Test'])
        ->assertOk();

    $category = Category::whereName('Test')->first();
    expect($category)->not->toBeNull();
});

it('can edit a category', function () {
    $category = Category::factory()->create(['name' => 'Test']);

    get(route('category.edit', $category))->assertOk();

    followingRedirects()
        ->patch(route('category.update', $category), ['name' => 'NewName'])
        ->assertOk();

    $category->refresh();

    expect($category->name)->toEqual('NewName');
});

it('can delete a category', function () {
    $category = Category::factory()->create(['name' => 'Test']);

    followingRedirects()
        ->delete(route('category.destroy', $category))
        ->assertOk();

    $category = Category::whereName('Test')->first();
    expect($category)->toBeNull();
});

it('is not allowed to reach these endpoints without being logged in', function (Closure $request) {
    Auth::logout();

    $category = Category::factory()->create();

    $request($category)->assertRedirectToRoute('login');
})->with([
    'create' => [fn () => get(route('category.create'))],
    'store' => [fn () => post(route('category.store'))],
    'edit' => [fn (Category $category) => get(route('category.edit', $category))],
    'update' => [fn (Category $category) => patch(route('category.update', $category))],
    'delete' => [fn (Category $category) => delete(route('category.destroy', $category))],
]);
