<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StaticController extends Controller
{
    public function game_rate_static() {
        $static_content = DB::table('static')->where('title', 'game_rate')->get();
        return view('player.static.static_view')
                            ->with('content', $static_content)
                            ->with('title', 'Game Rate');
    }

    public function game_ledger() {
        
    }

    public function balance_enquiry() {
       
    }

    public function played_game() {
        
    }

    public function notice_static() {
        $static_content = DB::table('static')->where('title', 'notice')->get();
        return view('player.static.static_view')
                            ->with('content', $static_content)
                            ->with('title', 'Notice');
    }

    public function game_timing_static() {
        $static_content = DB::table('static')->where('title', 'game_timing')->get();
        return view('player.static.static_view')
                            ->with('content', $static_content)
                            ->with('title', 'Game Timing');
    }

    public function how_to_play_static() {
        $static_content = DB::table('static')->where('title', 'how_to_play')->get();
        return view('player.static.static_view')
                            ->with('content', $static_content)
                            ->with('title', 'How To Play');
    }
}
