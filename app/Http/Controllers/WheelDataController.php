<?php

namespace App\Http\Controllers;

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
        return [
            'players' => [
                [
                    'id' => 1,
                    'value' => "Paulius",
                    'bgColor' => "#7d7db3",
                    'color' => "#ffffff",
                ],
                [
                    'id' => 2,
                    'value' => "Pranas",
                    'bgColor' => "#dddddd",
                    'color' => "#ffffff",
                ],
            ],
            'next' => 2,
        ];
    }
}
