<?php

namespace App\Http\Controllers\Game;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class GameViewController extends Controller
{
    /**
     * @return Factory|View
     */
    public function main()
    {
        return view('game.index');
    }

    public function game(Game $game)
    {
        return view('game/game');
    }

}
