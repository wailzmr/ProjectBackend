<x-app-layout>
    <div class="max-w-5xl mx-auto py-8">
        <div class="flex items-start justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Forum</h1>
                <p class="mt-1 text-slate-600 dark:text-slate-400">Start a thread and talk with other users.</p>
            </div>
        </div>

        @auth
            <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-6 mb-8">
                <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4">Create a new thread</h2>

                <form method="POST" action="{{ route('forum.threads.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="mt-2 w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Message</label>
                        <textarea name="body" rows="4"
                                  class="mt-2 w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/40 p-3 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body') }}</textarea>
                        @error('body')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                        Post thread
                    </button>
                </form>
            </div>
        @else
            <div class="mb-8 text-sm text-slate-600 dark:text-slate-400">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a> to create a thread.
            </div>
        @endauth

        <div class="space-y-3">
            @forelse($threads as $thread)
                <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/60 dark:bg-slate-800/50 p-5 hover:bg-white/80 dark:hover:bg-slate-800/70 transition">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <a href="{{ route('forum.show', $thread) }}" class="font-semibold text-slate-800 dark:text-slate-100 hover:underline">
                                {{ $thread->title }}
                            </a>
                            <div class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                by {{ $thread->user->username ?? $thread->user->name }} · {{ $thread->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                {{ $thread->posts_count }} posts
                            </div>

                            @auth
                                @php
                                    /** @var \App\Models\User $user */
                                    $user = auth()->user();
                                @endphp
                                @if($user->is_admin)
                                    <form method="POST" action="{{ route('forum.threads.destroy', $thread) }}"
                                          onsubmit="return confirm('Delete this thread? This will remove all posts.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-600 dark:text-slate-400">No threads yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
