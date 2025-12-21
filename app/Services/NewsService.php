<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    /**
     * Return all news articles ordered by newest first.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, News>
     */
    public function listAll()
    {
        return News::latest()->get();
    }

    /**
     * Create a news article.
     *
     * @param  array<string, mixed>  $data
     * @return News
     */
    public function create(array $data): News
    {
        if (!empty($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image_path'] = $data['image']->store('news', 'public');
            unset($data['image']);
        }

        $data['created_by'] = Auth::id();

        return News::create($data);
    }

    /**
     * Update an existing news article.
     *
     * @param  News  $news
     * @param  array<string, mixed>  $data
     * @return News
     */
    public function update(News $news, array $data): News
    {
        if (!empty($data['image']) && $data['image'] instanceof UploadedFile) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            $data['image_path'] = $data['image']->store('news', 'public');
            unset($data['image']);
        }

        $news->update($data);

        return $news->refresh();
    }

    /**
     * Delete a news article and its image if present.
     */
    public function delete(News $news): void
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();
    }
}

