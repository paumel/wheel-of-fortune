<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playersData = [
            [
                'name' => 'Paulius',
                'bgColor' => '#ffffff',
                'color' => '#000000',
            ],
            [
                'name' => 'Pranas',
                'bgColor' => '#000000',
                'color' => '#ffffff',
            ],
            [
                'name' => 'Augustinas',
                'bgColor' => '#ffffff',
                'color' => '#000000',
            ],
            [
                'name' => 'Justė',
                'bgColor' => '#000000',
                'color' => '#ffffff',
            ],
            [
                'name' => 'Jurgis',
                'bgColor' => '#ffffff',
                'color' => '#000000',
            ],
            [
                'name' => 'Laura',
                'bgColor' => '#000000',
                'color' => '#ffffff',
            ],
            [
                'name' => 'Mantas',
                'bgColor' => '#ffffff',
                'color' => '#000000',
            ],
        ];

        Player::query()->insert($playersData);
    }
}
