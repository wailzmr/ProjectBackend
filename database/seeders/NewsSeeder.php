<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $items = [
            [
                'title' => 'Welcome to the fitness community',
                'image_path' => 'news/images.png',
                'content' => 'This is our first news item.',
            ],
            [
                'title' => 'New workouts added',
                'image_path' => 'news/6782246.png',
                'content' => 'We added a couple of new workouts to help you level up your training.',
            ],
            [
                'title' => 'Community challenge',
                'image_path' => 'news/360_F_334965495_NccE2BTKivtaRoAk62yJw9UkxATGrhT4.jpg',
                'content' => 'Join this week\'s challenge and share your progress in the forum!',
            ],
        ];

        foreach ($items as $data) {
            News::create([
                'title' => $data['title'],
                'image_path' => $data['image_path'],
                'content' => $data['content'],
                'published_at' => now(),
                'created_by' => 1,
            ]);
        }
    }

}
