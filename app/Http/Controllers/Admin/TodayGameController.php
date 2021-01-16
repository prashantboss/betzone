<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class TodayGameController extends Controller
{
    public function index($id, $game_name){
        $markets = DB::table('markets')->get();
        return view('vendor.multiauth.admin.today_game_index')
                            ->with('markets', $markets)
                            ->with('game_id', $id)
                            ->with('game_name', $game_name)
                            ->with('title', 'Today Game');
    }

    public function search(Request $request){
        $game_id_with_oc = array(1,3,4,5);
        if(in_array($request->game_id,$game_id_with_oc)){
            $bet_data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.wallet', 'players.mobile','players.email','players.name','player_betting_data.id',
            'player_betting_data.number','player_betting_data.bet_date',
            'player_betting_data.created_at', 
            'games.game_name', 'markets.name as market_name',
            'players.id as player_id','player_betting_data.amount','player_betting_data.game_id','player_betting_data.market_id')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->where('open_close', $request->oc)
            ->orderBy('player_betting_data.created_at', 'DESC')
            ->get();
        }
        return view('vendor.multiauth.admin.today_game_search')
                            ->with('bet_data', $bet_data)
                            ->with('game_id', $request->game_id)
                            ->with('title', 'Today Game Search');

    }

    public function final_submit(Request $request){
        print_r($request->all());
        foreach($request->to_wallet as $pagm){
            list($player_id, $amount, $game_id, $market_id, $wallet) = explode('-', $pagm);

            //Game rates
            if($game_id == 1){
                $rate = 9.5;
            }elseif($game_id == 2){
                $rate = 90;
            }elseif($game_id == 3){
                $rate = 140;
            }elseif($game_id == 4){
                $rate = 250;
            }elseif($game_id == 5){
                $rate = 500;
            }elseif($game_id == 6){
                $rate = 1000;
            }elseif($game_id == 7){
                $rate = 10000;
            }
            $amount_win = $amount*$rate;
            DB::table('players')
                ->where('id', $player_id)
                ->update(['wallet' => $wallet + $amount_win]);

            DB::table('game_ledger')->insert([
                'player_id' => $player_id,
                'amount' => $amount_win,
                'status' => "credit to wallet"
            ]);
        }
        Session::flash('flash_message', 'Player amount*x updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.player.index');
    }
}