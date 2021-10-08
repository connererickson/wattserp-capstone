<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Incident;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use DB;

class IncidentsController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_incidents_reports');
    	if($auth_result){
    		$view = View::make('pages/safety/incidents/index', array('title' => 'Overview', 'tab' => 'overview'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function incidents(Request $request)
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
        
        $auth_result = $request->user()->hasPermission('view_incidents_reports');
        if($auth_result){
            $view = View::make('pages/safety/incidents/incidents', array('title' => 'Incidents', 'tab' => 'incidents'))->with(compact('all_orgs', 'org_dir'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function log_incident(Request $request)
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
        
        $auth_result = $request->user()->hasPermission('create_edit_incident_reports');
        if($auth_result){
            $view = View::make('pages/safety/incidents/log_incident', array('title' => 'Log Incident', 'tab' => 'log_incident'))->with(compact('all_orgs', 'org_dir'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function osha_reports(Request $request)
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
        
        $auth_result = $request->user()->hasPermission('create_edit_incident_reports');
        if($auth_result){
            $view = View::make('pages/safety/incidents/osha_reports', array('title' => 'OSHA Reports', 'tab' => 'osha_reports'))->with(compact('all_orgs', 'org_dir'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
}