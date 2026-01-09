<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Contact Message Thread</h2>
            <a href="{{ route('contacts.user.index') }}" class="text-sm text-blue-600 hover:underline">Back to my messages</a>
        </div>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto">
        <div class="bg-white rounded shadow divide-y border border-slate-200 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
            <div class="p-4">
                <strong>{{ $contactMessage->name }}</strong>
                <span class="text-sm text-gray-600">({{ $contactMessage->email }})</span>
                <div class="text-sm text-gray-500">
                    {{ $contactMessage->created_at->format('d/m/Y H:i') }}
                </div>
                <p class="mt-4">{{ $contactMessage->message }}</p>
            </div>

            <div class="p-4">
                <h3 class="text-lg font-semibold">Replies</h3>
                @forelse($contactMessage->replies as $reply)
                    <div class="mt-2 p-2 border rounded bg-gray-50 dark:bg-slate-700">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wide {{ $reply->is_admin ? 'text-indigo-600' : 'text-emerald-600' }}">
                                {{ $reply->is_admin ? 'Admin' : 'You' }}
                            </span>
                            <div class="text-sm text-gray-500">
                                {{ $reply->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                        <p class="mt-1">{{ $reply->reply }}</p>
                    </div>
                @empty
                    <p>No replies yet.</p>
                @endforelse
            </div>

            <div class="p-4">
                <form method="POST" action="{{ route('contacts.user.reply', $contactMessage) }}">
                    @csrf
                    <textarea name="reply" class="w-full p-2 border rounded" rows="4" placeholder="Write your reply here..." required></textarea>
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Send Reply</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
