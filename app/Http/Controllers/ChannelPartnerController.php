<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateChannelPartnerRequest;
use App\Http\Requests\UpdateChannelPartnerRequest;
use Illuminate\Support\Facades\Crypt;
use CountryState;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\ChannelPartner;
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

class ChannelPartnerController extends Controller
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
		
		$auth_result = $request->user()->hasPermission('view_channel_partners');
		if($auth_result){
			$users = User::all();
	    	$channel_partners = ChannelPartner::where('org_id', '=', $org_id)->paginate(20);
	    	$view = View::make('pages/channel_partners/index', array('title' => 'Channel Partners', 'tab' => 'channel_partners'))->with(compact('all_orgs', 'channel_partners', 'users', 'org_dir', 'auth_result'));
			return $view;
		}
		else{
    		return redirect()->route('dashboard')->with(compact('auth_result'));
		}
    }
	public function cp_profile(Request $request, $id)
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
		
		$auth_result = $request->user()->hasPermission('view_channel_partners');
	
		if($auth_result){
			$channel_partner = ChannelPartner::findOrFail($id);
			$user = User::findOrFail($channel_partner->user_id);
        	$view = View::make('pages/channel_partners/cp_profile', array('title' => 'Channel Partner Information', 'tab' => 'channel_partners'))->with(compact('all_orgs', 'channel_partner', 'user', 'org_dir'));
			return $view;
		}

		else{
    		return redirect()->route('channel_partners.index')->with(compact('auth_result'));
    	}
    }
    public function resources_index(Request $request)
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
        
        $view = View::make('pages/channel_partners/resources/index', array('title' => 'Sales Resources', 'tab' => ''))->with(compact('all_orgs', 'org_dir'));
        return $view;
    }
    public function profile_index(Request $request)
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
        
        $view = View::make('pages/channel_partners/profile/index', array('title' => 'My Profile', 'tab' => ''))->with(compact('all_orgs', 'org_dir'));
        return $view;
    }
    public function profile_create(Request $request)
    {
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        $user = $request->user()->id;
        $states = CountryState::getStates('US');
        $view = View::make('pages/channel_partners/profile/create', array('title' => 'Create Profile', 'tab' => ''))->with(compact('org_id', 'org_dir', 'user', 'states'));
        return $view;
        
    }
    public function profile_store(CreateChannelPartnerProfileRequest $request)
    {
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        
        $cp_info_input = $request->only('cp_company_name', 'cp_main_phone', 'cp_website', 'cp_taxid');
        $cp_info_input['org_id'] = $org_id;
        $cp_address_input = $request->only('cp_mailing_address', 'cp_mailing_city', 'cp_mailing_state', 'cp_mailing_zip');
        $main_partner_contact = $request->only('cp_main_contact_name', 'cp_main_contact_title', 'cp_main_contact_email', 'cp_main_contact_direct');
        //$sales_contacts
        
        $channel_partner = ChannelPartner::create($cp_info_input);
        $cp_address = Address::create($cp_address_input);
        $address_id = Address::find($cp_address->id);
        $channel_partner->address()->attach($address_id);
        $channel_partner_name = $channel_partner_input['first_name'] . " " . $channel_partner_input['middle_name'] . " " . $channel_partner_input['last_name'];
        Event::dispatch(new crmEvent($request->user(), " created new channel partner " . $channel_partner_name . " with id " . $channel_partner->id));
        Session::flash('created_channel_partner', 'Channel Partner has been created');
        return redirect()->route('channel_partners.index');
    }
    public function profile_edit(Request $request, $id)
    {
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        
        $auth_result = $request->user()->hasPermission('edit_channel_partner');
        if($auth_result){
            $channel_partner = ChannelPartner::findOrFail($id);
            $states = CountryState::getStates('US');
            $view = View::make('pages/channel_partners/edit', array('title' => 'Edit Channel Partner', 'tab' => 'channel_partners'))->with(compact('channel_partner', 'org_dir', 'states'));
            return $view;
        }
        else{
            return redirect()->route('channel_partners.index')->with(compact('auth_result'));
        }
    }
    public function profile_update(UpdateChannelPartnerRequest $request, $id)
    {   
        $channel_partner_input = $request->only('user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'alt_email', 'start_date');
        $address_input = $request->only('address', 'city', 'state', 'zip');
        $channel_partner_input['start_date'] = date('Y-m-d', strtotime($channel_partner_input['start_date']));
        $channel_partner = ChannelPartner::findOrFail($id);
        $channel_partner->update($channel_partner_input);
        $channel_partner->address()->update($address_input);
        $channel_partner_name = $channel_partner['first_name'] . " " . $channel_partner['middle_name'] . " " . $channel_partner['last_name'];
        Event::dispatch(new crmEvent($request->user(), " updated information for channel partner " . $channel_partner_name . " with id " . $channel_partner->id));
        Session::flash('updated_channel_partner', 'Channel Partner has been updated');
        return redirect()->route('channel_partners.member', $channel_partner->id);
    }
}