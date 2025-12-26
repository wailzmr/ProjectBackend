<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight
         dark:text-slate-100 ">
            Admin · Exercises
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <a href="{{ route('admin.exercises.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Create exercise
            </a>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                <table class="w-full">
                    <thead class="border-b">
                    <tr class="text-left">
                        <th class="p-3">Name</th>
                        <th class="p-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($exercises as $exercise)
                        <tr class="border-b">
                            <td class="p-3">{{ $exercise->name }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700"
                                   href="{{ route('admin.exercises.edit', $exercise) }}">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.exercises.destroy', $exercise) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                            onclick="return confirm('Delete this exercise?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="p-3" colspan="2">No exercises found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
