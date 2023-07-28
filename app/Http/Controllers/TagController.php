<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        return view('tag.index', [
            'tags' => Tag::all(),
        ]);
    }

    public function show(Tag $tag): View
    {
        return view('article.index', [
            'articles' => $tag->articles()->latest()->simplePaginate(10),
        ]);
    }

    public function create(): View
    {
        return view('tag.create');
    }

    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag): View
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(StoreTagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
