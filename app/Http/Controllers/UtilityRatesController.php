<?php

namespace App\Http\Controllers;

use Auth;
use Zoha\Meta\Models\Meta;
use App\Http\Requests\CreateRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Organization;
use App\User;
use App\Role;
use App\Company;
use App\UtilityRate;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use View;
use Validator;
use DB;
use Event;
use App\Events\crmEvent;

class UtilityRatesController extends Controller
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
        
        $auth_result = $request->user()->hasPermission('manage_utility_rates');
        if($auth_result){
            $utility = Company::findOrFail($request->id);
            $rates = $utility->rates()->paginate(20);
            $view = View::make('pages/utility_rates/index', array('title' => 'Manage Rates'))->with(compact('all_orgs', 'org_dir', 'utility', 'rates'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function rate(Request $request)
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
        
        $auth_result = $request->user()->hasPermission('manage_utility_rates');
        if($auth_result){
            $rate = UtilityRate::findOrFail($request->id);
            $view = View::make('pages/utility_rates/rate', array('title' => 'Utility Rate'))->with(compact('all_orgs', 'org_dir', 'rate'));
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
        
        $auth_result = $request->user()->hasPermission('manage_utility_rates');
        if($auth_result){
            $utility = Company::findOrFail($request->id);
            $view = View::make('pages/utility_rates/create', array('title' => 'Create Utility Rate'))->with(compact('org_dir', 'utility'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function store(CreateRateRequest $request)
    {
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $input = $request->only('utility', 'rate_name', 'rate_description');
        $input['org_id'] = $org_id;
        $input['frozen'] = 0;
        //$utility_rate = UtilityRate::create($input);
        $input = $request->all();
        
        //Build the rate meta array
        $rate_meta = array(
            'service_charge_type' => $input['service_charge_type'],
            'rate_type' => $input['rate_type'],
            'demand_type' => $input['demand_type']
        );
        if ($input['service_charge_type'] == 'fixed_monthly_charge'){
            $rate_meta['fixed_monthly_charge'] = $input['fixed_charge'];
        }
        if ($input['service_charge_type'] == 'daily_charge'){
            $rate_meta['daily_charge'] = $input['daily_charge'];
        }
        if ($input['rate_type'] == 'time_of_use'){
            $curr_interval = "interval_name1";
            $interval_counter = 1;
            while(isset($input[$curr_interval])){
                $rate_meta[$curr_interval] = $input[$curr_interval];
                $curr_meta = "rate_interval_start" . $interval_counter;
                $rate_meta[$curr_meta] = $input[$curr_meta];
                $curr_meta = "rate_interval_end" . $interval_counter;
                $rate_meta[$curr_meta] = $input[$curr_meta];
                $curr_meta = "interval_cost" . $interval_counter;
                $rate_meta[$curr_meta] = $input[$curr_meta];
                $interval_counter++;
                $curr_interval = "interval_name" . $interval_counter;
            }
        }
        
        die(print_r($rate_meta));
        //$utility_rate->createMeta($rate_meta);


        Event::dispatch(new crmEvent($request->user(), " created a new utility rate for " . $request['company_name'] ));
        Session::flash('created_rate', 'Rate has been created');
        return redirect()->route('utility_rates.index', $request['utility']);
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
        
        $auth_result = $request->user()->hasPermission('manage_utility_rates');
        if($auth_result){
            $company = Company::findOrFail($id);
            $view = View::make('pages/utility_rates/edit', array('title' => 'Edit Company'))->with(compact('company', 'org_dir'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function update(UpdateRateRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $input = $request->all();
        $company->update($input);
        Event::dispatch(new crmEvent($request->user(), " updated directory information for " . $request['type'] . " - " . $request['company_name'] . "( " . $request['company_legal_name'] . " )"));
        Session::flash('updated_rate', 'Rate has been updated');
        return redirect()->route('utility_rates.index');
    }
}
