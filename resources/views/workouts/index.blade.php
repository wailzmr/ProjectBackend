
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Workouts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if($workouts->isEmpty())
    <div class="bg-white p-6 rounded shadow">
        <p>No workouts available.</p>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($workouts as $workout)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">
                    {{ $workout->title }}
                </h3>

                <p class="text-sm text-gray-600 mb-2">
                    Difficulty: {{ ucfirst($workout->difficulty) }}
                </p>

                @if($workout->description)
                    <p class="text-sm mb-4">
                        {{ Str::limit($workout->description, 100) }}
                    </p>
                @endif

                <a href="{{ route('workouts.show', $workout) }}"
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    View workout
                </a>
            </div>
        @endforeach
    </div>
    @endif

    </div>
    </div>
    </x-app-layout>
