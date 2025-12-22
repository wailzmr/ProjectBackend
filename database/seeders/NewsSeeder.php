<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        News::create([
            'title' => 'Welcome to the fitness community',
            "image_path" => 'public/storage/news/images.png',
            'content' => 'This is our first news item.',
            'published_at' => now(),
            'created_by' => 1,
        ]);
    }

}
