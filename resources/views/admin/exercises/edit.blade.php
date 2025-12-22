<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin · Edit exercise
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('admin.exercises.update', $exercise) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Name</label>
                    <input name="name" value="{{ old('name', $exercise->name) }}" class="w-full border rounded p-2" required>
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Notes</label>
                    <textarea name="notes" class="w-full border rounded p-2">{{ old('notes', $exercise->notes) }}</textarea>
                    @error('notes') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
