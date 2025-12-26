<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-slate-100">
            Admin · Create workout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded dark:border-slate-200  dark:bg-slate-900
dark:text-slate-100
dark:placeholder-slate-500

">
            <form method="POST" action="{{ route('admin.workouts.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Title</label>
                    <input name="title" value="{{ old('title') }}" class="w-full
        border border-slate-300 dark:border-slate-100
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description" class="w-full
        border border-slate-300 dark:border-slate-100
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Difficulty</label>
                    <select name="difficulty" class="w-full
        border border-slate-300 dark:border-slate-100
        rounded p-2
        bg-white dark:bg-slate-900
        text-slate-900 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-100
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach(['beginner','intermediate','advanced'] as $d)
                            <option value="{{ $d }}" @selected(old('difficulty','beginner') === $d)>
                                {{ ucfirst($d) }}
                            </option>
                        @endforeach
                    </select>
                    @error('difficulty') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Save
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
