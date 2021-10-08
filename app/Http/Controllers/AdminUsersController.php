<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Organization;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use response;
use Event;
use App\Events\crmEvent;

class AdminUsersController extends Controller
{
	public function index(Request $request){
		
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
    		$users = $organization->users()->paginate(25);
        	$view = View::make('pages/admin/users/index', array('title' => 'Users List', 'tab' => 'users', 'organization' => $organization))->with(compact('all_orgs', 'users', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('dashboard')->with(compact('auth_result'));
		}
	}
	public function create(Request $request){
		
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->authorizeRoles('Administrator');
    	if ( $auth_result ){
    		$roles = Role::select('*')->get();
        	$view = View::make('pages/admin/users/create', array('title' => 'Create User', 'tab' => 'users'))->with(compact('roles', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('dashboard')->with(compact('auth_result'));
		}
	}
	public function store(CreateUserRequest $request){
			
		$input = $request->all();
		
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$input['org_id'] = $request->session()->get('curr_org_id');
    	}
		else{
			$input['org_id'] = Auth::user()->org_id;
		}
		$input['password'] = bcrypt($request->password);
		$user = User::create($input);
		Event::dispatch(new crmEvent($request->user(), " created new user " . $input['name'] . " with username " . $input['username'] . " and user id " . $user->id));
		$user = User::find($user->id);
		$user->roles()->attach($request['role']);
		Session::flash('created_user', 'User has been created');
		return redirect()->route('admin.users.index');
		
	}
	public function show( $id ){
		
	}
	public function edit(Request $request, $id){
		
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->authorizeRoles('Administrator');
    	if ( $auth_result ){
    		$user = User::findOrFail($id);
			$roles = Role::select('*')->get();
        	$view = View::make('pages/admin/users/edit', array('title' => 'Edit User', 'tab' => 'users'))->with(compact('user', 'roles', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('dashboard')->with(compact('auth_result'));
		}
	}
	public function update(UpdateUserRequest $request, $id){
		
		if (trim($request->password) == '') {
			$input = $request->except('password');
		}
		else{
			$input = $request->all();
			$input['password'] = bcrypt($request->password);
		}
		$user = User::findOrFail($id);
		$user->update($input);
		$user->roles()->sync($request['role']);
		Event::dispatch(new crmEvent($request->user(), " updated user " . $input['username'] . " with user id " . $user->id));
		Session::flash('updated_user', 'User has been updated');
		return redirect()->route('admin.users.index');
	}
}
?>