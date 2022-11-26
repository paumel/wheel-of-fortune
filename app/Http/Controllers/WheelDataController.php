<?php

namespace App\Http\Controllers;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class WheelDataController extends Controller
{
    private GameRepositoryInterface $gameRepository;

    /**
     * @param GameRepositoryInterface $gameRepository
     */
    public function __construct(GameRepositoryInterface $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $game = $this->gameRepository->getCurrent();

        $players = Player::query()->whereNotIn('id', $game->players->pluck('id'))->get();

        $nextPlayer = $players->random();
        $game->players()->attach($nextPlayer->id);

        return [
            'players' => $players->map(static function (Player $player) {
                return $player->formatWheelData();
            }),
            'next' => $nextPlayer->id,
        ];
    }
}
