<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workout;
use App\Models\User;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        Workout::insert([
            [
                'title' => 'Beginner Full Body',
                'description' => 'A simple full body workout for beginners.',
                'difficulty' => 'beginner',
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Intermediate Strength',
                'description' => 'Increase strength and endurance.',
                'difficulty' => 'intermediate',
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
