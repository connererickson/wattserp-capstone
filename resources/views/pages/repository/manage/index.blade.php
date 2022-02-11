@extends('layouts.inventory')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Manage Repository</div>

                <div class="card-body" id='repository_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class='crm_btn2 right_side fas_right' href="{{ route('repository.manage.upload_import_file' )}}">Import Parts</a>
                    <a class='crm_btn2 right_side' href="{{ route('repository.manage.create_part' )}}">Add New Part</a>
                    <div class="row">
                    	<div class="col-md-12">
                    		@if(Session::has('created_part'))
	                			<p class='bg_success'>{{ Session('created_part') }}</p>
	                		@endif
                    	</div>
                    </div>
					<div class="row">
						<div class="col-md-8">
							<!--id = 'repository_tools_container'-->
							<div id=''>
								<div class="row">
									<div class="col-md-4">
										<label class="form-label" for='filter'>Filter:</label>
										<br />
										<select class="form-control" name='filter'>
											<option value='0'>All</option>
											@foreach ($filters as $filter)
												@if ($filter->is_filter)
													<option value='{{ $filter->id }}'>{{ $filter->type }}</option>
												@endif
											@endforeach"
										</select>
									</div>
									<div class="col-md-4">
										<label class="form-label" for='sort'>Sort By:</label>
										<br />
										<select class="form-control" name='sort'>
											<option value="">None</option>
											<option value='type'>Type</option>
											<option value='color'>Color</option>
											<option value='weight'>Weight</option>
											<option value='price'>Price</option>
											<option value='manufacturer'>Manufacturer</option>
											<option value='unit'>Unit</option>
											<option value='volts'>Volts</option>
											<option value='watts'>Watts</option>
											<option value='amps'>Amps</option>
										</select>
									</div>
									<div class="col-md-4">
										<label class="form-label" for='search'>Search:</label>
										<br />
										<input class="form-control" type='text' name='search_repo' />
									</div>
								</div>
							</div>
							<div id='repository_list'>
								<div id='loader'><img src="{{ URL::asset( 'images/loading.gif') }}" alt='' /></div>
							</div>
						</div>
						<div class="col-md-4">
							<div id="repository_preview_pane">
								<div class="row">
									<div class="col-md-4" id="part_image_container">
										<img id="part_image" src="{{ URL::asset( 'images/materials.png') }}" alt="" />
										<div id='part_image_modal'>
											<div id='edit_part_image'>
												<div id='cropContainerEyecandy'></div>
											</div>
										</div>
									</div>
									<div class="col-md-8" id="part_titles">
										<table>
											<tr>
												<td class="part_heading">Part Number:</td>
												<td class="part_data" id="part_number"></td>
											</tr>
											<tr>
												<td class="part_heading">Part Sku:</td>
												<td class="part_data" id="part_sku"></td>
												<td class="part_hidden_data" id="part_id"></td>
											</tr>
											<tr>
												<td class="part_heading">Manufacturer:</td>
												<td class="part_data" id="part_manufacturer"></td>
											</tr>
										</table>
										<p class="part_heading">Description:</p>
										<p class="part_data" id="part_description"></p>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-4" id="part_details">
										<table>
											<tr>
												<td class="part_heading">Part Type:</td>
												<td class="part_data" id="part_type"></td>
											</tr>
											<tr>
												<td class="part_heading">Length:</td>
												<td class="part_data" id="part_length"></td>
											</tr>
											<tr>
												<td class="part_heading">Width:</td>
												<td class="part_data" id="part_width"></td>
											</tr>
											<tr>
												<td class="part_heading">Height:</td>
												<td class="part_data" id="part_height"></td>
											</tr>
											<tr>
												<td class="part_heading">Weight:</td>
												<td class="part_data" id="part_weight"></td>
											</tr>
											<tr>
												<td class="part_heading">Color:</td>
												<td class="part_data" id="part_color"></td>
											</tr>
											<tr>
												<td class="part_heading">Volts:</td>
												<td class="part_data" id="part_volts"></td>
											</tr>
											<tr>
												<td class="part_heading">Amps:</td>
												<td class="part_data" id="part_amps"></td>
											</tr>
											<tr>
												<td class="part_heading">Watts:</td>
												<td class="part_data" id="part_watts"></td>
											</tr>
											<!--<tr>
												<td class="part_heading">Gauge:</td>
												<td class="part_data" id="part_gauge"></td>
											</tr>-->
											<tr>
												<td class="part_heading">Pricing Unit:</td>
												<td class="part_data" id="part_pricing_unit"></td>
												<td class='part_hidden_data' id='part_pricing_alternate_display'></td>
											</tr>
											<tr>
												<td class="part_heading">Stocking Unit:</td>
												<td class="part_data" id="part_stocking_unit"></td>
												<td class='part_hidden_data' id='part_stocking_alternate_display'></td>
											</tr>
											<tr>
												<td class="part_heading">Location:</td>
												<td class="part_data" id="part_location"></td>
											</tr>
										</table>
										<hr />
										<div id='part_barcode'>
											<img id="part_barcode_image" src="" alt="" />
										</div>
										<a id='barcode_print_button' href='#null'>Print Barcode</a>
									</div>
						            <div class="col-md-8" id="part_documentation">
									   <p class="part_heading">Documents:</p>
									   <form id="fileinfo" enctype="multipart/form-data" method="post">
                                           <input type="file" name="part_document" class='file_input' required />
                                           <input type="button" style="float:right;" class='crm_btn file_upload_go' id='document_upload' value="Go"/>
                                       </form>
									   <div id='document_list'>No Documents</div>
									   <hr />
									</div>
									<div class="col-md-8" id="part_tags">
										<p class="part_heading">Tags:</p>
										<div id='loader_frame'><img src="{{ URL::asset('images/loading2.gif') }}" alt='' /></div>
										<div id="part_tags_container"></div>
										<hr />
									</div>
									<div class="col-md-8" id="part_vedors">
										<p class="part_heading">Vendors:</p>
										<div id='vendors_container'>
											<table id='vendors_table'>
												
											</table>
											@if ($vendors)
												<table id='new_vendor_table'>
													<tr>
														<td>
															{!! Form::label('vendor', 'Vendor') !!}
															<select name='vendor' class='form-control' id='vendor_select'>
																<option value='0'>-- Select --</option>
																@foreach($vendors as $vendor)
																<option value='{{ $vendor->id }}'> {{ $vendor->company_name }}</option>
																@endforeach
															</select>
														</td>
														<td>
															{!! Form::label('vendor_price', 'Vendor Price') !!}
				                							{!! Form::text('vendor_price', null, ['class'=>'form-control', 'id'=>'vendor_price']) !!}
														</td>
														<td>
															{!! Form::submit('Add Vendor', ['class'=>'crm_btn', 'id'=>'add_vendor_button']) !!}
														</td>
													</tr>
												</table>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="edit_part_button_container">
										<a href="" class="crm_btn" id='edit_part_button'>Edit Part</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

