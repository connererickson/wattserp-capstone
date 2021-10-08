<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Organization;
use App\Employee;
use App\User;
use App\Role;
use App\TrainingCourse;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use View;
use Validator;
use DB;
use Event;
use App\Events\crmEvent;
use \FPDF;
use \setasign\Fpdi\Fpdi;
use \setasign\Fpdi\PdfParser\StreamReader;

class TrainingController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_training_courses_results');
    	if($auth_result){
    		$view = View::make('pages/safety/training/index', array('title' => 'Overview', 'tab' => 'overview'))->with(compact('all_orgs', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
    }
	
	public function training_courses_index(Request $request)
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
		
		$auth_result = $request->user()->hasPermission('view_training_courses_results');
    	if($auth_result){
    		$training_courses = $organization->training_course()->where('active', '=', '1')->paginate(20);
        	$view = View::make('pages/safety/training/training_courses_index', array('title' => 'Training Courses', 'tab' => 'training_courses'))->with(compact('all_orgs', 'training_courses', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
	}
	
	public function create_training_course(Request $request)
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
    		$view = View::make('pages/safety/training/create_training_course', array('title' => 'Create Training Course', 'tab'=>'training_courses'))->with(compact('org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
	}

	public function store_training_course(CreateTrainingRequest $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$input = $request->all();
		$input['active'] = 1;
		$organization = Organization::find($org_id);
		$training_course = TrainingCourse::create($input);
		$organization->training_course()->attach($training_course->id);
		Event::dispatch(new crmEvent($request->user(), " created a new training course named " . $training_course->name . " with id " . $training_course->id));
		Session::flash('created_training_course', 'Training Course has been created');
		return redirect()->route('safety.training.training_courses_index');
	}
	
	public function edit_training_course(Request $request, $id)
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
    		$training_course = TrainingCourse::findOrFail($id);
			$slides = $training_course->slides()->orderBy('slide_order', 'asc')->get();
    		$view = View::make('pages/safety/training/edit_training_course', array('title' => 'Edit Training Course', 'tab'=>'training_courses'))->with(compact('training_course', 'slides', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
	}
	
	public function update_training_course(UpdateTrainingRequest $request, $id)
	{
		$training_course = TrainingCourse::findOrFail($id);
		$input = $request->all();
		$training_course->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated a training course named " . $training_course->name . " with id " . $training_course->id));
		Session::flash('updated_training_course', 'Training Course has been updated');
		return redirect()->route('safety.training.training_courses_index');
	}
	
	public function delete_training_course(Request $request){
		$user_id = Auth::user()->id;
		$result = DB::table('training_courses')->where('id', $request->training_course_id)->update(['active' => 0]);
		Event::dispatch(new crmEvent($request->user(), " removed training course " . $request['training_name']));
		return response()->json(array('msg'=>$result, 200));
	}

	public function scheduled_training_index(Request $request)
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
		
		$auth_result = $request->user()->hasPermission('view_training_courses_results');
    	if($auth_result){
    		$scheduled_training_courses = DB::table('employees')
    		->join('training_courses_employees', 'employees.id', '=', 'training_courses_employees.employee_id')
    		->join('training_courses', 'training_courses_employees.training_course_id', '=', 'training_courses.id')
			->where('training_courses_employees.completed', '=', 0)
			->where('employees.org_id', '=', $org_id)
    		->select('employees.*', 'training_courses.*', 'training_courses_employees.created_at', 'training_courses_employees.updated_at', 'training_courses_employees.id')
    		->paginate(20);
    		$employees = Employee::where('org_id', '=', $org_id)->get();
			$training_courses = $organization->training_course->where('active', 1);
        	$view = View::make('pages/safety/training/scheduled_training_index', array('title' => 'Scheduled Training Courses', 'tab' => 'assign_courses'))->with(compact('all_orgs', 'training_courses', 'employees', 'scheduled_training_courses', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
	}
	
	public function schedule_training(Request $request){
		$user_id = Auth::user()->id;
		$employee = Employee::findOrFail($request->employee_id);
		$employee_name = $employee->first_name . " " . $employee->middle_name . " " . $employee->last_name;
		$training_course = TrainingCourse::findOrFail($request->training_course_id);
		$training_course_name = $training_course->name;
		$employee->training_course()->attach($request->training_course_id);
		Event::dispatch(new crmEvent($request->user(), " scheduled training " . $training_course_name . " for " . $employee_name));
		return response()->json(array('msg'=>'1', 200));
	}

	public function unschedule_training(Request $request){
		$user_id = Auth::user()->id;
		$result = DB::table('training_courses_employees')->where('id', $request->schedule_id)->delete();
		Event::dispatch(new crmEvent($request->user(), " unscheduled training " . $request['training_name'] . " for " . $request['employee_name']));
		return response()->json(array('msg'=>$result, 200));
	}
	
	public function training_results_index(Request $request)
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
		
		$auth_result = $request->user()->hasPermission('view_training_courses_results');
    	if($auth_result){
    		$completed_training_courses = DB::table('employees')
    		->join('training_courses_employees', 'employees.id', '=', 'training_courses_employees.employee_id')
    		->join('training_courses', 'training_courses_employees.training_course_id', '=', 'training_courses.id')
			->where('training_courses_employees.completed', '=', 1)
			->where('employees.org_id', '=', $org_id)
    		->select('employees.*', 'training_courses.*', 'training_courses_employees.certificate_file', 'training_courses_employees.updated_at')
    		->paginate(20);
			
			$employees = Employee::all();
			$training_courses = $organization->training_course->where('active', 1);
			
        	$view = View::make('pages/safety/training/training_results_index', array('title' => 'Training Reports', 'tab' => 'training_history'))->with(compact('all_orgs', 'training_courses', 'employees', 'completed_training_courses', 'org_dir'));
			return $view;
    	}
		else{
			return redirect()->route('safety')->with(compact('auth_result'));
		}
	}
	public function slideshow(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('take_training_course');
    	if($auth_result){
    		$training_course = TrainingCourse::findOrFail($request->id);
			$slides = DB::table('slides')->where('slides.training_course_id', '=', $request->id)->orderBy('slide_order', 'ASC')->get()->toArray();
        	$view = View::make('pages/safety/training/slideshow', array('title' => 'Training Course'))->with(compact('org_dir', 'training_course', 'slides'));
			return $view;
    	}
		else{
			return redirect()->route('dashboard')->with(compact('auth_result'));
		}
	}
	public function certificate(Request $request)
	{
		$org_id = Auth::user()->org_id;
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$training_course = TrainingCourse::findOrFail($request->id);
		$training_course_name = $training_course->name;
		$training_course_name_no_spaces = str_replace(' ', '', $training_course_name);
		
		$user_id = $request->user()->id;
		
		$curr_date = date("F j, Y");
		$no_format_date = date("MdY");
		$employee = DB::table('employees')
			->join('users', 'users.id', '=', 'employees.user_id')
			->where('users.id', '=', $user_id)
    		->select('employees.*')
    		->get()->toArray();
		
		$pdf = new \setasign\Fpdi\Fpdi();
		$pdf->AddPage('L', 'Letter');
		$path = URL::asset('/storage/training/certificate_blank.pdf');
		$fileContent = file_get_contents($path,'rb');
		$pdf->setSourceFile(StreamReader::createByString($fileContent));
		$tplIdx = $pdf->importPage(1);
		$pdf->useTemplate($tplIdx, 0, 2, 279);
		$pdf->SetFont('Helvetica', 'B', 18);
		$pdf->SetTextColor(255, 0, 0);
		$pdf->SetY(80);
		$pdf->Cell(0,20,$employee[0]->first_name . " " . $employee[0]->middle_name . " " . $employee[0]->last_name,0,0,'C');
		$pdf->SetY(120);
		$pdf->Cell(0,20,$training_course_name,0,0,'C');
		$pdf->SetFont('Helvetica', '', 14);
		$pdf->SetY(175);
		$pdf->Cell(0,10,$curr_date,0,0,'C');
		
		//save file
		$filename = $employee[0]->last_name . '_' . $no_format_date . '_' . $training_course_name_no_spaces . '.pdf';
		Storage::disk('public')->put('/training/certificates/' . $filename, $pdf->Output('S'));

		//Update Employee Training Database
		$employee_id = $employee[0]->id;
		$training_course_id = $training_course->id;
		DB::table('training_courses_employees')->where([['employee_id', '=', $employee_id], ['training_course_id', '=', $training_course_id]])->update(array('completed' => 1, 'certificate_file' => $filename));
		$view = View::make('pages/safety/training/certificate', array('title' => 'Training Course'))->with(compact('org_dir', 'training_course_name', 'filename', 'employee'));
		return $view;
		
		
	}
}
