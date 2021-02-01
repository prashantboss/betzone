<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Helpers\Helper;
use App\Models\PlayerBettingData;
use App\Models\PlayerBettingDataHalfSangam;
use App\Models\PlayerBettingDataFullSangam;

class GamesController extends Controller
{
    public function list_market($id, $name){
        $market_list = DB::table('markets')->get();
        return view('player.market_list')
                            ->with('market_list', $market_list)
                            ->with('game_name', $name)
                            ->with('game_id', $id)
                            ->with('title', 'Market List');
        
    }

    public function market_number($game_name, $market, $open_close=null){
        if($game_name == "Single"){
            $game_numbers = null;
            $open_close = $open_close;
        }else if($game_name == "Jodi"){
            $game_numbers = null;
            $open_close = null;
        }else if($game_name == "Single Patti"){
            $game_numbers = DB::table('game_number')->where('game', 'single_patti')->get();
            $open_close = $open_close;
        }else if($game_name == "Double Patti"){
            $game_numbers = DB::table('game_number')->where('game', 'double_patti')->get();
            $open_close = $open_close;
        }else if($game_name == "Triple Patti"){
            $game_numbers = null;
            $open_close = $open_close;
        }else if($game_name == "Half Sangam" || $game_name == "Full Sangam"){
            $game_numbers = DB::table('game_number')->where('game', 'sangam')->get();
            $open_close = null;
        }
        return view('player.market_number_game')
                            ->with('game_name', $game_name)
                            ->with('market', $market)
                            ->with('game_numbers', $game_numbers)
                            ->with('open_close', $open_close)
                            ->with('title', 'Market Number Game');
    }

