<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Learning English (9-12)',
                'description' => 'English language learning activities and resources for kids aged 9-12',
            ],
            [
                'name' => 'Alphabet',
                'description' => 'Learn the ABCs, letter recognition, and phonics',
            ],
            [
                'name' => 'Coding for Kids',
                'description' => 'Fun and interactive coding principles and games for children',
            ],
            [
                'name' => 'Math Challenges',
                'description' => 'Math puzzles, games, and challenges for ages 9-12',
            ],
            [
                'name' => 'Science Experiments',
                'description' => 'Hands-on science experiments and discovery for kids',
            ],
            [
                'name' => 'History for Kids',
                'description' => 'Explore history in a fun and engaging way',
            ],
            [
                'name' => 'Fun Geography',
                'description' => 'Geography games, maps, and world exploration',
            ],
            [
                'name' => 'Creative Writing',
                'description' => 'Storytelling, poetry, and creative writing prompts',
            ],
            [
                'name' => 'Art & Creativity',
                'description' => 'Drawing, coloring, crafts, and creative expression activities',
            ],
            [
                'name' => 'Music',
                'description' => 'Songs, rhythm, basic instruments, and musical appreciation',
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description']
            ]);
        }
    }
}
