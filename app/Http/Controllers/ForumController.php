<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumPostRequest;
use App\Http\Requests\StoreForumThreadRequest;
use App\Models\ForumPost;
use App\Models\ForumThread;

class ForumController extends Controller
{
    public function index()
    {
        $threads = ForumThread::with(['user'])
            ->withCount('posts')
            ->latest()
            ->get();

        return view('forum.index', compact('threads'));
    }

    public function show(ForumThread $thread)
    {
        $thread->load(['user', 'posts.user']);

        return view('forum.show', compact('thread'));
    }

    public function storeThread(StoreForumThreadRequest $request)
    {
        $thread = ForumThread::create([
            'user_id' => $request->user()->id,
            'title' => $request->validated()['title'],
        ]);

        ForumPost::create([
            'thread_id' => $thread->id,
            'user_id' => $request->user()->id,
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('forum.show', $thread);
    }

    public function storePost(StoreForumPostRequest $request, ForumThread $thread)
    {
        ForumPost::create([
            'thread_id' => $thread->id,
            'user_id' => $request->user()->id,
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('forum.show', $thread);
    }

    /**
     * Admin: delete a whole thread (and its posts via cascade).
     */
    public function destroyThread(ForumThread $thread)
    {
        $thread->delete();

        return redirect()
            ->route('forum.index')
            ->with('status', 'Thread deleted.');
    }

    /**
     * Admin: delete a single post.
     */
    public function destroyPost(ForumPost $post)
    {
        $thread = $post->thread;
        $post->delete();

        // If last post was removed and you don't want empty threads, you could also delete the thread,
        // but for now we keep the thread as-is.
        return redirect()
            ->route('forum.show', $thread)
            ->with('status', 'Post deleted.');
    }
}
