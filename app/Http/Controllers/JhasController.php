<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Jha;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use DB;

class JhasController extends Controller
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
    	if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();
		
    	$auth_result = $request->user()->hasPermission('view_jhas_index');
    	if($auth_result){
    		$view = View::make('pages/safety/jhas/index', array('title' => 'Overview', 'tab' => 'overview'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
}