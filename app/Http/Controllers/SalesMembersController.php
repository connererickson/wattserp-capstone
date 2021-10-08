<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateSalesMemberRequest;
use App\Http\Requests\UpdateSalesMemberRequest;
use Illuminate\Support\Facades\Crypt;
use CountryState;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\SalesMember;
use App\Address;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use response;
use DB;
use Event;
use App\Events\crmEvent;

class SalesMembersController extends Controller
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
		
		$auth_result = $request->user()->hasPermission('view_sales_team');
		if($auth_result){
			$users = User::all();
	    	$sales_members = SalesMember::where('org_id', '=', $org_id)->paginate(20);
	    	$view = View::make('pages/sales_team/index', array('title' => 'Sales Team', 'tab' => 'sales_members'))->with(compact('all_orgs', 'sales_members', 'users', 'org_dir', 'auth_result'));
			return $view;
		}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function member(Request $request, $id)
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
		
		$auth_result = $request->user()->hasPermission('view_sales_team');
	
		if($auth_result){
			$team_member = SalesMember::findOrFail($id);
			$user = User::findOrFail($team_member->user_id);
        	$view = View::make('pages/sales_team/member', array('title' => 'Team Member Information', 'tab' => 'sales_member'))->with(compact('all_orgs', 'team_member', 'ssn', 'user', 'org_dir'));
			return $view;
		}

		else{
    		return redirect()->route('sales_team.index')->with(compact('auth_result'));
    	}
    }
	public function create(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_sales_member');
		if($auth_result){
    		//Get Unassigned Sales Users for the Organization
			$unassigned_users = DB::table('users')->select('users.id', 'users.name')
			->join('users_roles', 'users.id', '=', 'users_roles.user_id')
			->join('roles', 'roles.id', '=', 'users_roles.role_id')
			->whereNotIn('users.id', function($query){
				$query->select('user_id')->from('sales_members');
			})
			->where('roles.name', '=', 'Sales')
			->where('users.org_id', '=', $org_id)		
        	->get()->toArray();
			$states = CountryState::getStates('US');
        	$view = View::make('pages/sales_team/create', array('title' => 'Create Sales Team Member', 'tab' => 'sales_members'))->with(compact('org_id', 'unassigned_users', 'org_dir', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('sales_team.index')->with(compact('auth_result'));
    	}
	}
	public function store(CreateSalesMemberRequest $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$team_member_input = $request->only('user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'alt_email', 'start_date');
		$address_input = $request->only('address', 'city', 'state', 'zip');
		$team_member_input['start_date'] = date('Y-m-d', strtotime($team_member_input['start_date']));
		$team_member_input['org_id'] = $org_id;
		$team_member = SalesMember::create($team_member_input);
		$address = Address::create($address_input);
		$address_id = Address::find($address->id);
		$team_member->address()->attach($address_id);
		$team_member_name = $team_member_input['first_name'] . " " . $team_member_input['middle_name'] . " " . $team_member_input['last_name'];
		Event::dispatch(new crmEvent($request->user(), " created new sales team member " . $team_member_name . " with id " . $team_member->id));
		Session::flash('created_sales_member', 'Sales Team Member has been created');
		return redirect()->route('sales_team.index');
	}
	public function edit(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('edit_sales_member');
		if($auth_result){
			$team_member = SalesMember::findOrFail($id);
			$states = CountryState::getStates('US');
        	$view = View::make('pages/sales_team/edit', array('title' => 'Edit Sales Team Member', 'tab' => 'sales_team'))->with(compact('team_member', 'org_dir', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('sales_team.index')->with(compact('auth_result'));
    	}
	}
	public function update(UpdateSalesMemberRequest $request, $id)
	{	
		$team_member_input = $request->only('user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'alt_email', 'start_date');
		$address_input = $request->only('address', 'city', 'state', 'zip');
		$team_member_input['start_date'] = date('Y-m-d', strtotime($team_member_input['start_date']));
		$team_member = SalesMember::findOrFail($id);
		$team_member->update($team_member_input);
		$team_member->address()->update($address_input);
		$team_member_name = $team_member['first_name'] . " " . $team_member['middle_name'] . " " . $team_member['last_name'];
		Event::dispatch(new crmEvent($request->user(), " updated information for sales team member " . $team_member_name . " with id " . $team_member->id));
		Session::flash('updated_team_member', 'Sales Member has been updated');
		return redirect()->route('sales_team.member', $team_member->id);
	}
}