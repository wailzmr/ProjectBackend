<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">{{ $news->title }}</h1>

        @if($news->image_path)
            <div class="w-full max-w-3xl mx-auto mb-4 overflow-hidden rounded bg-gray-100 h-64">
                <img
                    src="{{ asset('storage/' . $news->image_path) }}"
                    alt="{{ $news->title }}"
                    class="w-full h-full object-cover"
                >
            </div>
        @endif

        <p class="mb-4 text-gray-700">
            {{ $news->content }}
        </p>

        <p class="text-sm text-gray-600 mb-6">Published: {{ optional($news->published_at)->format('d/m/Y') }}</p>

        {{-- Comments --}}
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-slate-800 dark:text-slate-100 mb-4">Comments</h2>

            @if (session('status') === 'comment-added')
                <div class="mb-4 text-sm text-emerald-700 dark:text-emerald-400">
                    Your comment has been posted.
                </div>
            @endif

            @if (session('status') === 'comment-updated')
                <div class="mb-4 text-sm text-emerald-700 dark:text-emerald-400">
                    Comment updated.
                </div>
            @endif

            @if (session('status') === 'comment-deleted')
                <div class="mb-4 text-sm text-emerald-700 dark:text-emerald-400">
                    Comment deleted.
                </div>
            @endif

            @auth
                <form method="POST" action="{{ route('news.comments.store', $news) }}" class="mb-6">
                    @csrf

                    <label for="body" class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-2">
                        Add a comment
                    </label>
                    <textarea
                        id="body"
                        name="body"
                        rows="3"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Write your comment..."
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="mt-3">
                        <button type="submit" class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                            Post comment
                        </button>
                    </div>
                </form>
            @else
                <p class="mb-6 text-sm text-slate-600 dark:text-slate-400">
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a>
                    to post a comment.
                </p>
            @endauth

            <div class="space-y-4">
                @forelse($news->comments as $comment)
                    <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="text-sm">
                                <a href="{{ route('users.show', $comment->user) }}" class="font-semibold text-slate-800 dark:text-slate-100 hover:underline">
                                    {{ $comment->user->username ?? $comment->user->name }}
                                </a>
                                <span class="text-slate-500 dark:text-slate-400">·</span>
                                <span class="text-slate-500 dark:text-slate-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            @auth
                                <div class="flex items-center gap-2">
                                    @if(auth()->id() === $comment->user_id)
                                        <button
                                            type="button"
                                            class="text-xs px-2 py-1 rounded-md border border-slate-200 text-slate-700 hover:bg-white/60 transition"
                                            x-data
                                            x-on:click.prevent="$dispatch('open-modal', 'edit-comment-{{ $comment->id }}')"
                                        >
                                            Edit
                                        </button>

                                        <x-modal name="edit-comment-{{ $comment->id }}" :show="false" maxWidth="2xl" focusable>
                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Edit comment</h3>
                                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Update your comment below.</p>

                                                <form method="POST" action="{{ route('news.comments.update', [$news, $comment]) }}" class="mt-4">
                                                    @csrf
                                                    @method('PATCH')

                                                    <textarea
                                                        name="body"
                                                        rows="5"
                                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                    >{{ old('body', $comment->body) }}</textarea>

                                                    <div class="mt-4 flex justify-end gap-3">
                                                        <x-secondary-button type="button" x-on:click="$dispatch('close-modal', 'edit-comment-{{ $comment->id }}')">
                                                            Cancel
                                                        </x-secondary-button>
                                                        <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                                            Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </x-modal>
                                    @endif

                                    @if(auth()->user()->is_admin || auth()->id() === $comment->user_id)
                                        <form method="POST" action="{{ route('news.comments.destroy', [$news, $comment]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-xs px-2 py-1 rounded-md border border-red-200 text-red-600 hover:bg-red-50 transition"
                                                onclick="return confirm('Delete this comment?')"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endauth
                        </div>
                        <p class="mt-2 text-slate-700 dark:text-slate-200 whitespace-pre-line">{{ $comment->body }}</p>
                    </div>
                @empty
                    <p class="text-sm text-slate-600 dark:text-slate-400">No comments yet. Be the first to comment.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('news.index') }}" class="text-indigo-600 hover:underline">
                Back to news
            </a>
        </div>
    </div>
</x-app-layout>
