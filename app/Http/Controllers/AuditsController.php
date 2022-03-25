<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateAuditRequest;
use App\Http\Requests\UpdateAuditRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Audit;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use DB;

class AuditsController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_audits_results');
    	if($auth_result){
    		$view = View::make('pages/safety/audits/index', array('title' => 'Overview', 'tab' => 'overview'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function audits_index(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('view_audits_results');
    	if($auth_result){
    		$audits = Audit::paginate(20);
        	$view = View::make('pages/safety/audits/audits_index', array('title' => 'Manage Audits', 'tab' => 'manage_audits'))->with(compact('all_orgs', 'audits', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function create_audit(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/audits/create_audit', array('title' => 'Create Audit'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function edit_audit(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/audits/edit_audit', array('title' => 'Edit Audit'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
}
