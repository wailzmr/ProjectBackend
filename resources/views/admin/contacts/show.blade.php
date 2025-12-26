<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Contact message</h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow space-y-4 border border-slate-200 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
            <div>
                <strong>Name:</strong> {{ $contactMessage->name }}
            </div>

            <div>
                <strong>Email:</strong> {{ $contactMessage->email }}
            </div>

            <div>
                <strong>Message:</strong>
                <p class="mt-2">{{ $contactMessage->message }}</p>
            </div>

            <a href="{{ route('admin.contacts.index') }}"
               class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Back
            </a>
        </div>
    </div>
</x-app-layout>
