<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $bgColor
 * @property string $color
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bgColor',
        'color',
    ];

    /**
     * @return array
     */
    public function formatWheelData(): array
    {
        return [
            'id' => $this->id,
            'value' => $this->name,
            'bgColor' => $this->bgColor,
            'color' => $this->color,
        ];
    }
}
