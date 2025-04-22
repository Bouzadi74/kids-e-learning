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
                'name' => 'Mathematics',
                'description' => 'Fun with numbers, shapes, and problem-solving activities for kids',
            ],
            [
                'name' => 'Science',
                'description' => 'Explore the natural world, simple experiments, and scientific concepts',
            ],
            [
                'name' => 'Language Arts',
                'description' => 'Reading, writing, vocabulary, and storytelling adventures',
            ],
            [
                'name' => 'Art & Creativity',
                'description' => 'Drawing, coloring, crafts, and creative expression activities',
            ],
            [
                'name' => 'Music',
                'description' => 'Songs, rhythm, basic instruments, and musical appreciation',
            ],
            [
                'name' => 'Social Studies',
                'description' => 'Learn about different cultures, history, and the world around us',
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
