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
                'name' => 'Alphabet',
                'description' => 'Learn the ABCs, letter recognition, and phonics',
            ],
            [
                'name' => 'Numbers',
                'description' => 'Counting, basic math, and number recognition',
            ],
            [
                'name' => 'Colors',
                'description' => 'Color recognition, mixing, and creative activities',
            ],
            [
                'name' => 'Animals',
                'description' => 'Learn about different animals, their habitats, and sounds',
            ],
            [
                'name' => 'Shapes',
                'description' => 'Shape recognition, geometry basics, and creative activities',
            ],
            [
                'name' => 'Science',
                'description' => 'Simple experiments, nature exploration, and scientific concepts',
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