    public function create_game_market(Request $request){
        // dd($request->all());
        if($request->game == "Single" || $request->game == "Single Patti" || $request->game == "Double Patti" || $request->game == "Jodi" || $request->game == "Triple Patti"){
            $array = array();
            if (strlen(implode($request->amount)) == 0){
                Session::flash('flash_message', 'Please Enter Minimum One Betting Number');
                Session::flash('flash_type', 'alert-danger');
                // return $this->market_number($request->game, $request->market);
                return redirect()->route('player.market.number', [$request->game, $request->market]);
            }
            for($i=0;$i<count(array_keys($request->amount));$i++){
                if($request->amount[array_keys($request->amount)[$i]] != ''){
                    if($request->amount[array_keys($request->amount)[$i]]<10){
                        Session::flash('flash_message', 'Minimum play amount Rs.10');
                        Session::flash('flash_type', 'alert-danger');
                        return redirect()->route('player.market.number', [$request->game, $request->market]);
                    }
                }  
            }

            $total_amount = 0; // not for half and full sangam


            foreach($request->amount as $key => $value){
                if(!empty($value)){
                    if($request->game == "Single" || $request->game == "Single Patti" || $request->game == "Double Patti"){
                        $number = $key;
                    }else if($request->game == "Jodi"){
                        if($key <= 9){
                            $number = '0'.$key;
                        }else{
                            $number = $key;
                        }
                        
                    }else if($request->game == "Triple Patti"){
                        $number = $key.$key.$key;
                    }
                    $data = array(
                        array(
                            'player_id'=>Auth::guard('player')->user()->id, 
                            'game_id'=>Helper::game_to_id($request->game),
                            'market_id'=>Helper::market_to_id($request->market),
                            'open_close'=> $request->open_close,
                            'amount'=> $value,
                            'number'=>$number,
                            'bet_date'=>date('Y-m-d')
                        ),
                    );
                    $total_amount+=$value;
                    PlayerBettingData::insert($data);
                }
            }
        }else if($request->game == "Half Sangam"){
            $request->validate([
                'ank_patti' => 'required',
                'ank' => 'required',
                'patti' => 'required',
                'amount' => 'required|integer|min:10',
            ]);
            $data = array(
                array(
                    'player_id'=>Auth::guard('player')->user()->id, 
                    'game_id'=>Helper::game_to_id($request->game),
                    'market_id'=>Helper::market_to_id($request->market),
                    'ank_patti'=> $request->ank_patti,
                    'ank'=> $request->ank,
                    'patti'=> $request->patti,
                    'amount'=> $request->amount,
                    'bet_date'=>date('Y-m-d')
                ),
            );
            $updated_wallet = Auth::guard('player')->user()->wallet - $request->amount;
            DB::table('players')
                ->where('id', Auth::guard('player')->user()->id)
                ->update(['wallet' => $updated_wallet]);
            PlayerBettingDataHalfSangam::insert($data);
        }else if($request->game == "Full Sangam"){
            $request->validate([
                'open_patti' => 'required',
                'close_patti' => 'required',
                'amount' => 'required|integer|min:10',
            ]);
            $data = array(
                array(
                    'player_id'=>Auth::guard('player')->user()->id, 
                    'game_id'=>Helper::game_to_id($request->game),
                    'market_id'=>Helper::market_to_id($request->market),
                    'open_patti'=> $request->open_patti,
                    'close_patti'=> $request->close_patti,
                    'amount'=> $request->amount,
                    'bet_date'=>date('Y-m-d')
                ),
            );
            $updated_wallet = Auth::guard('player')->user()->wallet - $request->amount;
            DB::table('players')
                ->where('id', Auth::guard('player')->user()->id)
                ->update(['wallet' => $updated_wallet]);
            PlayerBettingDataFullSangam::insert($data);
        }

        //Wallet update not for half and full sangam
        if($request->game != "Full Sangam" || $request->game != "Half Sangam"){
            $updated_wallet = Auth::guard('player')->user()->wallet - $request->amount;
            DB::table('players')
                ->where('id', Auth::guard('player')->user()->id)
                ->update(['wallet' => $updated_wallet]);

        }
        

        Session::flash('flash_message', 'Game Play Successfull.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('player.dashboard');
        // return view('player.thankyou')->with('title', 'Thanks Page');
    }

    public function balance_enquiry(){
        // $market_list = DB::select('select * from player_betting_data where player_id = '.Auth::guard('player')->user()->id.
        //                             'UNION ALL
        //                             select * from player_betting_data_full_sangam where player_id = '.Auth::guard('player')->user()->id
        //                         );
        $balance_enq = DB::select('select *
                                    from (
                                        SELECT bt.open_close, bt.id, bt.table_name, bt.player_id, g.game_name, m.name as market_name, bt.amount, bt.created_at FROM player_betting_data as bt 
                                        INNER JOIN markets as m 
                                        ON
                                        m.id = bt.market_id
                                        INNER JOIN games as g
                                        ON
                                        g.id = bt.game_id
                                        where bt.player_id = '.Auth::guard('player')->user()->id.'                   
                                        UNION ALL

                                        SELECT dfs.open_close, dfs.id, dfs.table_name, dfs.player_id, g.game_name, m.name as market_name, dfs.amount, dfs.created_at FROM player_betting_data_full_sangam as dfs 
                                        INNER JOIN markets as m 
                                        ON
                                        m.id = dfs.market_id
                                        INNER JOIN games as g
                                        ON
                                        g.id = dfs.game_id
                                        where dfs.player_id = '.Auth::guard('player')->user()->id.'
                                        UNION ALL

                                        SELECT dhs.open_close, dhs.id, dhs.table_name, dhs.player_id, g.game_name, m.name as market_name, dhs.amount, dhs.created_at FROM player_betting_data_half_sangam as dhs 
                                        INNER JOIN markets as m 
                                        ON
                                        m.id = dhs.market_id
                                        INNER JOIN games as g
                                        ON
                                        g.id = dhs.game_id
                                        where dhs.player_id = '.Auth::guard('player')->user()->id.'
                                    ) a
                                    where created_at between date_sub(now(),INTERVAL 1 WEEK) and now()
                                    order by created_at desc'
                                );

        return view('player.balance_enquiry')
                            ->with('data', $balance_enq)
                            ->with('title', 'Market List');

    }

    public function game_ledger(){
        $data_game_ledger = DB::table('game_ledger')->where('player_id', Auth::guard('player')->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('player.game_ledger')->with('data', $data_game_ledger)
                                            ->with('title', 'Game Ledger');
    }

    public function profile(){
        return view('player.profile')->with('title', 'Profile Edit');
    }

    public function profile_update(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'account_detail' => 'required',
        ]);
        // print_r($request->all());
        // exit;
        $data = array(
                'name'=>$request->name, 
                'username'=>$request->username,
                'email'=>$request->email,
                'mobile'=> $request->mobile,
                'account_detail'=> $request->account_detail,
                'bank_name'=> $request->bank_name,
                'bank_ifsc'=>$request->bank_ifsc,
                'bank_holder_name'=>$request->bank_holder_name,
                'account_number'=>$request->account_number,
           
        );
        DB::table('players')
                ->where('id', Auth::guard('player')->user()->id)
                ->update($data);
        Session::flash('flash_message', 'Profile Updated Succesfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('player.profile');
        
    }
}
