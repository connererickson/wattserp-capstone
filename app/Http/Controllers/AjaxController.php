<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Employee;
use App\Activity;
use App\TrainingCourse;
use DB;
use Event;
use App\Events\crmEvent;

class AjaxController extends Controller
{
    public function index(){
    	$msg = "this is a simple message";
		return response()->json(array('msg'=>$msg, 200));
    }
	
	public function install_module(Request $request){
		$user_id = Auth::user()->id;
		$user = User::findOrFail($user_id);
		$user->dashboardmodules()->sync($request['module_id'], false);
		Event::dispatch(new crmEvent($request->user(), " added new dashboard module " . $request['module_name']));
		return response()->json(array('msg'=>'1', 200));
	}
	
	public function remove_module(Request $request){
		$user_id = Auth::user()->id;
		$user = User::findOrFail($user_id);
		$user->dashboardmodules()->detach($request['module_id'], false);
		Event::dispatch(new crmEvent($request->user(), " removed dashboard module " . $request['module_name']));
		return response()->json(array('msg'=>'1', 200));
	}
	
	public function save_dashboard_layout(Request $request){
		$user_id = Auth::user()->id;
		$result = DB::table('users')->where('id', $user_id)->update(['dashboard_layout' => $request->dashboard_layout]);
		return response()->json(array('msg'=>$result, 200));
	}
	
	public function load_dashboard_layout(Request $request){
		$user_id = Auth::user()->id;
		$result = DB::table('users')->select('dashboard_layout')->where('id', $user_id)->get();
		return response()->json(array('msg'=>$result[0]->dashboard_layout, 200));
	}
	
	//DASHBOARD MODULES BUILD
	/*public function superadmin_permissions(){
		$superadmin_roles = array('Administrator', 'Project Manager', 'Executive', 'Human Resources', 'Contracts', 'Inventories', 'Safety', 'Field Coordinator');
		$users = User::whereHas('roles' => function($q){
		    $q->whereIn('name', $superadmin_roles);
		})->get()->toArray();
		return response()->json(array('msg'=>$users, 200));
	}*/
	
	//Get counties for state
	public function get_counties(Request $request){
		$input = $request->all();
		$search_state = $input['state'];
		$counties = array();
		$XML = URL::asset('storage/allorgs/data/counties.xml');
		$states = collect(json_decode(json_encode((array) simplexml_load_file($XML)), true));
		$states = $states['state'];
		foreach ($states as $state){
			if ($state['name'] == $search_state){
				$counties = $state['counties'];
			}
		}
		return response()->json(array('msg'=>$counties, 200));		
	}
	
	//Save Project Properties
	public function save_project_attribute(Request $request){
		$attribute = $request->attribute;
		$attribute_data['class'] = $request->class;
		if ($request->new_category != NULL){
			$attribute_data['category'] = $request->new_category;
		}
		else{
			$attribute_data['category'] = $request->category;
		}
		$attribute_data['org_id'] = $request->org_id;
		$attribute_data['tag'] = str_replace(' ', '_', strtolower(trim($attribute)));
		$attribute_data['display'] = $attribute;
		DB::table('projects_meta_attributes')->insert($attribute_data);
		return $attribute_data;
	}
	public function delete_project_attribute(Request $request){
		$attribute_id = $request->id;
		DB::table('projects_meta_attributes')->where('id', '=', $attribute_id)->delete();
		return $attribute_id;
	}
	public function insert_project_meta(Request $request){
		$attribute_meta['project_id'] = $request->project_id;
		$attribute_meta['tag'] = $request->tag;
		$attribute_meta['value'] = $request->value;
		DB::table('projects_meta')->insert($attribute_meta);
		return 1;
	}
    public function remove_project_meta(Request $request){
        DB::table('projects_meta')->where([['tag', '=', $request->tag], ['project_id', '=', $request->project_id]])->delete();
        return 1;
    }
    public function get_part_documents(Request $request){
        $path = "storage/allorgs/part_documents";
        $matching_documents = array();
        if ($handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                if ('.' === $file) continue;
                if ('..' === $file) continue;
                $temp_str = explode('_', $file);
                if ($request->part_id == $temp_str[0]){
                    $file = substr($file, strlen($temp_str[0])+1);
                    $matching_documents[] = $file;
                }
            }
            closedir($handle);
        }
        return json_encode($matching_documents);
    }
    public function upload_part_document(Request $request){
        $path = "storage/allorgs/part_documents";
        if ($request->hasFile('part_document')) {
            $file = $request->file('part_document');
            $part_id = $request->part_id;
            $name = $file->getClientOriginalName();
            $name = $part_id . "_" . $name;
            $file->move($path, $name);
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public function save_news(Request $request){
        $result = DB::table('news')->where('id', $request->id)->update(array('news' => $request->news));
        return 1;
    }
    public function delete_news(Request $request){
        DB::table('news')->where('id', '=', $request->id)->delete();
        return 1;
    }
    
    public function save_stakeholdercorrespondence(Request $request){
        $result = DB::table('stakeholder_correspondence')->where('id', $request->id)->update(array('message' => $request->message));
        return 1;
    }
    public function delete_stakeholdercorrespondence(Request $request){
        DB::table('stakeholder_correspondence')->where('id', '=', $request->id)->delete();
        return 1;
    }
}
