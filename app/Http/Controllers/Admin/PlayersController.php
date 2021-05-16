<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Player;
use DB;
use Session;
use Auth;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Player::all()->where('is_deleted', 0)->sortByDesc("created_at");
        return view('vendor.multiauth.player_crud')
                            ->with('cruds', $cruds)
                            ->with('title', "Player Crud");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('vendor.multiauth.player_crud_edit')->with('id', $id)
                                                        ->with('title', 'Edit Wallet');
    }

    public function forgot_pass($id)
    {
        return view('vendor.multiauth.forgot_pass')->with('id', $id)
                                                        ->with('title', 'Reset Password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta"); 
        $id = $request->id;
        $type = $request->type;
        $amount = $request->amount;
        if($type == "add"){
            $curr_wallet = DB::table('players')
                ->where('id', $id)->first()->wallet;
            DB::table('players')
                ->where('id', $id)
                ->update(['wallet' => $curr_wallet + $amount]);
            DB::table('game_ledger')->insert([
                'player_id' => $id,
                'amount' => $amount,
                'status' => "credit to wallet",
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }else{
            $curr_wallet = DB::table('players')
                ->where('id', $id)->first()->wallet;
            DB::table('players')
                ->where('id', $id)
                ->update(['wallet' => $curr_wallet - $amount]);
            DB::table('game_ledger')->insert([
                'player_id' => $id,
                'amount' => $amount,
                'status' => "transfer to bank",
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        Session::flash('flash_message', 'Player wallet updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.player.index');

    }

    public function reset(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        DB::table('players')
                ->where('id', $id)
                ->update(['password' => bcrypt($password)]);
        Session::flash('flash_message', 'Password updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.player.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return json_encode(array('statusCode'=>200));
        // $crud=Player::find($id);  
        // $crud->delete(); 
    }

    public function wd_txn($id)
    {
        $data_game_ledger = DB::table('game_ledger')->where('player_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('vendor.multiauth.admin.wd_txn')->with('data', $data_game_ledger)
                                            ->with('title', 'Withdrawl Deposite TXN');
    }

    public function txns($id)
    {
        date_default_timezone_set("Asia/Calcutta");

        $betting_data = DB::table('player_betting_data')
            ->join('markets', 'player_betting_data.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data.player_id', '=', 'players.id')
            ->select('players.mobile','players.email','players.name','player_betting_data.id','player_betting_data.number','player_betting_data.amount','player_betting_data.bet_date','player_betting_data.created_at','player_betting_data.open_close',
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data.player_id',  $id)
            ->orderBy('player_betting_data.created_at', 'DESC')
            ->get();
        
        $betting_data_half = DB::table('player_betting_data_half_sangam')
            ->join('markets', 'player_betting_data_half_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_half_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_half_sangam.player_id', '=', 'players.id')
            ->select('players.email','players.name','players.mobile',
            'player_betting_data_half_sangam.id','player_betting_data_half_sangam.ank_patti','player_betting_data_half_sangam.ank','player_betting_data_half_sangam.patti','player_betting_data_half_sangam.amount','player_betting_data_half_sangam.bet_date','player_betting_data_half_sangam.created_at', 
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data_half_sangam.player_id',  $id)
            ->orderBy('player_betting_data_half_sangam.created_at', 'DESC')
            ->get();
        
        $betting_data_full = DB::table('player_betting_data_full_sangam')
            ->join('markets', 'player_betting_data_full_sangam.market_id', '=', 'markets.id')
            ->join('games', 'player_betting_data_full_sangam.game_id', '=', 'games.id')
            ->join('players', 'player_betting_data_full_sangam.player_id', '=', 'players.id')
            ->select('players.email','players.name','players.mobile',
            'player_betting_data_full_sangam.id','player_betting_data_full_sangam.open_patti','player_betting_data_full_sangam.close_patti','player_betting_data_full_sangam.amount','player_betting_data_full_sangam.bet_date','player_betting_data_full_sangam.created_at', 
            'games.game_name', 'markets.name as market_name')
            ->where('player_betting_data_full_sangam.player_id',  $id)
            ->orderBy('player_betting_data_full_sangam.created_at', 'DESC')
            ->get();
            
        return view('vendor.multiauth.admin.txns')->with('betting_data', $betting_data)
                                                ->with('betting_data_half', $betting_data_half)
                                                ->with('betting_data_full', $betting_data_full)
                                                ->with('title', 'All Transactions Playing Games');
    }
}
