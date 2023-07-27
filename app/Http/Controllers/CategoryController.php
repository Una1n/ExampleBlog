<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        return view('blog.index', [
            'articles' => $category->articles()->latest()->simplePaginate(10),
        ]);
    }
}
