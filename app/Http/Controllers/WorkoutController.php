<?php

namespace App\Http\Controllers;

use App\Models\Workout;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::latest()->get();
        return view('workouts.index', compact('workouts'));
    }

    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }
}
