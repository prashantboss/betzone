<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/player/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('player.auth:player');
    }

    /**
     * Show the Player dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('player.home');
    }

}