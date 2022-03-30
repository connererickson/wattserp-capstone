<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Form;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use DB;

class FormsController extends Controller
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
    		$view = View::make('pages/safety/forms/index', array('title' => 'Overview', 'tab' => 'overview'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function forms_index(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('view_audits_results');
    	if($auth_result){
    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function create_form(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/forms/create_form', array('title' => 'Create Form'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function edit_form(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/forms/edit_form', array('title' => 'Edit Form'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function scheduled_forms_index(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/forms/scheduled_forms_index', array('title' => 'Schedule Forms'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function form_results_index(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make('pages/safety/forms/forms_results_index', array('title' => 'Forms History'))->with(compact('all_orgs','org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
}
