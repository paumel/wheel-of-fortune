<?php

namespace App\Http\Controllers;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WheelController extends Controller
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
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $game = $this->gameRepository->getCurrent();

        $players = Player::query()->whereNotIn('id', $game->players->pluck('id'))->get();

        $nextPlayer = $players->random();
        $game->players()->attach($nextPlayer->id);

        return Inertia::render('WheelOfFortune', [
            'players' => $players->map(static function (Player $player) {
                return $player->formatWheelData();
            }),
            'next' => $nextPlayer->id,
        ]);
    }
}
