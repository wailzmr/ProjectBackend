<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin · Workouts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.workouts.create') }}"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Create workout
                </a>
            </div>

            <div class="bg-white shadow rounded">
                <table class="w-full">
                    <thead class="border-b">
                    <tr class="text-left">
                        <th class="p-3">Title</th>
                        <th class="p-3">Difficulty</th>
                        <th class="p-3">Created</th>
                        <th class="p-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($workouts as $workout)
                        <tr class="border-b">
                            <td class="p-3">{{ $workout->title }}</td>
                            <td class="p-3">{{ ucfirst($workout->difficulty) }}</td>
                            <td class="p-3">{{ $workout->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 flex gap-2">
                                <a class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700"
                                   href="{{ route('admin.workouts.edit', $workout) }}">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.workouts.destroy', $workout) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                            onclick="return confirm('Delete this workout?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-3" colspan="4">No workouts found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
