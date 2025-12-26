<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Create FAQ</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6
dark:bg-slate-900
dark:text-slate-100
dark:placeholder-slate-500">
            <form method="POST" action="{{ route('admin.faqs.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Category</label>
                    <select name="faq_category_id" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('faq_category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Question</label>
                    <input name="question" value="{{ old('question') }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('question') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Answer</label>
                    <textarea name="answer" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('answer') }}</textarea>
                    @error('answer') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Save FAQ
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
