<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Requests\CreatePartRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Http\Requests\ImportPartsRequest;
use App\Http\Requests\ProcessImportRequest;
use App\Events\crmEvent;
use App\Imports\PartsImport;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Helpers\GenerateSKU;
use App\Organization;
use App\User;
use App\Role;
use App\Permission;
use App\RepositoryPart;
use App\Company;
use View;
use Validator;
use DB;
use Event;

class RepositoryController extends Controller
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
		
    	$auth_result = $request->user()->hasPermission('view_repository');
    	if($auth_result){
    		$view = View::make('pages/repository/index', array('title' => 'Repository'))->with(compact('all_orgs', 'org_dir'));
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
		
    	$auth_result = $request->user()->hasPermission('view_repository');
		if($auth_result){
			
			//Get Filters
			$filters = DB::table('repository_types')->select('*')->get()->toArray();
			
			//Get Vendors
			$vendors = Company::where('type', '=', 'Vendor')->get();
			
			// Get Parts
    		$repository = DB::table('repository_parts AS rps')
			->select('rps.*', 'c.company_name AS manufacturer')
			->join('companies AS c', 'rps.manufacturer', '=', 'c.id')
			->where('rps.org_id', '=', $org_id)
			->paginate(50);
    		$view = View::make('pages/repository/manage/index', array('title' => 'Manage Repository'))->with(compact('all_orgs', 'org_dir', 'filters', 'repository', 'vendors'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	
	public function get_part(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('view_repository');
		if($auth_result){
			$part = DB::table('repository_parts AS rps')->select('rps.*', 'rt.type', 'rc.color_code', 'rua.unit AS pricing_unit',
																'c.company_name', 'c.internal_nickname', 'rub.unit AS length_unit',
																'ruc.unit AS width_unit', 'rud.unit AS height_unit', 
																'rua.alternate_display AS alternate_pricing', 'rue.unit AS stocking_unit',
																'rue.alternate_display AS alternate_stocking')
			->join('companies AS c', 'rps.manufacturer', '=', 'c.id')
			->join('repository_types AS rt', 'rps.parent_type', '=', 'rt.id')
			->join('repository_colors AS rc', 'rps.color', '=', 'rc.id')
			->join('repository_units AS rua', 'rps.pricing_unit', '=', 'rua.id')
			->join('repository_units AS rub', 'rps.length_unit', '=', 'rub.id')
			->join('repository_units AS ruc', 'rps.width_unit', '=', 'ruc.id')
			->join('repository_units AS rud', 'rps.height_unit', '=', 'rud.id')
			->join('repository_units AS rue', 'rps.stocking_unit', '=', 'rue.id')
			->where('rps.sku', '=', $request->sku)->get()->toArray();
			
			$parent_type = $part['0']->parent_type;
			$part_id = $part['0']->id;
			$unser_tags = unserialize($part['0']->tags);
			$part['0']->tags = $unser_tags;
			
			$tags = DB::table('repository_types_tags AS rtt')->select('rtag.tag', 'rtag.id') 
			->join('repository_tags AS rtag', 'rtag.id', '=', 'rtt.tag_id')
			->where('rtt.type_id', '=', $parent_type)->get()->toArray();
			
			$vendors = DB::table('companies AS c')->select('c.*', 'rpv.price AS vendor_price', 'rpv.date AS purchase_date', 'rpv.quantity AS quantity') 
			->join('repository_parts_vendors AS rpv', 'c.id', '=', 'rpv.company_id')
			->where('rpv.repository_part_id', '=', $part_id)
			->orderBy('rpv.date')
			->orderBy('c.company_name')
			->get()->toArray();
			
			$parts_tags = array('part' => $part, 'tags' => $tags, 'vendors' => $vendors);
			return $parts_tags;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	// public function edit_vendor_price(Request $request) {
	// 	$companyId = $request['companyId'];
	// 	$newPrice = $request['newPrice'];
	// 	$repository_part_id = $request['repository_part_id'];
	// 	$today = $request['date'];
	// 	$edit_vendor_result = DB::table('repository_parts_vendors')->insert(array('id' => 100, 'company_id' => $company_id, 'repository_part_id' => $repository_part_id, 'price' => $newPrice, 'date' => $today, 'quantity' => 0));

	// 	// $vendor_id = DB::getPdo()->lastInsertId();
	// 	// Event::dispatch(new crmEvent($request->user(), "Edited vendor price."));
	// 	// $result = array(1, $vendor_id);
	// 	// echo json_encode($result);
	// }

	public function parts_list(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('view_repository');
		if($auth_result){
			
			$filter = $request['filter'];
			$sort_by = $request['sort_by'];
			$search = $request['search'];
			
			$filter_expression = "1 = 1";
			if ($filter != 0){
				$filter_expression = "parent_type = " . $filter;
			}
			
			$sort_by_expression = "id ASC";
			if ($sort_by != ""){
				$sort_by_expression = $sort_by . " ASC";
			}
			
			$search_expression1 = "1 = 1";
			if ($search != ""){
				$search_expression1 = "(`rps`.`part_no` LIKE '%" . $search . "%' OR `rps`.`description` LIKE '%" . $search;
				$search_expression1 .= "%' OR `rps`.`tags` LIKE '%" . $search . "%' OR `rps`.`location` LIKE '%" . $search;
				$search_expression1 .= "%' OR `c`.`company_name` LIKE '%" . $search . "%')";
			}
			
			// Get Parts
    		$repository_parts = DB::table('repository_parts AS rps')
			->join('companies AS c', 'rps.manufacturer', '=', 'c.id')
			->select('rps.*', 'c.company_name AS manufacturer')
			->whereRaw($search_expression1)
			->whereRaw($filter_expression)
			->where('rps.org_id', '=', $org_id)
			->orderByRaw($sort_by_expression)
			->get()->toArray();
			
			$repository_list = "
				<table class='table'>
        			<thead>
        				<tr>
        					<th></th>
        					<th>Sku</th>
        					<th>Part #</th>
        					<th>Manufacturer</th>
        					<th>Description</th>
        				</tr>
        			</thead>
        			<tbody>";
        	
        	if ($repository_parts){
				foreach ($repository_parts as $repository_part){
					$repository_list .= "
					<tr id='part" . $repository_part->id . "'>
						<td>";
							if($repository_part->image != ""){
								$repository_list .= "<img class='repository_thumbnail' src='" . URL::asset('/storage/allorgs/repository/' . $repository_part->image) . "' alt='' />";
							}
						$repository_list .= "
						</td>
						<td><button class='sku_btn btn btn-outline-primary m-0 waves-effect' href='#' id='" . $repository_part->sku . "'>" . $repository_part->sku ."</button></td>
						<td>" . $repository_part->part_no . "</td>
						<td>" . $repository_part->manufacturer . "</td>
						<td style='max-width: 600px;'>" . $repository_part->description . "</td>
					</tr>";
        		}
        	}
			$repository_list .= "
        			</tbody>
        		</table>";
        	if (!count($repository_parts)){
        		$repository_list .= "<div style='padding-left: 5px;'>No Results to Display</div>";
			}
		}
		echo json_encode($repository_list);
	}
	
	public function upload_part_image(Request $request)
	{
		$form_data = Input::all();
    
    	$validator = Validator::make($form_data, array('img' => 'required|mimes:png,gif,jpeg,jpg,bmp'), array('img.mimes' => 'Uploaded file is not in image format', 'img.required' => 'Image is required'));

        if ($validator->fails()) {
            return Response::json(array(
                'status' => 'error',
                'message' => $validator->messages()->first(),
            ), 200);
        }
		else{
			$photo = $form_data['img'];

        	$original_name = $photo->getClientOriginalName();
        	$original_name_without_ext = substr($original_name, 0, strlen($original_name) - 4);

        	$filename = $this->sanitize($original_name_without_ext);
        	$allowed_filename = $this->createUniqueFilename( $filename );

        	$filename_ext = $allowed_filename .'.jpg';

        	$manager = new ImageManager();
        	$image = $manager->make( $photo )->encode('jpg')->save(public_path('storage/allorgs/temp_part_images') . "/" . $filename_ext);

        	if( !$image ) {
	            return Response::json(array(
	                'status' => 'error',
	                'message' => 'Server error while uploading',
	            ), 200);
	        }

	        return Response::json(array(
	            'status'    => 'success',
	            'url'       => URL::asset('storage/allorgs/temp_part_images/' . $filename_ext),
	            'width'     => $image->width(),
	            'height'    => $image->height()
	        ), 200);
		}
	}
	public function crop_part_image(Request $request)
	{
        $form_data = Input::all();
        $image_url = $form_data['imgUrl'];

        // resized sizes
        $imgW = $form_data['imgW'];
        $imgH = $form_data['imgH'];
        // offsets
        $imgY1 = $form_data['imgY1'];
        $imgX1 = $form_data['imgX1'];
        // crop box
        $cropW = $form_data['width'];
        $cropH = $form_data['height'];
        // rotation angle
        $angle = $form_data['rotation'];

        $filename_array = explode('/', $image_url);
        $filename = $filename_array[sizeof($filename_array)-1];

        $manager = new ImageManager();
        $image = $manager->make( $image_url );
        $image->resize($imgW, $imgH)
            ->rotate(-$angle)
            ->crop($cropW, $cropH, $imgX1, $imgY1)
            ->save(public_path('storage/allorgs/repository') . "/" . $filename);
		
		$update_part_image = DB::table('repository_parts')->where('id', $form_data['part_id'])->update(array('image' => $filename));
		Event::dispatch(new crmEvent($request->user(), " updated image for part with id " . $form_data['part_id']));

        if( !$image ) {

            return Response::json(array(
                'status' => 'error',
                'message' => 'Server error while uploading',
            ), 200);

        }
		
		//return $form_data; 
        return Response::json(array(
            'status' => 'success',
            'curr_part_id' => $form_data['part_id'],
            'url' => URL::asset('storage/allorgs/temp_part_images/' . $filename)
        ), 200);
	}
		
	public function update_tags(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('edit_repository');
		if($auth_result){
			$part_id = $request['part_id'];
			$selected_tags = serialize($request['selected_tags']);
			$update_type_filter_result = DB::table('repository_parts')->where('id', $part_id)->update(array('tags' => $selected_tags));
			Event::dispatch(new crmEvent($request->user(), " updated tags for part with id " . $part_id));
			$result = 1;
			return $result;
		}
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }	
	}
	
	public function add_vendor(Request $request)
	{
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
    	$auth_result = $request->user()->hasPermission('edit_repository');
		if($auth_result){


			$part = RepositoryPart::findOrFail($request['part_id']);
			$vendor_id = $request['vendor_id'];
			$vendor_price = $request['vendor_price'];
			if (!$part->companies->contains($vendor_id)){
				$part->companies()->attach($vendor_id, array('price' => $vendor_price));
				Event::dispatch(new crmEvent($request->user(), " added a vendor with id " . $vendor_id . " for part with id " . $part->id));
				$result = 1;
			}
			else{
				$part->companies()->updateExistingPivot($vendor_id, array('price' => $vendor_price), false);
				Event::dispatch(new crmEvent($request->user(), " updated pricing for vendor with id " . $vendor_id . " for part with id " . $part->id));
				$result = 2;
			}
		}
		else{
			$result = 0;
		}
		return $result;
	}
	
	public function remove_vendor(Request $request)
	{
		$part = RepositoryPart::findOrFail($request['part_id']);
		$vendor_id = $request['vendor_id'];
			
		$part->companies()->detach($vendor_id);
		Event::dispatch(new crmEvent($request->user(), " removed vendor with id " . $vendor_id . " for part with id " . $part->id));
		$result = 1;
			
		return $result;
	}
	
	public function generate_sku(Request $request)
	{
	    $sku_generator = new GenerateSKU();
        $upc = $sku_generator->generate_sku($request['type']);
        return $upc;
	}
	
	public function create_part(Request $request)
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

		$auth_result = $request->user()->hasPermission('create_repository');
    	if($auth_result){
    		$manufacturers = Company::where('type', '=', 'Manufacturer')->get();
			$suppliers = Company::where('type', '=', 'Supplier/Service')->get();
			$types = DB::table('repository_types')->where('active', 1)->select('*')->get();
			$units = DB::table('repository_units')->select('*')->get();
			$colors = DB::table('repository_colors')->select('*')->get();
    		$view = View::make('pages/repository/manage/create_part', array('title' => 'Add Part'))->with(compact('all_orgs','org_id', 'org_dir', 'manufacturers', 'suppliers', 'types', 'units', 'colors'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}
	
	public function store_part(CreatePartRequest $request)
	{
		$input = $request->all();
		$partExists = RepositoryPart::where('part_no', '=', $input['part_no'])->first();
		if ($partExists === null) {
			$repository_part = RepositoryPart::create($input);
			//Copy the barcode image from temp to permanent
			Storage::move('allorgs/temp_barcodes/' . $input['barcode_image'], 'allorgs/part_barcodes/' . $input['barcode_image']);
			Event::dispatch(new crmEvent($request->user(), " created a new part in the repository with id " . $request['id'] . ", and part # " . $input['part_no']));
			Session::flash('created_part', 'Part has been created');
		}
		else{
			Session::flash('created_part', 'Part already exists!');
		}
		return redirect()->route('repository.manage');
	}

	public function edit_part(Request $request, $id)
	{	
		if (Auth::user()->authorizeRoles(array('Super Admin'))){
			$org_id = $request->session()->get('curr_org_id');
    	}
		else{
			$org_id = Auth::user()->org_id;
		}
		$organization = Organization::find($org_id);
		$org_dir = $organization->directory;
		
		$auth_result = $request->user()->hasPermission('edit_repository');
    	if($auth_result){
    		$repository_part = RepositoryPart::findOrFail($id);
			$manufacturers = Company::where('type', '=', 'Manufacturer')->get();
			$suppliers = Company::where('type', '=', 'Supplier/Service')->get();
			$types = DB::table('repository_types')->where('active', 1)->select('*')->get();
			$units = DB::table('repository_units')->select('*')->get();
			$colors = DB::table('repository_colors')->select('*')->get();
        	$view = View::make('pages/repository/manage/edit_part', array('title' => 'Edit Part'))->with(compact('repository_part', 'org_dir', 'manufacturers', 'suppliers', 'types', 'units', 'colors'));
			return $view;
		}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function update_part(UpdatePartRequest $request, $id)
	{
		//dd($request);
		$repository_part = RepositoryPart::findOrFail($id);
		$input = $request->all();
		$repository_part->update($input);
		Event::dispatch(new crmEvent($request->user(), " updated repository part with id " . $request['id'] . ", and part # " . $request['part_no']));
		Session::flash('updated_part', 'Part has been updated');
		return redirect()->route('repository.manage');
	}
    
    public function upload_import_file(Request $request){
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        
        $auth_result = $request->user()->hasPermission('create_repository');
        
        if($auth_result){
            $view = View::make('pages/repository/manage/import_file_form', array('title' => 'Import Parts'))->with(compact('org_id', 'org_dir'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    
    public function process_import_file(ImportPartsRequest $request){
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        
        $auth_result = $request->user()->hasPermission('create_repository');
        
        if($auth_result){    
            $path = "storage/allorgs/part_imports";
            if ($request->hasFile('list_file')) {
                $file = $request->file('list_file');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                HeadingRowFormatter::default('none');
                $headings = Excel::toArray(new HeadingRowImport, storage_path('app/public/allorgs/part_imports/' . $name));
                $request->session()->put('file_name', $name);
                $request->session()->put('headings', $headings);
                return redirect()->route('repository.manage.import_headings_form');
            }
            else{
                Session::flash('import_file_error', 'Import File Could Not Be Processed');
                $view = View::make('pages/repository/manage/import_file_form', array('title' => 'Import Parts'))->with(compact('org_id', 'org_dir'));
                return $view;
            }
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
	
    public function import_headings_form(Request $request){
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        
        $auth_result = $request->user()->hasPermission('create_repository');
        if($auth_result){
            if ($request->session()->has('file_name')) {
                $name = session('file_name');
            }
            if ($request->session()->has('headings')) {
                $headings = session('headings');
            }
            $view = View::make('pages/repository/manage/import_headings_form', array('title' => 'Import Parts'))->with(compact('org_id', 'org_dir', 'headings', 'name'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    
    public function process_import_headings(ProcessImportRequest $request){
        if (Auth::user()->authorizeRoles(array('Super Admin'))){
            $org_id = $request->session()->get('curr_org_id');
        }
        else{
            $org_id = Auth::user()->org_id;
        }
        $organization = Organization::find($org_id);
        $org_dir = $organization->directory;
        
        $auth_result = $request->user()->hasPermission('create_repository');
        
        if($auth_result){
            $failures = 1;
            try {
                $file = storage_path('app/public/allorgs/part_imports/' . $request->name);
                $import = new PartsImport($request->all(), $org_id);
                Excel::import($import, $file);
                $row_count = $import->row_count();
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                 $failures = $e->failures();
            }
            if ($failures == 1){
                $failures = $import->failures();
            }
            $view = View::make('pages/repository/manage/import_parts', array('title' => 'Import Parts'))->with(compact('org_id', 'org_dir', 'failures', 'row_count'));
            return $view;
        }
        else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
    }
    
    public function import_parts(Request $request){
        
        
    }
    
	public function administrate(Request $request)
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
		
    	$auth_result = $request->user()->hasPermission('administrate_repository');
		if($auth_result){
			$types = DB::table('repository_types')->where('active', 1)->select('*')->get();
			$types_tags = DB::table('repository_types AS rt')->select('*')
			->join('repository_types_tags AS rts', 'rt.id', '=', 'rts.type_id')
			->join('repository_tags AS rs', 'rts.tag_id', '=', 'rs.id')	
        	->where('rs.active', 1)->where('rt.active', 1)->orderBy('rt.id')->get()->toArray();
			$tag_bank = DB::table('repository_tags AS rt')->select('*')->whereNotIn('rt.id', function($query){
				$query->select('tag_id')->from('repository_types_tags AS rts')
				->join('repository_types AS rt', 'rts.type_id', '=', 'rt.id')
				->where('rt.active', 1);
			})->where('active', 1)->get();
			$units =  DB::table('repository_units')->where('active', 1)->select('*')->get();
			$colors = DB::table('repository_colors')->where('active', 1)->select('*')->get();
    		$view = View::make('pages/repository/administrate/index', array('title' => 'Administrate Repository'))->with(compact('all_orgs', 'org_dir', 'types', 'types_tags', 'units', 'tag_bank', 'colors'));
			return $view;
    	}
		else{
            return redirect()->route('dashboard')->with(compact('auth_result'));
        }
	}

	public function create_unit(Request $request)
	{
		$unit = $request['unit'];
		$unit_name = trim(strtolower(str_replace(" ", "_", $unit)));
		$alt = $request['alternate_display'];
		$mark = $request['unit_mark'];
		
		$create_unit_result = DB::table('repository_units')->insert(array('name' => $unit_name, 'unit' => $unit, 'alternate_display' => $alt, 'unit_mark' => $mark));
		$unit_id = DB::getPdo()->lastInsertId();
		Event::dispatch(new crmEvent($request->user(), " created a new unit with name " . $unit_name));
		$result = array(1, $unit_id);
		
		echo json_encode($result);
	}
	
	public function delete_unit(Request $request)
	{
		$unit_id = $request['unit_id'];
		
		$delete_unit_result = DB::table('repository_units')->where('id', $unit_id)->update(array('active' => 0));
		Event::dispatch(new crmEvent($request->user(), " deleted unit with id " . $unit_id));
		$result = 1;
		
		echo json_encode($result);
	}

	public function create_color(Request $request)
	{
		$color_name = $request['color_name'];
		$color_code = $request['color_code'];
		
		$create_color_result = DB::table('repository_colors')->insert(array('color_name' => $color_name, 'color_code' => $color_code));
		$color_id = DB::getPdo()->lastInsertId();
		Event::dispatch(new crmEvent($request->user(), " created a new repository color with name " . $color_name));
		$result = array(1, $color_id);
		
		echo json_encode($result);
	}
	
	public function delete_color(Request $request)
	{
		$color_id = $request['color_id'];
		
		$delete_color_result = DB::table('repository_colors')->where('id', $color_id)->update(array('active' => 0));
		Event::dispatch(new crmEvent($request->user(), " deleted color with id " . $color_id));
		$result = 1;
		
		echo json_encode($result);
	}
	
	public function update_type_filter(Request $request)
	{
		$type_id = $request['type_id'];
		
		if ($request['checked']){
			$update_type_filter_result = DB::table('repository_types')->where('id', $type_id)->update(array('is_filter' => 1));
			Event::dispatch(new crmEvent($request->user(), " set filter ON for type " . $type_id));
			$result = 1;
		}
		else{
			Event::dispatch(new crmEvent($request->user(), " unset filter OFF for type " . $type_id));
			$update_type_filter_result = DB::table('repository_types')->where('id', $type_id)->update(array('is_filter' => 0));
			$result = 1;
		}
		
		echo json_encode($result);
	}
	
	public function create_type(Request $request)
	{
		$type_type = $request['type_type'];
		$type_name = trim(strtolower(str_replace(" ", "_", $type_type)));
		$is_filter = $request['is_filter'];
		
		$create_type_result = DB::table('repository_types')->insert(array('name' => $type_name, 'type' => $type_type, 'is_filter' => $is_filter));
		$type_id = DB::getPdo()->lastInsertId();
		Event::dispatch(new crmEvent($request->user(), " created a new type with name " . $type_type));
		$result = array(1, $type_type, $type_id, $is_filter);
		
		echo json_encode($result);
	}

	public function delete_type(Request $request)
	{
		$type_id = $request['type_id'];
		
		$delete_type_result = DB::table('repository_types')->where('id', $type_id)->update(array('active' => 0));
		Event::dispatch(new crmEvent($request->user(), " deleted type with id " . $type_id));
		$result = 1;
		
		echo json_encode($result);
	}
	
	public function create_tag(Request $request)
	{
		$tag = $request['tag'];
		$tag_name = trim(strtolower(str_replace(" ", "_", $tag)));
		
		$create_tag_result = DB::table('repository_tags')->insert(array('name' => $tag_name, 'tag' => $tag, 'active' => 1));
		$tag_id = DB::getPdo()->lastInsertId();
		Event::dispatch(new crmEvent($request->user(), " created a new tag with name " . $tag_name));
		$result = array(1, $tag_id, $tag);
		
		echo json_encode($result);
	}
	
	public function move_tag(Request $request)
	{
		$tag_id = $request['tag_id'];
		$from_type = $request['from_type'];
		$to_type = $request['to_type'];
		
		$move_tag_result = DB::table('repository_types_tags')->where(array(array('type_id', '=', $from_type),array('tag_id', '=', $tag_id)))->delete();
		$move_tag_result = DB::table('repository_types_tags')->insert(array('type_id' => $to_type, 'tag_id' => $tag_id));
		Event::dispatch(new crmEvent($request->user(), " moved tag with id " . $tag_id . " from type " . $from_type . "to type " . $to_type));
		$result = array(1, $tag_id, $from_type, $to_type);
		
		echo json_encode($result);
	}
	
	public function copy_tag(Request $request)
	{
		$tag_id = $request['tag_id'];
		$from_type = $request['from_type'];
		$to_type = $request['to_type'];
		
		$copy_tag_result = DB::table('repository_types_tags')->where([['type_id', '=', $to_type], ['tag_id', '=', $tag_id]])->select('*')->get();
		if (count($copy_tag_result) == 0){
			DB::table('repository_types_tags')->insert(array('type_id' => $to_type, 'tag_id' => $tag_id));
		}
		Event::dispatch(new crmEvent($request->user(), " copied tag with id " . $tag_id . " from type " . $from_type . "to type " . $to_type));
		$result = array(1, $tag_id, $from_type, $to_type);;
		
		echo json_encode($result);
	}
	
	public function remove_tags(Request $request)
	{
		$type_id = $request['type_id'];
		$tags = $request['tags'];
		
		$remove_tag_result = DB::table('repository_types_tags')->where('type_id', $type_id)->whereIn('tag_id', $tags)->delete();
		Event::dispatch(new crmEvent($request->user(), " removed tags from" . $type_id));
		$result = 1;
		
		echo json_encode($result);
	}
	
	public function delete_tags(Request $request)
	{
		$tags = $request['tags'];
		
		$delete_tag_result = DB::table('repository_tags')->whereIn('id', $tags)->update(array('active' => 0));
		Event::dispatch(new crmEvent($request->user(), " deleted tags"));
		$result = 1;
		
		echo json_encode($result);
	}
	private function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;


		if($force_lowercase) {
			if(function_exists('mb_strtolower')) {
				return mb_strtolower($clean, 'UTF-8');
			}
			else {
				return strtolower($clean);
			}
		}
		else {
			return $clean;
		}

		// Outdated previous code
        // return ($force_lowercase) ?
        //     (function_exists('mb_strtolower')) ?
        //         mb_strtolower($clean, 'UTF-8') :
        //         strtolower($clean) :
        //     $clean;
    }


    private function createUniqueFilename( $filename )
    {
        $upload_path = Storage::url('allorgs/temp_part_images/');
        $full_image_path = $upload_path . $filename . '.jpg';

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $image_token = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $image_token;
        }

        return $filename;
    }
}
