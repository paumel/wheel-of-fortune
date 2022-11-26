<?php

namespace App\Repositories;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GameRepository implements GameRepositoryInterface
{
    /**
     * @return Game|Builder|Model
     */
    public function getCurrent(): Game|Builder|Model
    {
        $game = Game::query()->latest()->first();

        if (!$game) {
            return Game::new();
        }

        if ($game->players->count() === 5) {
            return Game::new();
        }

        return $game;
    }
}
