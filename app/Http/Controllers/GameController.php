<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::where('is_active', true)->get();
        return view('game.index', compact('games'));
    }

    public function play(Game $game)
    {
        if (!$game->website_url) {
            return redirect()->route('game.index')
                           ->with('error', 'Game URL not found.');
        }
        return redirect()->away($game->website_url);
    }
}