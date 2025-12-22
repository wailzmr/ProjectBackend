<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;

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
        return view('admin.workouts.edit', compact('workout'));
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
}
