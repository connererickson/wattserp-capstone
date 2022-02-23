<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Organization;
use App\User;
use App\Company;
use View;
use Event;
use DB;
use App\Events\crmEvent;

class InventoryController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_inventory');
		if($auth_result){
    		$view = View::make('pages/inventory/index', array('title' => 'Inventory'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
        	return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function manage(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_inventory');
		if($auth_result){
			
			//Get Filters
			$filters = DB::table('repository_types')->select('*')->get()->toArray();
			
			//Get Vendors
			$vendors = Company::where('type', '=', 'Vendor')->get();
			
			// Get Parts
    		$repository = DB::table('repository_parts AS rps')
			->join('companies AS c', 'rps.manufacturer', '=', 'c.id')
			->select('rps.*', 'c.company_name AS manufacturer')
			->where('rps.org_id', '=', $org_id)
			->paginate(50);
    		$view = View::make('pages/inventory/manage/index', array('title' => 'Manage Inventory'))->with(compact('all_orgs', 'org_dir', 'filters', 'repository', 'vendors'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }

	public function edit_vendor_price(Request $request) {
		$company_id = $request['company_id'];
		$price = $request['price'];
		$repository_part_id = $request['repository_part_id'];
		$date = $request['date'];
		$edit_vendor_result = DB::table('repository_parts_vendors')->insert(array('company_id' => $company_id, 'repository_part_id' => $repository_part_id, 'price' => $price, 'date' => $date, 'quantity' => 0));

		return 1;
	}

	public function edit_vendor_quantity(Request $request) {

		$company_id = $request['company_id'];
		$price = $request['price'];
		$repository_part_id = $request['repository_part_id'];
		$date = $request['date'];
		$newQuantity = $request['newQuantity'];

		$purchase_stock_result = DB::table('repository_parts_vendors')->
		where('repository_part_id', $repository_part_id)->
		where('company_id', $company_id)->
		where('price', $price)->
		where('date', $date)->update(array('quantity' => $newQuantity)); 

		return 1;
	}

	public function delete_vendor_row(Request $request) {

        $company_id = $request['company_id'];
        $price = $request['price'];
        $repository_part_id = $request['repository_part_id'];
        $date = $request['date'];

        $delete_vendor_row_result = DB::table('repository_parts_vendors')->
        where('repository_part_id', $repository_part_id)->
        where('company_id', $company_id)->
        where('price', $price)->
        where('date', $date)->delete(); 

        return 1;
    }
	
	public function update_stock(Request $request){
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('edit_inventory');
		if($auth_result){
			Event::dispatch(new crmEvent($request->user(), " removed stock for part with id " . $request['part_id']));
			$update_stock_result = DB::table('repository_parts')->where('id', $request['part_id'])->update(array('stock' => $request['new_stock']));
			return $update_stock_result;
		}
	}
	
	public function pull(Request $request)
    {
    	$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('view_inventory_pull');
		if($auth_result){
    		$view = View::make('pages/inventory/pull/index', array('title' => 'Pull Inventory'))->with(compact('org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function receive(Request $request)
    {
    	$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('receive_inventory');
		if($auth_result){
    		$view = View::make('pages/inventory/receive/index', array('title' => 'Receive Inventory'))->with(compact('org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function order(Request $request)
    {
    	$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('create_inventory_order');
		if($auth_result){
    		$view = View::make('pages/inventory/order/index', array('title' => 'Orders'))->with(compact('org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	public function printout (Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('view_inventory');
		if($auth_result){
			
			$repository = DB::table('repository_parts AS rps')
			->join('repository_units AS u', 'rps.stocking_unit', '=', 'u.id')
			->join('repository_units AS u2', 'rps.pricing_unit', '=', 'u2.id')
			->select('rps.*', 'u.unit AS stock_unit', 'u2.unit AS price_unit')->get()->toArray();
			
    		$view = View::make('pages/inventory/print/index', array('title' => 'Print'))->with(compact('org_dir', 'repository', 'all_orgs'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
	
	/** THIS IS A HUGE COMMENT, JUST DELETE IT LATER. **/
}
