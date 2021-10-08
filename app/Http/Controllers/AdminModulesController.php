<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use View;
use App\Organization;
use App\User;
use App\Role;
use App\DashboardModule;
use Event;
use App\Events\crmEvent;

class AdminModulesController extends Controller
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
		
    	$auth_result = $request->user()->authorizeRoles('Administrator');
    	if ( $auth_result ){
    		$modules = DashboardModule::where('org_id', '=', $org_id)->orWhere('org_id', '=', 1)->get();
			$roles = Role::all();
        	$view = View::make('pages/admin/modules/index', array('title' => 'Modules', 'tab' => 'modules', 'organization' => $organization ))->with(compact('org_id', 'modules', 'roles', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function update(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$role = Role::findOrFail($request['role_id']);
		$module_name = DashboardModule::findOrFail($request['module_id'])->name;
		
		if ($request['checked']){
			$role->dashboardmodules()->attach($request['module_id'], array('org_id' => $org_id));
			Event::dispatch(new crmEvent($request->user(), " added modules for " . $role->name . " to manage " . $module_name));
			$result = 1;
		}
		else{
			Event::fire(new crmEvent($request->user(), " removed modules for " . $role->name . " to manage " . $module_name));
			$result = $role->dashboardmodules()->detach($request['module_id']);
		}
		
		echo json_encode($result);
	}
}
