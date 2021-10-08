<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserInformationRequest;
use App\Organization;
use App\User;
use View;
use Event;
use Illuminate\Support\Facades\Session;
use App\Events\crmEvent;

class MySettingsController extends Controller
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
		
        $view = View::make('pages/settings/index', array('title' => 'Settings'))->with(compact('all_orgs', 'org_dir'));
		return $view;
    }
	public function information(Request $request)
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
		
		$user_data = auth()->user();
		$org_name = $organization->name;
		
        $view = View::make('pages/settings/information', array('title' => 'Settings'))->with(compact('all_orgs', 'org_dir', 'user_data', 'org_name'));
		return $view;
    }
	public function security(Request $request)
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
		
        $view = View::make('pages/settings/security', array('title' => 'Settings'))->with(compact('all_orgs', 'org_dir'));
		return $view;
    }
	public function update_password(UpdatePasswordRequest $request)
	{
		if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('msg', 'Your current password does not match with the password you provided. Please try again.');
        }

        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with('msg', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
	}
	public function edit_information(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$user = Auth::user();
		
        $view = View::make('pages/settings/edit_information', array('title' => 'Edit User', 'tab' => 'users'))->with(compact('user', 'org_dir'));
		return $view;
	}
	public function update_information(UpdateUserInformationRequest $request)
	{
		$input = $request->all();
			
		$user = Auth::user();
		$user->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated user " . $input['username'] . " with user id " . $user->id));
		Session::flash('updated_user', 'User has been updated');
		return redirect()->route('settings.information');
	}
}
