<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateDirectoryRequest;
use App\Http\Requests\UpdateDirectoryRequest;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\CreateAddressRequest;
use CountryState;
use App\Organization;
use App\User;
use App\Role;
use App\Company;
use App\Contact;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use View;
use Validator;
use DB;
use Event;
use App\Events\crmEvent;

class DirectoryController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'utilities';
    		$companies = $organization->companies()->where('companies.type', '=', 'Utility')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'utilities'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function utilities(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'utilities';
    		$companies = $organization->companies()->where('companies.type', '=', 'Utility')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'utilities'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function municipalities(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'municipalities';
    		$companies = $organization->companies()->where('companies.type', '=', 'Municipality')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'municipalities'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function vendors(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'vendors';
    		$companies = $organization->companies()->where('companies.type', '=', 'Vendor')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'vendors'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function suppliers(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'suppliers';
    		$companies = $organization->companies()->where('companies.type', '=', 'Supplier/Service')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'suppliers'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function partners(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'partners';
    		$companies = $organization->companies()->where('companies.type', '=', 'Partner')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'partners'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function ckc_companies(Request $request)
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
        
        $auth_result = $request->user()->hasPermission('view_directory');
        if($auth_result){
            $type = 'ckc_companies';
            $companies = $organization->companies()->where('companies.type', '=', 'CKC')->orderBy('company_name')->paginate(20);
            $view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'CKC Companies'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function manufacturers(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'manufacturers';
    		$companies = $organization->companies()->where('companies.type', '=', 'Manufacturer')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'manufacturers'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function others(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_directory');
    	if($auth_result){
    		$type = 'others';
    		$companies = $organization->companies()->where('companies.type', '=', 'Other')->orderBy('company_name')->paginate(20);
        	$view = View::make('pages/directory/index', array('title' => 'Directory', 'tab' => 'others'))->with(compact('all_orgs', 'companies', 'org_dir', 'type'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
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
		
		$auth_result = $request->user()->hasPermission('create_company');
    	if($auth_result){
    		$view = View::make('pages/directory/create', array('title' => 'Create Company'))->with(compact('org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function store(CreateDirectoryRequest $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		
		$input = $request->all();
		$company = Company::create($input);
		$organization->companies()->attach($company->id);
		Event::dispatch(new crmEvent($request->user(), " created a new directory entry for " . $request['type'] . " - " . $request['company_name'] . "( " . $request['company_legal_name'] . " )"));
		Session::flash('created_company', 'Company has been created');
		return redirect()->route('directory.index');
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
		
		$auth_result = $request->user()->hasPermission('edit_company');
    	if($auth_result){
    		$company = Company::findOrFail($id);
        	$view = View::make('pages/directory/edit', array('title' => 'Edit Company'))->with(compact('company', 'org_dir'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function update(UpdateDirectoryRequest $request, $id)
	{
		$company = Company::findOrFail($id);
		$input = $request->all();
		$company->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated directory information for " . $request['type'] . " - " . $request['company_name'] . "( " . $request['company_legal_name'] . " )"));
		Session::flash('updated_company', 'Company has been updated');
		return redirect()->route('directory.index');
	}
	public function manage(Request $request){
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
		
		$auth_result = $request->user()->hasPermission('view_manage_company');
    	if($auth_result){
			$company = Company::findOrFail($request->id);
			$company_id = $company->id;
			$company_name = $company->company_name;
			$contacts = $company->contacts()->get()->toArray();
			$locations = $company->addresses()->get()->toArray();
            $states = CountryState::getStates('US');
			$type = $company->type;
            $utility_rates = $company->rates()->paginate(20);
            $directory_news = DB::table('news')->select('id', 'news', 'created_at')->get();
            $stakeholder_correspondence = DB::table('stakeholder_correspondence')->select('id', 'message', 'created_at')->where('company_id', '=', $company_id)->get();
    		$view = View::make('pages/directory/manage', array('title' => 'Manage Directory Company'))->with(compact('all_orgs', 'org_dir', 'type', 'company_name', 'company_id', 'contacts', 'directory_news', 'locations', 'states', 'utility_rates', 'stakeholder_correspondence'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function store_contact(CreateContactRequest $request)
	{
		$input = $request->only('first_name', 'last_name', 'title', 'work_phone', 'cell_phone', 'email1', 'email2');
		$company = Company::findOrFail($request['company_id']);
		$contact = Contact::create($input);
		$company->contacts()->attach($contact->id);
		Event::dispatch(new crmEvent($request->user(), " created a new contact " . $request['first_name'] . " " . $request['last_name']));
		Session::flash('created_contact', 'Contact has been created');
		return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
	}
	public function update_contact(CreateContactRequest $request)
	{
		$input = $request->only('first_name', 'last_name', 'title', 'work_phone', 'cell_phone', 'email1', 'email2');
		$company = Company::findOrFail($request['company_id']);
		$contact = Contact::findOrFail($request['contact_id']);
		$contact->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated contact " . $request['first_name'] . " " . $request['last_name']));
		Session::flash('updated_contact', 'Contact has been updated');
		return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
	}
    
    public function store_news(Request $request)
    {
        $input = $request->all();
        $company = Company::findOrFail($request['company_id']);
        $news = DB::table('news')->insert(array('company_id' => $request['company_id'], 'news' => $request['news'], 'created_at' => now(), 'updated_at' => now()));
        Event::dispatch(new crmEvent($request->user(), " created news for" . $company['company_name']));
        Session::flash('created_news', 'News has been created');
        return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
    }
    
    public function store_address(CreateAddressRequest $request){
        $input = $request->all();
        $company = Company::findOrFail($request['company_id']);
        $address = Address::create($input);
        $company->addresses()->attach($address->id);
        Event::dispatch(new crmEvent($request->user(), " created a new address " . $request['address'] . " " . $request['city'] . ", " . $request['state'] . " " . $request['zip'] . " for company " . $company['company_name']));
        Session::flash('created_address', 'Address has been created');
        return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
    }
    
    public function update_address(CreateAddressRequest $request)
    {
        $input = $request->all();
        $company = Company::findOrFail($request['company_id']);
        $address = Address::findOrFail($request['address_id']);
        $address->update($input);
        Event::dispatch(new crmEvent($request->user(), " updated address for company " . $company['company_name']));
        Session::flash('updated_address', 'Address has been updated');
        return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
    }
    
    public function store_stakeholdercorrespondence(Request $request)
    {
        $input = $request->all();
        $company = Company::findOrFail($request['company_id']);
        $stakeholder_correspondence = DB::table('stakeholder_correspondence')->insert(array('company_id' => $request['company_id'], 'message' => $request['message'], 'created_at' => now(), 'updated_at' => now()));
        Event::dispatch(new crmEvent($request->user(), " created new stakeholder correspondence for" . $company['company_name']));
        Session::flash('created_correspondence', 'Correspondence has been created');
        return redirect()->route('directory.manage', array($company->type, $company->company_name, $company->id));
    }
}
