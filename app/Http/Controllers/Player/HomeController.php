<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    protected $redirectTo = '/player/login';
    protected $hasher;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct(HasherContract $hasher)
    {
        $this->middleware('player.auth:player');
        $this->hasher = $hasher;
    }

    /**
     * Show the Player dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // return view('player.home');
        $data = DB::table('markets')->get();
        return view('player.dashboard')
                            ->with('live_result', $data)
                            ->with('title', 'Dashboard');
    }

    public function change_password(){
        return view('player.change_pass')
                            ->with('title', 'Update Password');
    }

    public function change_password_process(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
        ]);
        if (Hash::check($request->current_password, Auth::guard('player')->user()->password)) {
            // echo "match";
        }else{
            // echo "Not matched";
            Session::flash('flash_message', 'Current password did not match.');
            Session::flash('flash_type', 'alert-danger');
            return redirect()->route('player.change_pass');
        }
        $data = array(
            'password'=>bcrypt($request->new_password) 
        );
        DB::table('players')
                ->where('id', Auth::guard('player')->user()->id)
                ->update($data);
        Session::flash('flash_message', 'Password Changed Successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('player.dashboard');
    }

}