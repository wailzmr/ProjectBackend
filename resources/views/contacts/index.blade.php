<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">My contact messages</h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto">
        <div class="bg-white rounded shadow divide-y border border-slate-200 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
            @forelse($messages as $message)
                <a href="{{ route('contacts.thread', $message) }}"
                   class="block p-4 hover:bg-gray-50 dark:hover:text-gray-900">
                    <strong>{{ $message->subject }}</strong>
                    <div class="text-sm text-gray-500">
                        {{ $message->created_at->format('d/m/Y H:i') }}
                    </div>
                </a>
            @empty
                <div class="p-4">You have not sent any contact messages yet.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
