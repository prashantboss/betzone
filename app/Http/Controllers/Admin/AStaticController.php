<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
        return redirect()->route('admin.player.index')
                        ->with('success','Product updated successfully');
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
        return redirect()->route('admin.player.index')
                        ->with('success','Product updated successfully');
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
        return redirect()->route('admin.player.index')
                        ->with('success','Product updated successfully');
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
        return redirect()->route('admin.player.index')
                        ->with('success','Product updated successfully');
    }
}
