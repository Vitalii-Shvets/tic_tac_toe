<?php

namespace App\Http\Controllers\Game;

use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return int
     */
    public function store(Request $request)
    {
        $item = new Game($request->input());
        $arr = [[null, null, null], [null, null, null], [null, null, null]];
        $item->fieldGame = json_encode($arr);
        $item->save();

        if ($item) {
            return response()->json($item->id, 201);
        }
        return 500;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return Game::findOrFail($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Game $game
     * @return int
     */
    public function update(Request $request, Game $game)
    {

        $arr = json_decode($game->fieldGame);
        $data = $request->input();
        $game->hit = $this->gameService->getHit($arr, 'X', '0');

        $arr[$data['x']][$data['y']] = $this->gameService->getHit($arr, 'X', '0');

        $game->result = $this->gameService->getWinner($arr, 'X', '0');


        $game->fieldGame = json_encode($arr);
        if ($game->save()) {
            return response()->json($game, 200);
        }
        return 500;


    }
}
