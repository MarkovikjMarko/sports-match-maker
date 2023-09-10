<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'time',
        'date',
        'description',
        'isTeamGame',
        'isPending'
    ];

    public function team1(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team1');
    }

    public function team2(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team2');
    }

    public function player1(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player1');
    }

    public function player2(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player2');
    }

    public function sport(): BelongsTo {
        return $this->BelongsTo(Sport::class);
    }
}
