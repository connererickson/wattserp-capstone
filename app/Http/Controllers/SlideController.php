<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Organization;
use App\User;
use App\Role;
use App\TrainingCourse;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use DB;
use Event;
use App\Events\crmEvent;

class SlideController extends Controller
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
    
	public function create_slide(Request $request, $training_course_id)
	{
	    if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
		$organization = Organization::find($org_id);
        $org_dir = $organization->directory;

		$auth_result = $request->user()->hasPermission('create_edit_assign_training');
    	if($auth_result){
    		$view = View::make('pages/safety/training/slides/create_slide', array('title' => 'Create Slide', 'tab'=>'training_courses'))->with(compact('training_course_id', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('safety')->with(compact('auth_result'));
        }
	}
	public function store_slide(CreateSlideRequest $request)
	{
		//First Setup the input array
		$input = $request->only('name', 'seconds', 'training_course_id');
		//Then Check the image and audio files and add their names to the input array
		if ($request->hasFile('image'))
		{
		    $image_name = $request->file('image')->getClientOriginalName();
			$input['image'] = $image_name;
		}
		else{
			$view = View::make('pages/problem', array('title' => 'Problem', 'problem' => 'The image file was not available for some reason'));
			return $view;
		}
		if ($request->hasFile('audio'))
		{
		    $audio_name = $request->file('audio')->getClientOriginalName();
			$input['audio'] = $audio_name;
		}
		else{
			$input['audio'] = '0';
		}
		$training_course = TrainingCourse::findOrFail($request->training_course_id);
		$tc_slides = $training_course->slides()->get()->toArray();
		$high_order = 0;
		foreach($tc_slides as $curr_slide){
			if($curr_slide['slide_order'] > $high_order){
				$high_order = $curr_slide['slide_order'];
			}
		}
		$input['slide_order'] = $high_order + 1;
		//Then Store the Slide in the Database and get an ID
		$slide = Slide::create($input);
		Event::dispatch(new crmEvent($request->user(), " created a new training slide " . $slide->name . " with id " . $slide->id));

		//Then Store the Image and Audio Files using the ID of the Slide DB Record
		$request->file('image')->storeAs('training/slides/' . $slide->id . '/', $input['image']);
		if ($request->hasFile('audio'))
		{
			$request->file('audio')->storeAs('training/slides/' . $slide->id . '/', $input['audio']);
		}
		
		//Then Go Back To The Edit Training Course View
		Session::flash('created_slide', 'Slide has been created');
		$training_course_id = $input['training_course_id'];
		return redirect()->route('safety.training.edit_training_course', array('id' => $training_course_id));
	}
	public function edit_slide(Request $request, $id)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('create_edit_assign_training');
    	if($auth_result){
    		$slide = Slide::findOrFail($id);
    		$view = View::make('pages/safety/training/slides/edit_slide', array('title' => 'Edit Slide', 'tab' => 'training_courses'))->with(compact('slide', 'org_dir'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	public function update_slide(UpdateSlideRequest $request, $id)
	{
		//First Setup the input array
		$input = $request->only('name', 'seconds');
		//Then Check the image and audio files and add their names to the input array
		if ($request->hasFile('image'))
		{
		    $image_name = $request->file('image')->getClientOriginalName();
			$input['image'] = $image_name;
		}
		if ($request->hasFile('audio'))
		{
		    $audio_name = $request->file('audio')->getClientOriginalName();
			$input['audio'] = $audio_name;
		}
		//Then Store the Slide in the Database and get an ID
		$slide = Slide::findOrFail($id);
		$slide->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated training slide " . $slide->name . " with id " . $slide->id));
		
		//Then Store the Image and Audio Files using the ID of the Slide DB Record
		if ($request->hasFile('image')){
			$request->file('image')->storeAs('training/slides/' . $slide->id . '/', $input['image']);
		}
		if ($request->hasFile('audio'))
		{
			$request->file('audio')->storeAs('training/slides/' . $slide->id . '/', $input['audio']);
		}
		Session::flash('updated_slide', 'Slide has been updated');
		return redirect()->route('safety.training.edit_training_course', array('training_course_id' => $slide->training_course_id));
	}
	public function delete_slide(Request $request)
	{
		$slide = Slide::findOrFail($request['slide_id']);
		$slide->delete();
		Event::dispatch(new crmEvent($request->user(), " deleted a training slide " . $slide->name . " with id " . $slide->id));
		$result = 1;
		
		echo json_encode($result);
	}
	public function reorder_slide(Request $request)
	{
		$data = $request->all();
		DB::table('slides')->where('id', $data['slide_id'])->update(array('slide_order' => $data['new_order']));
		DB::table('slides')->where('id', $data['slide_bumped'])->update(array('slide_order' => $data['old_order']));
		$result = 1;
		echo json_encode($result);
	}
}
