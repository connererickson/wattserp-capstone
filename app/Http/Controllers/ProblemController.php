<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use View;
use App\Organization;
use App\User;

class ProblemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
        $view = View::make('pages/problem', array('title' => 'Dashboard'))->with(compact('org_dir'));
		return $view;
    }
}
