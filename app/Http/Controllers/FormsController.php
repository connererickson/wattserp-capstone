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
<<<<<<< HEAD
	public function scheduled_forms_index(Request $request)
=======

	public function submit_eod(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			//Get Our Request Data
			$date = $request->date;
			$cleanJobsite = $request->cleanJobsite;
			$looseMaterials = $request->looseMaterials;
			$completedTasks = $request->completedTasks;
			$partsToBeOrdered = $request->partsToBeOrdered;
			$notes = $request->notes;

			$submit_eod_result = DB::table('forms_endofday')->insertGetId(array('date' => $date, 'jobsiteClean' => $cleanJobsite, 'looseMaterialsScrewed' => $looseMaterials, 'tasksCompleted' => $completedTasks, 'partsToOrder' => $partsToBeOrdered, 'notes' => $notes), 'idforms_endofday');


    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function submit_writeup(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			//Get Our Request Data
			$date = $request->date;
			$employeeName = $request->employeeName;
			$employeeID = $request->employeeID;
			$jobTitle = $request->jobTitle;
			$manager = $request->manager;
			$department = $request->department;
			$service = $request->service;
			$warningType = $request->warningType;
			$offenseType = $request->offenseType;
			$infractionDescription = $request->infractionDescription;
			$improvementPlan = $request->improvementPlan;
			$furtherConsequences = $request->furtherConsequences;

			$submit_hazardanalysis_result = DB::table('forms_writeup')->insertGetId(
				array('employeeName'=>$employeeName,
				'employeeID'=>$employeeID ,
				'manager'=> $manager,
				'jobTitle'=>$jobTitle ,
				'department'=>$department ,
				'service'=>$service,
				'typeOfWarning'=>$warningType ,
				'typeOfOffense'=>$offenseType ,
				'infractionDescription'=>$infractionDescription ,
				'improvementPlan'=>$improvementPlan ,
				'furtherConsequences'=>$furtherConsequences ,
				'date'=>$date), 
				'idforms_writeup');


    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function submit_serviceform(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			//Get Our Request Data
			$date = $request->date;
			$customerName = $request->customerName;
			$techName = $request->techName;
			$address = $request->address;
			$city = $request->city;
			$state = $request->state;
			$zip = $request->zip;
			$clientNumer = $request->clientNumber;
			$issue = $request->issue;
			$diagnosis = $request->diagnosis;
			$solution = $request->solution;
			$equipmentToOrder = $request->equipmentToOrder;

			$submit_hazardanalysis_result = DB::table('forms_servicecalls')->insertGetId(
				array('date' => $date,  
				'customerName' => $customerName, 
				'techName' => $techName, 
				'address' => $address, 
				'city' => $city, 
				'state' => $state, 
				'zip' => $zip, 
				'clientsNumber' => $clientNumer, 
				'issue'=> $issue, 
				'diagnosis' =>$diagnosis , 
				'solution' =>$solution , 
				'equipmentToOrder'=>$equipmentToOrder ), 
				'idforms_endofday');


    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function submit_hazardanalysis(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			//Get Our Request Data
			$date = $request->date;
			$task = $request->task;
			$project = $request->project;
			$projectManager = $request->projectManager;
			$projectAddress = $request->projectAddress;
			$lead = $request->lead;
			$crewAssigned = $request->crewAssigned;
			$taskStepsBreakdown = $request->taskStepsBreakdown;
			$bodyStuck = $request->bodyStuck;
			$sharpObjects = $request->sharpObjects;
			$strain = $request->strain;
			$harmedTools = $request->harmedTools;
			$slipping = $request->slipping;
			$heavyEquipment = $request->heavyEquipment;
			$flammableExplosive = $request->flammableExplosive;
			$fallingObjects = $request->fallingObjects;
			$weatherSafety = $request->weatherSafety;
			$acidContact = $request->acidContact;
			$hazardsWithSteps = $request->hazardsWithSteps;
			$safeWorkProcedures = $request->safeWorkProcedures;
			$name = $request->name;

			$submit_hazardanalysis_result = DB::table('forms_hazardanalysis')->insertGetId(
				array('task' => $task,
				'project'=>$project ,
				'projectManager'=>$projectManager,
				'date'=> $date,
				'projectAddress' =>$projectAddress,
				'lead' => $lead,
				'crewAssigned' =>$crewAssigned,
				'taskStepsBreakdown'=> $taskStepsBreakdown,
				'bodyStuck?'=> $bodyStuck,
				'sharpObjects?' =>$sharpObjects,
				'strain?' =>$strain,
				'harmedTools?'=> $harmedTools,
				'slipping?'=>$slipping,
				'heavyEquipment?'=>$heavyEquipment ,
				'flammableExplosive?'=> $flammableExplosive,
				'fallingObjects?'=>$fallingObjects ,
				'weatherSafety?'=>$weatherSafety , 
				'acidContact?'=> $acidContact,
				'hazardsWithSteps'=> $hazardsWithSteps, 
				'safeWorkProcedures' =>$safeWorkProcedures,
				'name'=> $name), 
				'idforms_hazardanalysis');


    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function submit_inspection(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			//Get Our Request Data
			$date = $request->date;
			$truck = $request->truck;
			$trailer = $request->trailer;
			$equipment = $request->equipment;
			$startingMileage = $request->startingMileage;
			$endingMileage= $request->endingMileage;
			$engine = $request->engine;
			$clutch = $request->clutch;
			$transmission= $request->transmission;
			$steeringMechanism = $request->steeringMechanism;
			$horn = $request->horn;
			$rearMirrors = $request->rearMirrors;
			$lightsAndReflectors = $request->lightsAndReflectors;
			$windshieldWipers = $request->windshieldWipers;
			$parkingBreak = $request->parkingBreak;
			$serviceBreaks = $request->serviceBreaks;
			$tires= $request->tires;
			$wheelsRims = $request->wheelsRims;
			$emergencyEquipment = $request->emergencyEquipment;
			$notes = $request->notes;
			$safeToDrive = $request->safeToDrive;
			$driverResponsibility = $request->driverResponsibility;
			$name = $request->name;

			$submit_hazardanalysis_result = DB::table('forms_vehicleinspection')->insertGetId(
				array('date' =>$date , 
				'truck' =>$truck,
				'trailer'=>$trailer, 
				'equipment'=>$equipment , 
				'startingMileage'=>$startingMileage ,
				'endingMileage'=> $endingMileage, 
				'engine' =>$engine,
				'clutch' =>$clutch, 
				'transmission'=> $transmission,
				'steeringMechanism'=> $steeringMechanism,
				'horn' =>$horn,
				'rearMirrors' =>$rearMirrors,
				'lightsAndReflectors' =>$lightsAndReflectors,
				'windshieldWipers'=> $windshieldWipers,
				'parkingBreak' =>$parkingBreak, 
				'serviceBreaks'=> $serviceBreaks,
				'tires'=> $tires,
				'wheelsRims'=> $wheelsRims,
				'emergencyEquipment'=>$emergencyEquipment,
				'notes'=> $notes,
				'safeToDrive?'=> $safeToDrive,
				'driverResponsibility'=>$driverResponsibility ,
				'name'=> $name), 
				'idforms_vehicleinspection');


    		$forms = Form::paginate(20);
        	$view = View::make('pages/safety/forms/forms_index', array('title' => 'Manage Forms', 'tab' => 'manage_forms'))->with(compact('all_orgs', 'forms', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function create_form(Request $request)
>>>>>>> d9cbb4661b1c5b1d0a153b11943966efb672b484
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		$org_users = $organization->users;
		$users = User::all();
		
		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
			$forms = Form::paginate(20);
			$view = View::make('pages/safety/forms/scheduled_forms_index', array('title' => 'Form Scheduling', 'tab' => 'schedule_forms'))->with(compact('all_orgs', 'forms', 'org_dir', 'org_users', 'users'));
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
<<<<<<< HEAD
	public function edit_form(Request $request)
=======


	public function scheduled_forms_index(Request $request)
>>>>>>> d9cbb4661b1c5b1d0a153b11943966efb672b484
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		$form = 'pages/safety/forms/form_blades/' . $request->name;

		//Get all orgs for the switching dropdown
		$all_orgs = Organization::all();

		$form_id = $request->id;
		$auth_result = $request->user()->hasPermission('create_edit_assign_audits');
    	if($auth_result){
    		$view = View::make($form, array('title' => 'Edit Form'))->with(compact('all_orgs','org_dir'));
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
	
	public function store_form(Request $request)
	{

	}

	public function form_notification(Request $request) {
		$form_id = $request['form_id'];
		$form_name = $request['form_name'];
		$user_id = $request['user_id'];
		
		$insert_form_noticiation_result = DB::table('form_notifications')->insert(array('user_id' => $user_id, 'form_id' => $form_id, 'form_name' => $form_name));

		return 1;
	}
}
