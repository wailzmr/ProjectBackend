<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;
use App\Models\Exercise;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::latest()->get();
        return view('admin.workouts.index', compact('workouts'));
    }

    public function create()
    {
        return view('admin.workouts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'difficulty' => 'required',
        ]);

        $data['created_by'] = auth()->id();

        Workout::create($data);

        return redirect()->route('admin.workouts.index');
    }

    public function edit(Workout $workout)
    {
        $allExercises = \App\Models\Exercise::orderBy('name')->get();
        $workout->load('exercises'); // handig

        return view('admin.workouts.edit', compact('workout', 'allExercises'));
    }


    public function update(Request $request, Workout $workout)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'difficulty' => 'required',
        ]);

        $workout->update($data);

        return redirect()->route('admin.workouts.index');
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();
        return redirect()->route('admin.workouts.index');
    }

    public function attachExercise(Request $request, Workout $workout)
    {
        $data = $request->validate([
            'exercise_id' => ['required', 'exists:exercises,id'],
            'sets' => ['nullable', 'integer', 'min:1', 'max:50'],
            'reps' => ['nullable', 'integer', 'min:1', 'max:200'],
            'seconds' => ['nullable', 'integer', 'min:1', 'max:3600'],
        ]);

        $exerciseId = (int) $data['exercise_id'];

        $workout->exercises()->syncWithoutDetaching([
            $exerciseId => [
                'sets' => $data['sets'] ?? null,
                'reps' => $data['reps'] ?? null,
                'seconds' => $data['seconds'] ?? null,
            ],
        ]);

        return back()->with('success', 'Exercise added to workout.');
    }

    public function detachExercise(Workout $workout, Exercise $exercise)
    {
        $workout->exercises()->detach($exercise->id);

        return back()->with('success', 'Exercise removed from workout.');
    }
}
