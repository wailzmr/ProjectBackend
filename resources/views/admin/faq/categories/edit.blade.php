<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Edit FAQ Category</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 dark:border-slate-600
dark:bg-slate-900
dark:text-slate-100
dark:placeholder-slate-500">
            <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input name="name"
                           value="{{ old('name', $faqCategory->name) }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
