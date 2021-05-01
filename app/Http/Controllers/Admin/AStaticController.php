<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class AStaticController extends Controller
{
    public function admin_game_rate_static() {
        $static_content = DB::table('static')->where('title', 'game_rate')->get();
        return view('vendor.multiauth.astatic.admin_game_rate')
                            ->with('content', $static_content)
                            ->with('title', 'Game Rate');
    }
    public function admin_game_rate_static_update(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);
        DB::table('static')
                ->where('id', $request->id)
                ->update(['content' => $request->content]);

        Session::flash('flash_message', 'Game rate updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.game_rate');
    }


    public function admin_game_ledger() {
        
    }

    public function admin_balance_enquiry() {
       
    }

    public function admin_played_game() {
        
    }


    public function admin_notice_static() {
        $static_content = DB::table('static')->where('title', 'notice')->get();
        return view('vendor.multiauth.astatic.admin_game_rate')
                            ->with('content', $static_content)
                            ->with('title', 'Notice');
    }
    public function admin_notice_static_update(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);
        DB::table('static')
                ->where('id', $request->id)
                ->update(['content' => $request->content]);
        Session::flash('flash_message', 'Notice updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.notice');
    }



    public function admin_game_timing_static() {
        $static_content = DB::table('static')->where('title', 'game_timing')->get();
        return view('vendor.multiauth.astatic.admin_game_rate')
                            ->with('content', $static_content)
                            ->with('title', 'Game Timing');
    }
    public function admin_game_timing_static_update(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);
        DB::table('static')
                ->where('id', $request->id)
                ->update(['content' => $request->content]);
        Session::flash('flash_message', 'Game timing updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.game_timing');
    }



    public function how_to_play_static() {
        $static_content = DB::table('static')->where('title', 'how_to_play')->get();
        return view('vendor.multiauth.astatic.admin_how_to_play')
                            ->with('content', $static_content)
                            ->with('title', 'How To Play');
    }
    public function admin_how_to_play_static_update(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);
        DB::table('static')
                ->where('id', $request->id)
                ->update(['content' => $request->content]);
        Session::flash('flash_message', 'How to play updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.how_to_play');
    }


    public function home_notice() {
        $static_content = DB::table('static')->where('title', 'home_notice')->get();
        return view('vendor.multiauth.astatic.home_notice')
                            ->with('content', $static_content)
                            ->with('title', 'Home Notice');
    }
    public function home_notice_update(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);
        DB::table('static')
                ->where('id', $request->id)
                ->update(['content' => $request->content]);
        Session::flash('flash_message', 'Home notice updated Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.home_notice');
    }
}
