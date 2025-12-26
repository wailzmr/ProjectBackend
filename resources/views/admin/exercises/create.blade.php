<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight dark:text-slate-100">
            Admin · Create exercise
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded  dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800
dark:text-slate-100
      ">
            <form method="POST" action="{{ route('admin.exercises.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input name="name" value="{{ old('name') }}" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 " required>
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Notes</label>
                    <textarea name="notes" class="w-full
        border border-slate-300 dark:border-slate-600
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('notes') }}</textarea>
                    @error('notes') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Save
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
