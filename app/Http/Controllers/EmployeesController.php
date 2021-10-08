<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\CreateEmployeeECRequest;
use App\Http\Requests\UpdateEmployeeECRequest;
use Illuminate\Support\Facades\Crypt;
use CountryState;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\Employee;
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

class EmployeesController extends Controller
{
	
	protected $dates = ['hire_date', 'dob'];
	
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
		
		$auth_result = $request->user()->hasPermission('view_employees');
		if($auth_result){
			$users = User::all();
	    	$employees = Employee::where('org_id', '=', $org_id)->paginate(20);
	    	$view = View::make('pages/employees/index', array('title' => 'Employees List', 'tab' => 'employees'))->with(compact('all_orgs', 'employees', 'users', 'org_dir', 'auth_result'));
			return $view;
		}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function employee(Request $request, $id)
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
		
		$auth_result1 = $request->user()->hasPermission('view_employee_admin');
		$auth_result2 = $request->user()->hasPermission('view_employee_detailed');
		$auth_result3 = $request->user()->hasPermission('view_employee_basic');
		
		$auth_result = $auth_result3;
	
		if($auth_result2 || $auth_result1){
			$employee = Employee::findOrFail($id);
			$emergency_contact = DB::table('contacts AS c')->select('c.*', 'a.*')
			->join('contacts_addresses AS ca', 'c.id', '=', 'ca.contact_id')
			->join('addresses AS a', 'a.id', '=', 'ca.address_id')
			->where('c.id', '=', $employee->emergency_contact)
			->get()->toArray();
			$ssn = Crypt::decryptString($employee->ssn);
			$user = User::findOrFail($employee->user_id);
        	$view = View::make('pages/employees/employee', array('title' => 'Employees Information', 'tab' => 'employees'))->with(compact('all_orgs', 'employee', 'ssn', 'user', 'emergency_contact', 'org_dir'));
			return $view;
		}
		else if($auth_result3){
			$employee = Employee::findOrFail($id);
			$user = User::findOrFail($employee->user_id);
        	$view = View::make('pages/employees/employee', array('title' => 'Employees Information', 'tab' => 'employees'))->with(compact('all_orgs', 'employee', 'user', 'org_dir'));
			return $view;
		}
		else{
    		return redirect()->route('employees.index')->with(compact('auth_result'));
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
		
		$auth_result = $request->user()->hasPermission('create_employee');
		if($auth_result){
    		//Get Unassigned Internal Users for the Organization
			$unassigned_users = DB::table('users')->select('users.id', 'users.name')
			->join('users_roles', 'users.id', '=', 'users_roles.user_id')
			->join('roles', 'roles.id', '=', 'users_roles.role_id')
			->whereNotIn('users.id', function($query){
				$query->select('user_id')->from('employees');
			})
			->where('roles.name', '=', 'Internal')
			->where('users.org_id', '=', $org_id)		
        	->get()->toArray();
			$states = CountryState::getStates('US');
        	$view = View::make('pages/employees/create', array('title' => 'Create User', 'tab' => 'employees'))->with(compact('org_id', 'unassigned_users', 'org_dir', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('employees.index')->with(compact('auth_result'));
    	}
	}
	public function store(CreateEmployeeRequest $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$employee_input = $request->only('user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'ssn', 'hire_date', 'dob');
		$address_input = $request->only('address', 'city', 'state', 'zip');
		$employee_input['hire_date'] = date('Y-m-d', strtotime($employee_input['hire_date']));
		$employee_input['dob'] = date('Y-m-d', strtotime($employee_input['dob']));
		$employee_input['ssn'] = Crypt::encryptString($employee_input['ssn']);
		$employee_input['org_id'] = $org_id;
		$employee = Employee::create($employee_input);
		$address = Address::create($address_input);
		$address_id = Address::find($address->id);
		$employee->address()->attach($address_id);
		$employee_name = $employee_input['first_name'] . " " . $employee_input['middle_name'] . " " . $employee_input['last_name'];
		Event::dispatch(new crmEvent($request->user(), " created new employee " . $employee_name . " with id " . $employee->id));
		Session::flash('created_employee', 'Employee has been created');
		return redirect()->route('employees.index');
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
		
		$auth_result = $request->user()->hasPermission('edit_employee');
		if($auth_result){
			$employee = Employee::findOrFail($id);
			$employee['ssn'] = Crypt::decryptString($employee['ssn']);
			$states = CountryState::getStates('US');
        	$view = View::make('pages/employees/edit', array('title' => 'Edit Employee', 'tab' => 'employees'))->with(compact('employee', 'org_dir', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('employees.index')->with(compact('auth_result'));
    	}
	}
	public function update(UpdateEmployeeRequest $request, $id)
	{	
		if (trim($request->ssn) == '') {
			$employee_input = $request->except('ssn');
		}
		else{
			$employee_input = $request->all();
			$employee_input['ssn'] = Crypt::encryptString($employee_input['ssn']);
		}
		$address_input = $request->only('address', 'city', 'state', 'zip');
		$employee_input['hire_date'] = date('Y-m-d', strtotime($employee_input['hire_date']));
		$employee_input['dob'] = date('Y-m-d', strtotime($employee_input['dob']));
		$employee = Employee::findOrFail($id);
		$employee->update($employee_input);
		$employee->address()->update($address_input);
		$employee_name = $employee['first_name'] . " " . $employee['middle_name'] . " " . $employee['last_name'];
		Event::dispatch(new crmEvent($request->user(), " updated information for employee " . $employee_name . " with id " . $employee->id));
		Session::flash('updated_employee', 'Employee has been updated');
		return redirect()->route('employees.employee', $employee->id);
	}
	public function create_ec(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_employee');
		if($auth_result){
			$employee_id = $id;
			$states = CountryState::getStates('US');
        	$view = View::make('pages/employees/create_ec', array('title' => 'Create Emergency Contact', 'tab' => 'employees'))->with(compact('org_id', 'org_dir', 'employee_id', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('employees.index')->with(compact('auth_result'));
    	}
	}
	public function store_ec(CreateEmployeeECRequest $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$contact_ec_input = $request->only('first_name', 'middle_name', 'last_name', 'cell_phone', 'email1');
		$address_input = $request->only('address', 'city', 'state', 'zip');
		$contact = Contact::create($contact_ec_input);
		$address = Address::create($address_input);
		$address_id = Address::find($address->id);
		$employee = Employee::find($request->employee_id);
		$contact->addresses()->attach($address_id);
		$employee->emergency_contact = $contact->id;
		$employee->save();
		Event::dispatch(new crmEvent($request->user(), " created new employee emergency contact" . $employee->first_name . " " . $employee->middle_name . " " . $employee->last_name));
		Session::flash('created_employee_emergency_contact', 'Employee Emergency Contact has been created');
		return redirect()->route('employees.employee', ['id' => $employee->id]);
	}
	public function edit_ec(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('edit_employee');
		if($auth_result){
			$employee = Employee::findOrFail($id);
			$employee['ssn'] = Crypt::decryptString($employee['ssn']);
			$states = CountryState::getStates('US');
        	$view = View::make('pages/employees/edit', array('title' => 'Edit Employee', 'tab' => 'employees'))->with(compact('employee', 'org_dir', 'states'));
			return $view;
		}
		else{
    		return redirect()->route('employees.index')->with(compact('auth_result'));
    	}
	}
	public function update_ec(UpdateEmployeeECRequest $request, $id)
	{	
		if (trim($request->ssn) == '') {
			$input = $request->except('ssn');
		}
		else{
			$input = $request->all();
			$input['ssn'] = Crypt::encryptString($input['ssn']);
		}
		$input['hire_date'] = date('Y-m-d', strtotime($input['hire_date']));
		$input['dob'] = date('Y-m-d', strtotime($input['dob']));
		$employee = Employee::findOrFail($id);
		$employee->update($input);
		$employee_name = $employee['first_name'] . " " . $employee['middle_name'] . " " . $employee['last_name'];
		Event::dispatch(new crmEvent($request->user(), " updated information for employee " . $employee_name . " with id " . $employee->id));
		Session::flash('updated_employee', 'Employee has been updated');
		return redirect()->route('employees.employee', $employee->id);
	}
}
