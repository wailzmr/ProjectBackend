<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index(Request $request, NewsService $service)
    {
        $news = $service->listAll();

        if ($request->routeIs('admin.*')) {
            return view('admin.news.index', compact('news'));
        }

        return view('news.index', compact('news'));
    }

    /**
     * Display a single news article.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for creating a news article (admin).
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news article.
     */
    public function store(StoreNewsRequest $request, NewsService $service)
    {
        $service->create($request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully.');
    }

    /**
     * Show the form for editing the specified news article (admin).
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news article.
     */
    public function update(UpdateNewsRequest $request, News $news, NewsService $service)
    {
        $service->update($news, $request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified news article.
     */
    public function destroy(News $news, NewsService $service)
    {
        $service->delete($news);

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully.');
    }
}
