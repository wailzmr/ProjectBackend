<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:bg-slate-800 dark:text-slate-100">
            {{ $workout->title }}
            <p class="text-sm text-gray-600 mb-2">
                Difficulty: {{ ucfirst($workout->difficulty) }}
            </p>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Workout info --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight  dark:text-slate-100" > What is it about?</h2>

                @if($workout->description)
                    <p>{{ $workout->description }}</p>
                @endif
            </div>

            {{-- Exercises --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                <h3 class="text-lg font-semibold mb-4">Exercises</h3>

                @if($workout->exercises->isEmpty())
                    <p>No exercises added to this workout yet.</p>
                @else
                    <ul class="space-y-3">
                        @foreach($workout->exercises as $exercise)
                            <li class="border p-4 rounded">
                                <strong>{{ $exercise->name }}</strong>

                                <div class="text-sm text-gray-700 dark:text-slate-100 mt-1">
                                    @if($exercise->pivot->sets)
                                        Sets: {{ $exercise->pivot->sets }}
                                    @endif

                                    @if($exercise->pivot->reps)
                                        | Reps: {{ $exercise->pivot->reps }}
                                    @endif

                                    @if($exercise->pivot->seconds)
                                         Seconds: {{ $exercise->pivot->seconds }}
                                    @endif
                                </div>

                                @if($exercise->notes)
                                    <p class="text-sm mt-2 text-gray-600">
                                        {{ $exercise->notes }}
                                    </p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
