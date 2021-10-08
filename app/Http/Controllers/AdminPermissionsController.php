<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use View;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use Event;
use App\Events\crmEvent;

class AdminPermissionsController extends Controller
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
		
    	$auth_result = $request->user()->authorizeRoles('God Mode');
    	if ( $auth_result ){
    		$permissions = Permission::orderBy('display_order')->get();
			$roles = Role::all();
        	$view = View::make('pages/admin/permissions/index', array('title' => 'Permissions', 'tab' => 'permissions', 'organization' => $organization ))->with(compact('permissions', 'roles', 'org_dir', 'org_id'));
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
		$permission_name = Permission::findOrFail($request['permission_id'])->display_name;
		
		if ($request['checked']){
			$role->permissions()->attach($request['permission_id'], array('org_id' => $org_id));
			Event::dispatch(new crmEvent($request->user(), " added permissions for " . $role->name . " to manage " . $permission_name));
			$result = 1;
		}
		else{
			Event::dispatch(new crmEvent($request->user(), " removed permissions for " . $role->name . " to manage " . $permission_name));
			$result = $role->permissions()->detach($request['permission_id']);
		}
		
		echo json_encode($result);
	}
}
