<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class TransactionController extends Controller
{
    public function half_sangam_traxn(){
        
    }

    public function full_sangam_traxn(){
        
    }

    public function all_rest_traxn(){
        $data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.email','players.name','player_betting_data.id','player_betting_data.number','player_betting_data.amount','player_betting_data.bet_date','player_betting_data.created_at', 
            'games.game_name', 'markets.name as market_name')
            ->orderBy('player_betting_data.created_at', 'desc')
            ->get();
        // echo "<pre>";
        // print_r($data);
        return view('vendor.multiauth.admin.rest_trnxn')
                            ->with('data', $data)
                            ->with('title', 'Rest Transaction');
    }

    public function live_result($id){
        $data = DB::table('markets')
                ->where('id', $id)->first();
        return view('vendor.multiauth.admin.live_result')
                            ->with('data', $data)
                            ->with('title', 'Live Result');
    }

    public function update_live_result(Request $request){
        // print_r($request->all());
        $request->validate([
            // 'open' => 'integer',
            // 'jodi' => 'integer',
            // 'close' => 'integer',
        ]);
        DB::table('markets')
                ->where('id', $request->id)
                ->update(['open' => $request->open, 'jodi' => $request->jodi, 'close' => $request->close]);
        return $this->live_result($request->id);
    }

    public function holiday($game_id){
        $data = DB::table('markets')->get();
        // $data1 = DB::table('market_holiday')
        //                     ->where('market_holiday.game_id',$game_id)
        //                     ->join('markets', 'markets.id', '=', 'market_holiday.market_id')
        //                     ->select('market_holiday.*', 'markets.name as market_name')
        //                     ->get();
        return view('vendor.multiauth.admin.holiday')
                            ->with('markets', $data)
                            // ->with('holiday_data', $data1)
                            ->with('game_id', $game_id)
                            ->with('title', 'Holiday');
    }

    public function holiday_update(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        for($i=1;$i<=12;$i++){
            $data = DB::table('market_holiday')
                            ->where('game_id',$request->game_id)
                            ->where('market_id',$i)
                            ->first();
            $var = "is_closed_".$i;
            // echo $request->$var."<br/>";
            if(!$data){
                //user is not found 
                
                DB::table('market_holiday')->insert([
                    ['game_id' => $request->game_id, 'market_id' => $i, 'is_closed'=>$request->$var],
                ]);
                Session::flash('flash_message', 'Inserted Successfully.');
                Session::flash('flash_type', 'alert-success');
            }
            if($data){
                // user found 
                $affected = DB::table('market_holiday')
                                        ->where('game_id', $request->game_id)
                                        ->where('market_id', $i)
                                        ->update(['is_closed' => $request->$var]);
                Session::flash('flash_message', 'Updation Successfully.');
                Session::flash('flash_type', 'alert-success');
            }
           
        }
        return $this->holiday($request->game_id);
    }
}
