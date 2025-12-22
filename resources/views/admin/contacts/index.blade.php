<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Contact messages</h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto">
        <div class="bg-white rounded shadow divide-y">
            @forelse($messages as $message)
                <a href="{{ route('admin.contacts.show', $message) }}"
                   class="block p-4 hover:bg-gray-50">
                    <strong>{{ $message->name }}</strong>
                    <span class="text-sm text-gray-600">
                        ({{ $message->email }})
                    </span>
                    <div class="text-sm text-gray-500">
                        {{ $message->created_at->format('d/m/Y H:i') }}
                    </div>
                </a>
            @empty
                <div class="p-4">No messages yet.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
