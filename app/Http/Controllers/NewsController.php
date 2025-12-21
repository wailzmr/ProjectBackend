<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        if (request()->routeIs('admin.*')) {
            return view('admin.news.index', compact('news'));
        }

        return view('news.index', compact('news'));
    }

    public function show(\App\Models\News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required'],
            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $data['created_by'] = auth()->id();

        \App\Models\News::create($data);

        return redirect()->route('news.index');
    }

    public function edit(\App\Models\News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, \App\Models\News $news)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required'],
            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index');
    }

    public function destroy(\App\Models\News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }

}
