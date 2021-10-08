<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'pages/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	public function username()
	{
		return 'username';
	}
	public function authenticated(){
		$user = auth()->user();
    	$user->is_active = 1;
    	$user->save();
	}
	public function logout(Request $request) {
		$user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
    	$user->is_active = 0;
    	$user->save();
  		Auth::logout();
  		return redirect('/login');
	}
}
