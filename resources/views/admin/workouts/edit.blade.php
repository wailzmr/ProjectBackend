<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-slate-100">
            Admin · Edit workout
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Workout edit --}}
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('admin.workouts.update', $workout) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Title</label>
                        <input name="title" value="{{ old('title', $workout->title) }}" class="w-full border rounded p-2" required>
                        @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description" class="w-full border rounded p-2">{{ old('description', $workout->description) }}</textarea>
                        @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Difficulty</label>
                        <select name="difficulty" class="w-full border rounded p-2" required>
                            @foreach(['beginner','intermediate','advanced'] as $d)
                                <option value="{{ $d }}" @selected(old('difficulty', $workout->difficulty) === $d)>
                                    {{ ucfirst($d) }}
                                </option>
                            @endforeach
                        </select>
                        @error('difficulty') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update workout
                    </button>
                </form>
            </div>

            {{-- Add exercise to workout (pivot attach) --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Add exercise</h3>

                <form method="POST" action="{{ route('admin.workouts.exercises.attach', $workout) }}" class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    @csrf

                    <div class="md:col-span-2">
                        <label class="block font-medium">Exercise</label>
                        <select name="exercise_id" class="w-full border rounded p-2" required>
                            @foreach($allExercises as $ex)
                                <option value="{{ $ex->id }}">{{ $ex->name }}</option>
                            @endforeach
                        </select>
                        @error('exercise_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Sets</label>
                        <input name="sets" type="number" min="1" class="w-full border rounded p-2">
                        @error('sets') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Reps</label>
                        <input name="reps" type="number" min="1" class="w-full border rounded p-2">
                        @error('reps') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Seconds</label>
                        <input name="seconds" type="number" min="1" class="w-full border rounded p-2">
                        @error('seconds') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-4">
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Add
                        </button>
                    </div>
                </form>
            </div>

            {{-- Current exercises --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Current exercises</h3>

                @if($workout->exercises->isEmpty())
                    <p>No exercises attached yet.</p>
                @else
                    <ul class="space-y-3">
                        @foreach($workout->exercises as $exercise)
                            <li class="border rounded p-4 flex items-start justify-between">
                                <div>
                                    <div class="font-semibold">{{ $exercise->name }}</div>
                                    <div class="text-sm text-gray-700">
                                        Sets: {{ $exercise->pivot->sets ?? '-' }},
                                        Reps: {{ $exercise->pivot->reps ?? '-' }},
                                        Seconds: {{ $exercise->pivot->seconds ?? '-' }}
                                    </div>
                                    @if($exercise->notes)
                                        <div class="text-sm text-gray-600 mt-1">{{ $exercise->notes }}</div>
                                    @endif
                                </div>

                                <form method="POST" action="{{ route('admin.workouts.exercises.detach', [$workout, $exercise]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                            onclick="return confirm('Remove this exercise from workout?')">
                                        Remove
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
