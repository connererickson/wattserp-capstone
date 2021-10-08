<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use response;
use DB;
use Event;
use App\Events\crmEvent;

class ArchiveController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_archive');
		if($auth_result){
			$archive = DB::table('projects')->select('*')
			->where('archived', '=', '1')	
        	->get()->toArray();

	    	$view = View::make('pages/archive/index', array('title' => 'Archived List'))->with(compact('all_orgs', 'archive', 'org_dir'));
			return $view;
		}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
}
