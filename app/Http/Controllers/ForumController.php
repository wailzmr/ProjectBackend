<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumPostRequest;
use App\Http\Requests\StoreForumThreadRequest;
use App\Models\ForumPost;
use App\Models\ForumThread;
use Illuminate\Http\Request;

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
     * User: update own post.
     */
    public function updatePost(Request $request, ForumPost $post)
    {
        if ($request->user()->id !== $post->user_id) {
            abort(403);
        }

        $data = $request->validate([
            'body' => ['required', 'string', 'min:1', 'max:5000'],
        ]);

        $post->update($data);

        return redirect()
            ->route('forum.show', $post->thread)
            ->with('status', 'Post updated.');
    }

    /**
     * Delete a single post (owner or admin).
     */
    public function destroyPost(ForumPost $post)
    {
        $user = request()->user();

        if (!$user || ($user->id !== $post->user_id && !$user->is_admin)) {
            abort(403);
        }

        $thread = $post->thread;
        $post->delete();

        return redirect()
            ->route('forum.show', $thread)
            ->with('status', 'Post deleted.');
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
}
