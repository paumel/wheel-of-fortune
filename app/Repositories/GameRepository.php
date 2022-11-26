<?php

namespace App\Repositories;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GameRepository implements GameRepositoryInterface
{
    /**
     * @return Game|Builder|Model
     */
    public function getCurrent(): Game|Builder|Model
    {
        $game = Game::query()->where('created_at', '>=', Carbon::now()->subMinutes(15))->latest()->first();

        if (!$game) {
            return Game::new();
        }

        if ($game->players->count() === Game::PLAYERS_COUNT) {
            return Game::new();
        }

        return $game;
    }
}
