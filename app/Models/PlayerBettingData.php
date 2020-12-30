<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerBettingData extends Model
{
    protected $table = 'player_betting_data';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
