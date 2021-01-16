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
                'status' => "credit to wallet"
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
                'status' => "transfer to bank"
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
}
