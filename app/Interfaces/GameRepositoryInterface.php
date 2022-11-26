<?php

namespace App\Interfaces;

use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface GameRepositoryInterface
{
    public function getCurrent(): Game|Builder|Model;
}
