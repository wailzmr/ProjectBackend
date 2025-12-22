<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        Exercise::insert([
            [
                'name' => 'Push-ups',
                'notes' => 'Keep your back straight.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Squats',
                'notes' => 'Go as low as comfortable.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plank',
                'notes' => 'Engage your core.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jumping Jacks',
                'notes' => 'Maintain a steady rhythm.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
