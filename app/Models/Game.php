<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property Collection $players
 */
class Game extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }

    /**
     * @return Builder|Model|Game
     */
    public static function new(): Builder|Model|Game
    {
        return self::query()->create();
    }
}
