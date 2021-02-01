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
        if($game_name == "Half Sangam" || $game_name == "Full Sangam"){
            $game_numbers = DB::table('game_number')->where('game', 'sangam')->get();
        }else{
            $game_numbers = null;
        }
        
        return view('vendor.multiauth.admin.today_game_index')
                            ->with('markets', $markets)
                            ->with('game_id', $id)
                            ->with('game_name', $game_name)
                            ->with('game_numbers', $game_numbers)
                            ->with('title', 'Today Game');
    }

    public function search(Request $request){
        
        $game_id_with_oc = array(1,3,4,5);
        if(in_array($request->game_id,$game_id_with_oc)){
            $request->validate([
                'date' => 'required',
                'market_id' => 'required',
                'oc' => 'required',
                'number' => 'required',
            ]);
            $bet_data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.wallet', 'players.mobile','players.email','players.name','player_betting_data.id',
            'player_betting_data.number','player_betting_data.bet_date','player_betting_data.status',
            'player_betting_data.created_at', 
            'games.game_name', 'markets.name as market_name',
            'players.id as player_id','player_betting_data.amount','player_betting_data.game_id',
            'player_betting_data.market_id', 'player_betting_data.table_name')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->where('open_close', $request->oc)
            ->where('number', $request->number)
            ->orderBy('player_betting_data.created_at', 'DESC')
            ->get();
        }

        if($request->game_id == 2){
            $request->validate([
                'date' => 'required',
                'market_id' => 'required',
                'number' => 'required',
            ]);
            $bet_data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.wallet', 'players.mobile','players.email','players.name','player_betting_data.id',
            'player_betting_data.number','player_betting_data.bet_date','player_betting_data.status',
            'player_betting_data.created_at', 
            'games.game_name', 'markets.name as market_name',
            'players.id as player_id','player_betting_data.amount','player_betting_data.game_id',
            'player_betting_data.market_id', 'player_betting_data.table_name')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->where('number', $request->number)
            ->orderBy('player_betting_data.created_at', 'DESC')
            ->get();
        }

        if($request->game_id == 6){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            //     'number' => 'required',
            // ]);
            $bet_data = DB::table('player_betting_data_half_sangam')
            ->join('markets', 'player_betting_data_half_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_half_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_half_sangam.player_id', '=', 'players.id')
            ->select('players.wallet', 'players.mobile','players.email','players.name',
            'games.game_name', 'markets.name as market_name',
            'player_betting_data_half_sangam.id', 'player_betting_data_half_sangam.ank_patti',
            'player_betting_data_half_sangam.ank','player_betting_data_half_sangam.patti',
            'player_betting_data_half_sangam.amount', 'player_betting_data_half_sangam.bet_date', 
            'player_betting_data_half_sangam.created_at', 'player_betting_data_half_sangam.game_id',
            'player_betting_data_half_sangam.market_id','player_betting_data_half_sangam.player_id', 
            'player_betting_data_half_sangam.status', 'player_betting_data_half_sangam.table_name')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->orderBy('player_betting_data_half_sangam.created_at', 'DESC')
            ->get();

            
        }

        if($request->game_id == 7){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            //     'number' => 'required',
            // ]);
            $bet_data = DB::table('player_betting_data_full_sangam')
            ->join('markets', 'player_betting_data_full_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_full_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_full_sangam.player_id', '=', 'players.id')
            ->select('players.wallet', 'players.mobile','players.email','players.name',
            'games.game_name', 'markets.name as market_name',
            'player_betting_data_full_sangam.id', 'player_betting_data_full_sangam.close_patti',
            'player_betting_data_full_sangam.open_patti',
            'player_betting_data_full_sangam.amount', 'player_betting_data_full_sangam.bet_date', 
            'player_betting_data_full_sangam.created_at', 'player_betting_data_full_sangam.game_id',
            'player_betting_data_full_sangam.market_id','player_betting_data_full_sangam.player_id', 
            'player_betting_data_full_sangam.status', 'player_betting_data_full_sangam.table_name')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->orderBy('player_betting_data_full_sangam.created_at', 'DESC')
            ->get();

            
        }
        // dd($bet_data);

        return view('vendor.multiauth.admin.today_game_search')
                            ->with('bet_data', $bet_data)
                            ->with('game_id', $request->game_id)
                            ->with('title', 'Today Game Search');

    }

    public function final_submit(Request $request){
        // print_r($request->all());

        foreach($request->to_wallet as $bpagmwt){
            list($bet_id, $player_id, $amount, $game_id, $market_id, $wallet, $table_name) = explode('-', $bpagmwt);

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

            $wallet = DB::table('players')
                ->where('id', $player_id)->first()->wallet;

            $amount_win = $amount*$rate;

            if($table_name == "player_betting_data"){
                DB::table('player_betting_data')
                ->where('id', $bet_id)
                ->update(['status' => 1]);
            }elseif($table_name == "player_betting_data_half_sangam"){
                DB::table('player_betting_data_half_sangam')
                ->where('id', $bet_id)
                ->update(['status' => 1]);
            }elseif($table_name == "player_betting_data_full_sangam"){
                DB::table('player_betting_data_full_sangam')
                ->where('id', $bet_id)
                ->update(['status' => 1]);
            }
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

    public function thela_index($id, $game_name){
        $markets = DB::table('markets')->get();
        return view('vendor.multiauth.admin.thela_index')
                            ->with('markets', $markets)
                            ->with('game_id', $id)
                            ->with('game_name', $game_name)
                            ->with('title', 'Game Thela');
    }

    public function thela_search(Request $request){
        
        $game_id_with_oc = array(1,3,4,5);
        if(in_array($request->game_id,$game_id_with_oc)){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            //     'oc' => 'required',
            // ]);

            $bet_data = DB::table('player_betting_data')
            ->select('number','amount', DB::raw('SUM(amount) AS sum'), 'bet_date')
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->where('open_close', $request->oc)
            ->orderBy('number', 'ASC')
            ->groupBy('amount', 'number', 'bet_date')
            ->get();
        }

        if($request->game_id == 2){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            // ]);
            $bet_data = DB::table('player_betting_data')
            ->select('number','amount', 'bet_date',  DB::raw('SUM(amount) AS sum'))
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->orderBy('number', 'ASC')
            ->groupBy('amount', 'number', 'bet_date')
            ->get();
        }

        if($request->game_id == 6){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            // ]);
            $bet_data = DB::table('player_betting_data_half_sangam')
            ->select('amount', 'ank_patti', 'ank', 'patti', 'bet_date',  DB::raw('SUM(amount) AS sum'))
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->groupBy('amount', 'ank_patti', 'ank', 'patti', 'bet_date')
            ->get();

            return view('vendor.multiauth.admin.thela_total')
                            ->with('bet_data', $bet_data)
                            ->with('game_id', $request->game_id)
                            ->with('title', 'Game Thela');
        }

        if($request->game_id == 7){
            // $request->validate([
            //     'date' => 'required',
            //     'market_id' => 'required',
            // ]);
            $bet_data = DB::table('player_betting_data_full_sangam')
            ->select('amount', 'close_patti', 'open_patti', 'bet_date',  DB::raw('SUM(amount) AS sum'))
            ->where('bet_date', $request->date)
            ->where('market_id', $request->market_id)
            ->groupBy('amount', 'close_patti', 'open_patti', 'bet_date')
            ->get();

            return view('vendor.multiauth.admin.thela_total')
                            ->with('bet_data', $bet_data)
                            ->with('game_id', $request->game_id)
                            ->with('title', 'Game Thela');
        }
        $arr = [];
        foreach($bet_data as $row){
            if (array_key_exists($row->number,$arr)){
                $amount = $arr[$row->number]+$row->amount;
                $arr[$row->number] = $amount;
            }else{
                $arr[$row->number] = $row->amount;
            }
        }
        // dd($bet_data);
        // print_r($arr);
        return view('vendor.multiauth.admin.thela_total')
                            ->with('bet_data', $arr)
                            ->with('game_id', $request->game_id)
                            ->with('title', 'Game Thela');

    }
}
