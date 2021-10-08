<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use CountryState;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\Portfolio;
use App\Contact;
use App\Project;
use App\Design;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use Illuminate\Validation\Rule;
use response;
use DB;
use Event;
use App\Events\crmEvent;

class LeadsController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$portfolios = DB::table('portfolios')->select('*')->where([['org_id', '=', $org_id], ['archived', '=', '0']])->orderBy('updated_at', 'DESC')	
        	->get()->toArray();

	    	$view = View::make('pages/leads/index', array('title' => 'Leads List'))->with(compact('all_orgs', 'portfolios', 'org_dir'));
			return $view;
		}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function portfolio(Request $request, $id)
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
		
    	$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$portfolio = Portfolio::findOrFail($id);
			$proposals = $portfolio->projects()->where('is_lead', '=', 1)->get();
			$projects = $portfolio->projects()->where('is_lead', '=', 0)->get();
			$contacts = $portfolio->contacts()->get();
			//$_categories = DB::table('designs_categories')->select('*')->get()->toArray();
        	$view = View::make('pages/leads/portfolio', array('title' => 'Portfolio Information'))->with(compact('portfolio', 'org_dir', 'all_orgs', 'contacts', 'proposals', 'projects'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function create_portfolio(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_project_leads');
		if($auth_result){
        	$view = View::make('pages/leads/create_portfolio', array('title' => 'Create Customer Portfolio'))->with(compact('org_id', 'org_dir'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function store_portfolio(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$input = $request->all();
		
		$input['org_id'] = $org_id;
		$input['archived'] = 0;

		//Create messages for all validator outputs
		$messages = array(
		    'name.required' => 'Please enter an portfolio name.',
		    'nickname.required' => 'Please enter an portfolio nickname.'
		);
		//Based on user inputs, create the validation array
		$validations = array(
            'name' => 'required',
            'nickname' => 'required'
        ); 
		
		//Execute the validations
		$validator = Validator::make($input, $validations, $messages);
		
		if ($validator->fails()) {
			
            return redirect('pages/leads/create_portfolio')
                ->withErrors($validator)
                ->withInput();
        }
		else{
			$portfolio = Portfolio::create($input);
			Event::dispatch(new crmEvent($request->user(), " created a new customer portfolio " . $portfolio->name . " with id " . $portfolio->id));
			Session::flash('created_portfolio', 'Portfolio has been created');
			return redirect()->route('leads.index');
		}
	}
	public function edit_portfolio(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('edit_project_leads');
		if($auth_result){
			$portfolio = Portfolio::findOrFail($id);
        	$view = View::make('pages/leads/edit_portfolio', array('title' => 'Edit Portfolio'))->with(compact('portfolio', 'org_dir'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function update_portfolio(Request $request, $id)
	{	
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$input = $request->all();

		//Create messages for all validator outputs
		$messages = array(
		    'name.required' => 'Please enter an portfolio name.',
		    'nickname.required' => 'Please enter an portfolio nickname.'
		);
		//Based on user inputs, create the validation array
		$validations = array(
            'name' => 'required',
            'nickname' => 'required'
        ); 
		
		//Execute the validations
		$validator = Validator::make($input, $validations, $messages);
		
		if ($validator->fails()) {
			
            return redirect('pages/leads/edit_portfolio/' . $id)
                ->withErrors($validator)
                ->withInput();
        }
		else{
			$portfolio = Portfolio::findOrFail($id);
			$portfolio->update($input);
			Event::dispatch(new crmEvent($request->user(), " updated information for customer portfolio " . $portfolio->name . " with id " . $portfolio->id));
			Session::flash('updated_portfolio', 'Portfolio has been updated');
			return redirect()->route('leads.index');
		}
	}

	public function store_portfolio_contact(CreateContactRequest $request)
	{
		$input = $request->only('first_name', 'middle_name', 'last_name', 'title', 'home_phone', 'work_phone', 'cell_phone', 'email1', 'email2');
		$portfolio = Portfolio::findOrFail($request['portfolio_id']);
		$contact = Contact::create($input);
		$portfolio->contacts()->attach($contact->id);
		Event::dispatch(new crmEvent($request->user(), " created a new contact " . $request['first_name'] . " " . $request['last_name']));
		Session::flash('created_contact', 'Contact has been created');
		return redirect()->route('leads.portfolio', $portfolio->id);
	}
	public function update_portfolio_contact(CreateContactRequest $request)
	{
		$input = $request->only('first_name', 'middle_name', 'last_name', 'title', 'home_phone', 'work_phone', 'cell_phone', 'email1', 'email2');
		$contact = Contact::findOrFail($request['contact_id']);
		$contact->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated contact " . $request['first_name'] . " " . $request['last_name']));
		Session::flash('updated_contact', 'Contact has been updated');
		return redirect()->route('leads.portfolio', $request['portfolio_id']);
	}
	
	public function create_proposal(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_project_leads');
		if($auth_result){
			$portfolio_id = $id;
        	$view = View::make('pages/leads/create_proposal', array('title' => 'Create Customer Proposal'))->with(compact('org_id', 'org_dir', 'portfolio_id'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function store_proposal(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$input = $request->all();
		
		//Generate project number
		$projects = Project::orderBy('id')->get()->toArray();
		$project = array_values(array_slice($projects, -1));
		$project_num = $project[0]['project_number'];
		$input['project_number'] = $project_num+1;
		
		//Create messages for all validator outputs
		$messages = array(
		    'internal_nickname.required' => 'Please enter a proposal name.',
		    'class.required' => 'Please select a proposal class.',
		    'class.not_in' => 'Please select a proposal class.'
		);
		//Based on user inputs, create the validation array
		$validations = array(
            'internal_nickname' => 'required',
            'class' => 'required|not_in:0'
        ); 
		
		//Execute the validations
		$validator = Validator::make($input, $validations, $messages);
		
		if ($validator->fails()) {
			
            return redirect('pages/leads/create_proposal/' . $input['portfolio_id'])
                ->withErrors($validator)
                ->withInput();
        }
		else{
			$project = Project::create($input);
			Event::dispatch(new crmEvent($request->user(), " created a new customer proposal " . $project->name . " with id " . $project->id));
			Session::flash('created_proposal', 'Customer Proposal has been created');
			return redirect()->route('leads.portfolio', $input['portfolio_id']);
		}
	}

	public function proposal(Request $request, $id)
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
		
    	$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$proposal = Project::findOrFail($id);
			$portfolio = $proposal->portfolio()->get()->toArray()[0];
            $designs = $proposal->designs()->get()->toArray();
			$address = $proposal->address()->get()->toArray();
			if (count($address)){
				$address = $address[0];
			}
			$meta_attributes = DB::table('projects_meta_attributes AS pma')->select('pma.*')->where('pma.class', '=', $proposal->class)->orderBy('pma.category')->get()->toArray();
			$proposal_attributes = DB::table('projects_meta')->select('*')->where('project_id', '=', $proposal->id)->get()->toArray();
			$utilities = DB::table('companies')->select('*')->where('companies.type', '=', 'Utility')->get();
			$states = CountryState::getStates('US');
        	$view = View::make('pages/leads/proposal', array('title' => 'Proposal'))->with(compact('org_dir', 'all_orgs', 'portfolio', 'proposal', 'designs', 'meta_attributes', 'proposal_attributes', 'utilities', 'states', 'address'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }

	public function project(Request $request, $id)
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
		
    	$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$project = Project::findOrFail($id);
			$portfolio = $project->portfolio()->get()->toArray()[0];
			$address = $project->address()->get()->toArray();
			$utilities = DB::table('companies')->select('*')->where('companies.type', '=', 'Utility')->get();
			$states = CountryState::getStates('US');
        	$view = View::make('pages/leads/project', array('title' => 'Project'))->with(compact('org_dir', 'all_orgs', 'portfolio', 'project', 'utilities', 'states', 'address'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	
	public function create_request(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_project_leads');
		if($auth_result){
			$portfolio_id = $id;
			//$request_categories = DB::table('request_categories')->select('*')->get()->toArray();
        	$view = View::make('pages/leads/create_request', array('title' => 'Create Request'))->with(compact('org_id', 'org_dir', 'portfolio_id'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function create_design(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_project_leads');
		if($auth_result){
			$proposal_id = $id;
			//$design_categories = DB::table('designs_categories')->select('*')->get()->toArray();
        	$view = View::make('pages/leads/create_design', array('title' => 'Create Customer Design'))->with(compact('org_id', 'org_dir', 'proposal_id'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function store_design(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$input = $request->all();
		
		//Create messages for all validator outputs
		$messages = array(
			'name.required' => 'Please enter a name for the design',
		    /*'category.required' => 'Please select a design category',
		    'category.not_in' => 'Please select a design category'*/
		);
		//Based on user inputs, create the validation array
		$validations = array(
            'name' => 'required',
            /*'category' => 'required|not_in:0'*/
        ); 
		
		//Execute the validations
		$validator = Validator::make($input, $validations, $messages);
		
		if ($validator->fails()) {
			
            return redirect('pages/leads/create_design/' . $input['proposal_id'])
                ->withErrors($validator)
                ->withInput();
        }
		else{
			$design = Design::create($input);
			Event::dispatch(new crmEvent($request->user(), " created a new proposal design " . $design->name . " with id " . $design->id));
			Session::flash('created_design', 'Proposal Design has been created');
			return redirect()->route('leads.proposal', $input['proposal_id']);
		}
	}
	public function design(Request $request, $id)
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
		
    	$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$design = Design::findOrFail($id);
			//$design_categories = DB::table('designs_categories')->select('*')->get()->toArray();
        	$view = View::make('pages/leads/design', array('title' => 'Design Workbench'))->with(compact('org_dir', 'all_orgs', 'design'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function store_project_address(Request $request){
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$input = $request->all();
        
		
		//Create messages for all validator outputs
		$messages = array(
		    'county.required' => 'Please enter the county',
		    'apn.required' => 'Please enter the apn',
			'address.required' => 'Please enter the address',
		    'city.required' => 'please enter the city',
		    'state.required' => 'Please select the state',
		    'state.not_in' => 'Please select the state',
		    'zip.required' => 'Please provide a zip code'
		);
		//Based on user inputs, create the validation array
		$validations = array(
		    'county' => 'required',
		    'apn' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required|not_in:0',
            'zip' => 'required'
        );
		
		//Execute the validations
		$validator = Validator::make($input, $validations, $messages);
		
		if ($validator->fails()) {
			
            return redirect('pages/leads/proposal/' . $input['project_id'])
                ->withErrors($validator)
                ->withInput();
        }
		else{
			$project = Project::findOrFail($input['project_id']);
			$address = Address::create($input);
			$project->address()->attach($address->id);
			Event::dispatch(new crmEvent($request->user(), " created an address for project " . $project->name . " with id " . $address->id));
			Session::flash('updated_address', 'Proposal address has been created');
			return redirect()->route('leads.proposal', $project->id);
		}
	}
	public function update_project_address(Request $request, $id){
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        
        $input = $request->all();
        
        //Create messages for all validator outputs
        $messages = array(
            'county.required' => 'Please enter the county',
            'apn.required' => 'Please enter the apn',
            'address.required' => 'Please enter the address',
            'city.required' => 'please enter the city',
            'state.required' => 'Please select the state',
            'state.not_in' => 'Please select the state',
            'zip.required' => 'Please provide a zip code'
        );
        //Based on user inputs, create the validation array
        $validations = array(
            'county' => 'required',
            'apn' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required|not_in:0',
            'zip' => 'required'
        );
        
        //Execute the validations
        $validator = Validator::make($input, $validations, $messages);
        
        if ($validator->fails()) {
            
            return redirect('pages/leads/proposal/' . $input['project_id'])
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $project = Project::findOrFail($input['project_id']);
            $address = Address::findOrFail($id);
            $address->update($input);
            Event::dispatch(new crmEvent($request->user(), " updated an address for project " . $project->name . " with id " . $id));
            Session::flash('updated_address', 'Proposal address has been updated');
            return redirect()->route('leads.proposal', $project->id);
        }
	}
	
	public function settings_index(Request $request){
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$view = View::make('pages/leads/settings/index', array('title' => 'Design Workbench'))->with(compact('org_dir'));
			return $view;
		}
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function project_attributes(Request $request){
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$meta_attributes = DB::table('projects_meta_attributes')->select('*')->where('org_id', '=', $org_id)->orderBy('category')->get()->toArray();
		
		$auth_result = $request->user()->hasPermission('view_leads');
		if($auth_result){
			$view = View::make('pages/leads/settings/project_attributes', array('title' => 'Design Workbench'))->with(compact('org_dir', 'org_id', 'meta_attributes'));
			return $view;
		}
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
}