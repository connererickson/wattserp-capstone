<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateWeatherLocationRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support;
use CountryState;
use App\User;
use App\Organization;
use DarkSky;
use Illuminate\Support\Facades\Session;
use View;
use DB;
use Event;
use App\Events\crmEvent;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function weather(Request $request){
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
        $auth_result = $request->user()->hasPermission('weather_app');
        if($auth_result){
            $forecasts = array();
            $weather_locations = DB::table('weather_locations')->select('*')->where('org_id', '=', $org_id)->get()->toArray();
            $darksky = new Darksky('DARKSKY_API_KEY');
            foreach($weather_locations as $weather_location){
                $forecasts[] = $darksky->location($weather_location->latitude, $weather_location->longitude)->extend()->get();
            }
            $states = CountryState::getStates('US');
            $view = View::make('pages/applications/weather', array('title' => 'Weather App'))->with(compact('all_orgs', 'org_dir', 'org_id', 'auth_result', 'forecasts', 'weather_locations', 'states'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    public function store_location(CreateWeatherLocationRequest $request){
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $input = $request->all();
        $training_course = DB::table('weather_locations')->insert(array('org_id' => $org_id, 'city' => $input['city'], 'state' => $input['state'], 'latitude' => $input['latitude'], 'longitude' => $input['longitude']));
        Event::dispatch(new crmEvent($request->user(), " created a new weather app location at " . $input['city'] . ", " . $input['state']));
        Session::flash('created_weather_location', 'Location has been created');
        return redirect()->route('weather');
        
    }
}

?>