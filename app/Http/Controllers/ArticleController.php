<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('article.index', [
            'articles' => Article::with('category', 'tags')->latest()->simplePaginate(10),
        ]);
    }

    public function show(Article $article): View
    {
        return view('article.show', compact('article'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.create', compact('categories', 'tags'));
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $article = Article::create($request->validated());

        if ($request->has('tags')) {
            $tags = [];
            foreach ($request->get('tags') as $requestTag) {
                if (Tag::whereId($requestTag)->exists()) {
                    $tags[] = $requestTag;
                }
            }
            $article->tags()->attach($tags);
        }

        return redirect()->route('article.show', $article);
    }

    public function edit(Article $article): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(StoreArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        $tags = [];
        if ($request->has('tags')) {
            foreach ($request->get('tags') as $requestTag) {
                if (Tag::whereId($requestTag)->exists()) {
                    $tags[] = $requestTag;
                }
            }
        }

        $article->tags()->sync($tags);

        return redirect()->route('article.show', $article);
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index');
    }
}
