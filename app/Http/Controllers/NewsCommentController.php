<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsCommentRequest;
use App\Http\Requests\UpdateNewsCommentRequest;
use App\Models\News;
use App\Models\NewsComment;

class NewsCommentController extends Controller
{
    public function store(StoreNewsCommentRequest $request, News $news)
    {
        $comment = NewsComment::create([
            'news_id' => $news->id,
            'user_id' => $request->user()->id,
            'body' => $request->validated()['body'],
        ]);

        return redirect()
            ->route('news.show', $news)
            ->with('status', 'comment-added');
    }

    public function update(UpdateNewsCommentRequest $request, News $news, NewsComment $comment)
    {
        // Ensure the comment belongs to this news item
        abort_unless($comment->news_id === $news->id, 404);

        $user = $request->user();

        // Only the comment owner can edit/update
        if (!$user || (int) $comment->user_id !== (int) $user->id) {
            abort(403);
        }

        $comment->update([
            'body' => $request->validated()['body'],
        ]);

        return redirect()
            ->route('news.show', $news)
            ->with('status', 'comment-updated');
    }

    public function destroy(News $news, NewsComment $comment)
    {
        // Ensure the comment belongs to this news item
        abort_unless($comment->news_id === $news->id, 404);

        $user = auth()->user();

        // Only admins or the comment owner can delete
        if (!$user || (!$user->is_admin && (int) $comment->user_id !== (int) $user->id)) {
            abort(403);
        }

        $comment->delete();

        return redirect()
            ->route('news.show', $news)
            ->with('status', 'comment-deleted');
    }
}
