<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class WheelDataController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $players = Player::all();

        return [
            'players' => $players->map(static function (Player $player) {
                return $player->formatWheelData();
            }),
            'next' => $players->pluck('id')->random(),
        ];
    }
}
