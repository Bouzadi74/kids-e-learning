<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

Game::updateOrCreate(
    ['slug' => 'math-quiz-challenge'],
    [
        'name' => 'Math Quiz Challenge',
       
    ]
);

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'name' => 'Math Quiz Challenge',
                'description' => 'Test your math skills with this fun quiz game! Answer questions about basic arithmetic and improve your calculation speed.',
                'type' => 'quiz',
                'age_group_min' => 7,
                'age_group_max' => 12,
                'website_url' => 'https://www.adaptedmind.com/Math-Worksheets.html?utm_medium=cpc&utm_source=google&campaignid=21256025476&campaign_type=search&placement=g&utm_content=responsivesearchad&adid=698155329528&adset_id=164880846474&utm_term=best%20apps%20for%20kids&ad_position=&device=c&gad_source=1&gbraid=0AAAAADyJuNOa2jldHJ2vvdIuszEnEhuHw&gclid=CjwKCAjwq7fABhB2EiwAwk-YbGlA9bk3csTfc9tpWzpVO9CF_E0nP8JAPdIVY2_auQuQFD1VlCI9MBoCRlwQAvD_BwE'
            ],
            [
                'name' => 'Animal Memory Match',
                'description' => 'Match pairs of animal cards in this memory game. Train your memory while learning about different animals!',
                'type' => 'memory',
                'age_group_min' => 5,
                'age_group_max' => 10,
                'website_url' => 'https://www.memozor.com/memory-games/for-kids'
            ]
        ];

        foreach ($games as $game) {
            Game::create([
                'name' => $game['name'],
                'slug' => Str::slug($game['name']),
                'description' => $game['description'],
                'type' => $game['type'],
                'age_group_min' => $game['age_group_min'],
                'age_group_max' => $game['age_group_max'],
                'is_active' => true,
                'website_url' => $game['website_url']
            ]);
        }
    }
}