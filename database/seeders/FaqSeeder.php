<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $general = FaqCategory::create([
            'name' => 'General',
        ]);

        $account = FaqCategory::create([
            'name' => 'Account',
        ]);

        $workouts = FaqCategory::create([
            'name' => 'Workouts',
        ]);

        Faq::insert([
            [
                'faq_category_id' => $general->id,
                'question' => 'What is this website?',
                'answer' => 'This platform allows users to view workouts, read news and manage their profile.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faq_category_id' => $account->id,
                'question' => 'Do I need an account?',
                'answer' => 'Yes, you need an account to save workouts and access personal features.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faq_category_id' => $workouts->id,
                'question' => 'Are workouts suitable for beginners?',
                'answer' => 'Yes, workouts are categorized by difficulty: beginner, intermediate and advanced.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
