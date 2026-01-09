<x-app-layout>
    <div class="max-w-5xl mx-auto py-8">
        <div class="mb-6">
            <a href="{{ route('forum.index') }}" class="text-indigo-600 hover:underline">← Back to forum</a>
        </div>

        <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-6">
            <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">{{ $thread->title }}</h1>
            <div class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                Started by <a class="hover:underline" href="{{ route('users.show', $thread->user) }}">{{ $thread->user->username ?? $thread->user->name }}</a>
                · {{ $thread->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="mt-6 space-y-4">
            @foreach($thread->posts as $post)
                <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-5">
                    <div class="flex items-start justify-between gap-4">
                        <div class="text-sm">
                            <a href="{{ route('users.show', $post->user) }}" class="font-semibold text-slate-800 dark:text-slate-100 hover:underline">
                                {{ $post->user->username ?? $post->user->name }}
                            </a>
                            <span class="text-slate-500 dark:text-slate-400">·</span>
                            <span class="text-slate-500 dark:text-slate-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        @auth
                            @php
                                $canEdit = auth()->id() === $post->user_id;
                                $canDelete = $canEdit || auth()->user()->is_admin;
                            @endphp

                            <div class="flex items-center gap-2">
                                @if($canEdit)
                                    <button type="button"
                                            class="px-3 py-1 rounded-lg text-xs font-medium bg-slate-200 text-slate-800 hover:bg-slate-300 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600"
                                            onclick="document.getElementById('edit-post-{{ $post->id }}').classList.toggle('hidden')">
                                        Edit
                                    </button>
                                @endif

                                @if($canDelete)
                                    <form method="POST" action="{{ route('forum.posts.destroy', $post) }}"
                                          onsubmit="return confirm('Delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 rounded-lg text-xs font-medium bg-red-600 text-white hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endauth
                    </div>

                    <p class="mt-2 text-slate-700 dark:text-slate-200 whitespace-pre-line">{{ $post->body }}</p>

                    @auth
                        @if(auth()->id() === $post->user_id)
                            <div id="edit-post-{{ $post->id }}" class="hidden mt-4">
                                <form method="POST" action="{{ route('forum.posts.update', $post) }}">
                                    @csrf
                                    @method('PATCH')
                                    <textarea name="body" rows="4"
                                              class="w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body', $post->body) }}</textarea>
                                    <div class="mt-2 flex items-center gap-2">
                                        <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                            Save
                                        </button>
                                        <button type="button" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-800 text-sm font-medium hover:bg-slate-300 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600"
                                                onclick="document.getElementById('edit-post-{{ $post->id }}').classList.add('hidden')">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            @auth
                <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-6">
                    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-3">Reply</h2>
                    <form method="POST" action="{{ route('forum.posts.store', $thread) }}">
                        @csrf
                        <textarea name="body" rows="4"
                                  class="w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-3">
                            <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                Post reply
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="text-sm text-slate-600 dark:text-slate-400">
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a> to reply.
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
