<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'articles' => Article::with('category')->latest()->simplePaginate(10),
        ]);
    }

    public function show(Article $article): View
    {
        return view('blog.show', compact('article'));
    }
}
