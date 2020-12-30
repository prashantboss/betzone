<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckWallet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // print_r($request->all());
        // exit;
        if($request->game == "Half Sangam" || $request->game == "Full Sangam" ){
            $amount = $request->amount;
        }else{
            $amount = array_sum($request->amount);
        }
        
        if(Auth::guard('player')->user()->wallet <= 0){
            Session::flash('flash_message', 'Wallet balance is less then or equal to 0.');
            Session::flash('flash_type', 'alert-danger');
            return redirect()->route('player.dashboard');
        }elseif($amount > Auth::guard('player')->user()->wallet){
            Session::flash('flash_message', 'Your amount is greater than wallet balance.');
            Session::flash('flash_type', 'alert-danger');
            return redirect()->route('player.dashboard');
        }
        
        return $next($request);
    }
}
