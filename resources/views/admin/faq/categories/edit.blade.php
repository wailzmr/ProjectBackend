<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Edit FAQ Category</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input name="name"
                           value="{{ old('name', $faqCategory->name) }}"
                           class="w-full border rounded p-2" required>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
