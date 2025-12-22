<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · FAQs</h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto space-y-4">
        <a href="{{ route('admin.faqs.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded">
            Add FAQ
        </a>

        <div class="bg-white p-4 rounded shadow">
            @foreach($faqs as $faq)
                <div class="border-b py-3">
                    <strong>{{ $faq->question }}</strong>
                    <p class="text-sm text-gray-600">
                        Category: {{ $faq->category->name }}
                    </p>

                    <div class="mt-2 flex gap-2">
                        <a href="{{ route('admin.faqs.edit', $faq) }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.faqs.destroy', $faq) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
