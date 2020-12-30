<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB;

class Helper
{
    public static function game_to_id(string $string)
    {
        $games = DB::table('games')->where('game_name', $string)->first();
        return $games->id;
    }

    public static function market_to_id(string $string)
    {
        $markets = DB::table('markets')->where('name', $string)->first();
        return $markets->id;
    }

    public static function player_betting_extra(string $table_name, int $id)
    {
        if($table_name == "player_betting_data"){
            $data = DB::table('player_betting_data')->select('number')->where('id', $id)->first();
            return $data->number;
        }elseif($table_name == "player_betting_data_full_sangam"){
            $data = DB::table('player_betting_data_full_sangam')->select('close_patti', 'open_patti')->where('id', $id)->first();
            return "Open Patti :".$data->open_patti. ", Close Patti : ".$data->close_patti;
        }elseif($table_name == "player_betting_data_half_sangam"){
            $data = DB::table('player_betting_data_half_sangam')->select('ank_patti', 'ank', 'patti')->where('id', $id)->first();
            return $data->ank_patti. ", Ank : ".$data->ank.", Patti :".$data->patti;
        }
        
    }
}