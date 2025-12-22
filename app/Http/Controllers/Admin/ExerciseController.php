<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::orderBy('name')->get();
        return view('admin.exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('admin.exercises.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Exercise::create($data);

        return redirect()->route('admin.exercises.index');
    }

    public function edit(Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $exercise->update($data);

        return redirect()->route('admin.exercises.index');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('admin.exercises.index');
    }
}
