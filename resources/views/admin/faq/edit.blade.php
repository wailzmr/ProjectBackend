<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Admin · Edit FAQ</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 dark:border-slate-600
dark:bg-slate-900
dark:text-slate-100
dark:placeholder-slate-500">
            <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                @csrf
                @method('PUT')

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
                            <option value="{{ $category->id }}"
                                @selected($faq->faq_category_id === $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Question</label>
                    <input name="question"
                           value="{{ old('question', $faq->question) }}"
                           class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Answer</label>
                    <textarea name="answer" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update FAQ
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
