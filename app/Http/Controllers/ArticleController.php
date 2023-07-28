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
        if ($request->has('tags')) {
            $tags = $request->get('tags');
            dd($tags);

            foreach ($tags as $tag) {

            }
        }

        $article = Article::create($request->validated());
        // $article->tags()->attach($tags);

        return redirect()->route('article.show', $article);
    }

    public function edit(Article $article): View
    {
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return redirect()->route('article.show', $article);
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('article.index');
    }
}
