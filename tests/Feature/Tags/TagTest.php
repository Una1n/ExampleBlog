<?php

use App\Models\Tag;
use function Pest\Laravel\delete;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

beforeEach(function () {
    login();
});

it('can show a list of tags', function () {
    $tags = Tag::factory(3)->create();

    get(route('tag.index'))
        ->assertSee($tags[0]->name)
        ->assertSee($tags[2]->name)
        ->assertOk();
});

it('can create a new category', function () {
    get(route('tag.create'))->assertOk();

    followingRedirects()
        ->post(route('tag.store'), ['name' => 'Test'])
        ->assertOk();

    $tag = Tag::whereName('Test')->first();
    expect($tag)->not->toBeNull();
});

it('can edit a tag', function () {
    $tag = Tag::factory()->create(['name' => 'Test']);

    get(route('tag.edit', $tag))->assertOk();

    followingRedirects()
        ->patch(route('tag.update', $tag), ['name' => 'NewName'])
        ->assertOk();

    $tag->refresh();

    expect($tag->name)->toEqual('NewName');
});

it('can delete a tag', function () {
    $tag = Tag::factory()->create(['name' => 'Test']);

    followingRedirects()
        ->delete(route('tag.destroy', $tag))
        ->assertOk();

    $tag = Tag::whereName('Test')->first();
    expect($tag)->toBeNull();
});

it('is not allowed to reach these tag endpoints without being logged in', function (Closure $request) {
    Auth::logout();

    $tag = Tag::factory()->create();

    $request($tag)->assertRedirectToRoute('login');
})->with([
    'create' => [fn () => get(route('tag.create'))],
    'store' => [fn () => post(route('tag.store'))],
    'edit' => [fn (Tag $tag) => get(route('tag.edit', $tag))],
    'update' => [fn (Tag $tag) => patch(route('tag.update', $tag))],
    'delete' => [fn (Tag $tag) => delete(route('tag.destroy', $tag))],
]);
