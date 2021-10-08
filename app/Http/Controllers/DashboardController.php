<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;
use App\Organization;
use App\User;
use App\Employee;
use App\Role;
use App\DashboardModule;
use DB;

class DashboardController extends Controller
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
    		if (Input::get('org_id')){
    			$request->session()->put('curr_org_id', Input::get('org_id'));
			}
			else{
				if (!session()->has('curr_org_id')){
					$request->session()->put('curr_org_id', 1);
				}
			}
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
    	
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();
		
		//Get the user id for use in modules
		$user_id = Auth::user()->id;
		
		//Get both the available and current User's Dashboard Modules
		//Get the users roles
		$roles_ids = $request->user()->roles()->pluck('roles.id')->toArray();
		$available_modules = DashboardModule::whereHas('roles', function($q) use($roles_ids) {
    		$q->whereIn('roles.id', $roles_ids);
		})->get()->toArray();
		
		$installed_modules = Auth::user()->dashboardmodules->toArray();
		
		$counter = 0;
		foreach($available_modules as $available_module){
			foreach ($installed_modules as $installed_module){
				if ( $available_module['id'] == $installed_module['id']){
					unset($available_modules[$counter]);
				}
			}
			$counter++;
		}
		
		foreach($installed_modules as $installed_module){
			switch($installed_module['id']){
				case 1 : 
					break;
				case 2 :
					break;
				case 3 :
					$my_activities = DB::table('activities')->select('*')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
					$modules_data[3] = $my_activities;
					break;
				case 4 :
					break;
				case 5 :
					$erp_updates = DB::table('erp_updates')->select('*')->orderBy('updated_at', 'desc')->get()->toArray();
					$modules_data[5]['erp_updates'] = $erp_updates;
					break;
				case 6 :
					$my_training = DB::table('training_courses_employees')->select('training_courses.*')
								->join('training_courses', 'training_courses.id', '=', 'training_courses_employees.training_course_id')
								->join('employees', 'employees.id', '=', 'training_courses_employees.employee_id')
								->where([['employees.user_id', '=', $user_id],['training_courses_employees.completed', '=', 0]])->get()->toArray();
					$modules_data[6]['training_courses'] = $my_training;
					break;
				case 7 :
					$modules_data[7] = array(1);
					break;
				default :
					break;
			}
		}
		
        $view = View::make('pages/dashboard', array('title' => 'Dashboard'))->with(compact('org_id', 'auth_result', 'org_dir', 'all_orgs', 'user_id', 'available_modules', 'installed_modules', 'modules_data'));
		return $view;
    }
}
