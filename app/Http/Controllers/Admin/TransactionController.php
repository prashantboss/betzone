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
        // DB::enableQueryLog(); // Enable query log
        date_default_timezone_set("Asia/Calcutta");
        $today = date('Y-m-d 10:00:00');
        $todayplusone = date('Y-m-d 10:00:00', strtotime("+1 day"));
        $data = DB::table('player_betting_data_half_sangam')
            ->join('markets', 'player_betting_data_half_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_half_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_half_sangam.player_id', '=', 'players.id')
            ->select('players.email','players.name','players.mobile',
            'player_betting_data_half_sangam.id','player_betting_data_half_sangam.ank_patti','player_betting_data_half_sangam.ank','player_betting_data_half_sangam.patti','player_betting_data_half_sangam.amount','player_betting_data_half_sangam.bet_date','player_betting_data_half_sangam.created_at', 
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data_half_sangam.created_at', '>=', $today)
            ->where('player_betting_data_half_sangam.created_at', '<=', $todayplusone)
            ->orderBy('player_betting_data_half_sangam.created_at', 'DESC')
            ->get();
        // dd($data);
        // dd(DB::getQueryLog()); // Show results of log
        return view('vendor.multiauth.admin.half_sangam_trnxn')
                            ->with('data', $data)
                            ->with('title', 'Rest Transaction');
    }

    public function full_sangam_traxn(){
        date_default_timezone_set("Asia/Calcutta");
        $today = date('Y-m-d 10:00:00');
        $todayplusone = date('Y-m-d 10:00:00', strtotime("+1 day"));
        $data = DB::table('player_betting_data_full_sangam')
            ->join('markets', 'player_betting_data_full_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_full_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_full_sangam.player_id', '=', 'players.id')
            ->select('players.email','players.name','players.mobile',
            'player_betting_data_full_sangam.id','player_betting_data_full_sangam.open_patti','player_betting_data_full_sangam.close_patti','player_betting_data_full_sangam.amount','player_betting_data_full_sangam.bet_date','player_betting_data_full_sangam.created_at', 
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data_full_sangam.created_at', '>=', $today)
            ->where('player_betting_data_full_sangam.created_at', '<=', $todayplusone)
            ->orderBy('player_betting_data_full_sangam.created_at', 'DESC')
            ->get();
        // echo "<pre>";
        // print_r($data);
        return view('vendor.multiauth.admin.full_sangam_trnxn')
                            ->with('data', $data)
                            ->with('title', 'Rest Transaction');
    }

    public function all_rest_traxn(){
        date_default_timezone_set("Asia/Calcutta");
        $today = date('Y-m-d 10:00:00');
        $todayplusone = date('Y-m-d 10:00:00', strtotime("+1 day"));
        $data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.mobile','players.email','players.name','player_betting_data.id','player_betting_data.number','player_betting_data.amount','player_betting_data.bet_date','player_betting_data.created_at','player_betting_data.open_close',
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data.created_at', '>=', $today)
            ->where('player_betting_data.created_at', '<=', $todayplusone)
            ->orderBy('player_betting_data.created_at', 'DESC')
            ->get();
        // echo "<pre>";
        // print_r($data);
        // exit;
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
        Session::flash('flash_message', 'Live result updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.live_result', [$request->id]);
    }

    public function live_result_reset(){
        DB::table('markets')
                ->update(['open' => null, 'jodi' => null, 'close' => null]);
        Session::flash('flash_message', 'Live result reset Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.home');
    }

    public function holiday($game_id, $game_name){
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
                            ->with('game_name', $game_name)
                            ->with('title', 'Holiday/'.$game_name);
    }

    public function holiday_update(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        for($i=1;$i<=16;$i++){
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
        return redirect()->route('admin.holiday', [$request->game_id, $request->game_name]);
    }

    public function game_time($id){
        $data = DB::table('markets')
                ->where('id', $id)->first();
        return view('vendor.multiauth.admin.game_time')
                            ->with('data', $data)
                            ->with('title', 'Game Timing');
    }

    public function update_game_time(Request $request){
        print_r($request->all());
        $request->validate([
            'open_time' => 'required',
            'close_time' => 'required',
            'name' => 'required',
        ]);
        DB::table('markets')
                ->where('id', $request->id)
                ->update(['open_time' => $request->open_time, 'close_time' => $request->close_time, 'name'=>$request->name]);
        Session::flash('flash_message', 'Game time update successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.game_time_show', [$request->id]);
    }
}
