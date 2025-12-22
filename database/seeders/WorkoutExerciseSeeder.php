<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workout;
use App\Models\Exercise;

class WorkoutExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $workoutBeginner = Workout::where('title', 'Beginner Full Body')->first();
        $workoutIntermediate = Workout::where('title', 'Intermediate Strength')->first();

        $pushups = Exercise::where('name', 'Push-ups')->first();
        $squats = Exercise::where('name', 'Squats')->first();
        $plank = Exercise::where('name', 'Plank')->first();
        $jumping = Exercise::where('name', 'Jumping Jacks')->first();

        // Beginner workout
        $workoutBeginner->exercises()->attach([
            $pushups->id => [
                'sets' => 3,
                'reps' => 10,
                'seconds' => null,
            ],
            $squats->id => [
                'sets' => 3,
                'reps' => 12,
                'seconds' => null,
            ],
            $plank->id => [
                'sets' => null,
                'reps' => null,
                'seconds' => 30,
            ],
        ]);

        // Intermediate workout
        $workoutIntermediate->exercises()->attach([
            $pushups->id => [
                'sets' => 4,
                'reps' => 15,
                'seconds' => null,
            ],
            $squats->id => [
                'sets' => 4,
                'reps' => 15,
                'seconds' => null,
            ],
            $jumping->id => [
                'sets' => null,
                'reps' => null,
                'seconds' => 60,
            ],
        ]);
    }
}
