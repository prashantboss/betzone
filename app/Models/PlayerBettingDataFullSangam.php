<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerBettingDataFullSangam extends Model
{
    protected $table = 'player_betting_data_full_sangam';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
