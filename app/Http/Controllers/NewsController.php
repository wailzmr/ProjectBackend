<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $news->load(['author', 'comments.user']);

        return view('news.show', compact('news'));
    }
}
