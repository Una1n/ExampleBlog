<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('category.index', [
            'categories' => Category::all(),
        ]);
    }

    public function show(Category $category): View
    {
        return view('blog.index', [
            'articles' => $category->articles()->latest()->simplePaginate(10),
        ]);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('category.index');
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
