<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
    public function index(){
        $data = DB::table('markets')->get();
        return view('player.dashboard')
                            ->with('live_result', $data)
                            ->with('title', 'Dashboard');
        
    }
}
