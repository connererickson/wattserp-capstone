@extends('layouts.inventory')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Manage Inventory</div>

                <div class="card-body" id='inventory_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
										<img id="part_image" data-src="{{ URL::asset( 'storage/allorgs/repository/') }}" src="" alt="" />
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
											<tr>
												<td class="part_heading">Pricing Unit:</td>
												<td class="part_data" id="part_pricing_unit"></td>
												<td class='part_hidden_data' id='part_alternate_display'></td>
											</tr>
											<tr>
												<td class="part_heading">Location:</td>
												<td class="part_data" id="part_location"></td>
											</tr>
										</table>
										<hr />
										<div id='part_barcode'>
											<img id="part_barcode_image" data-src="{{ URL::asset('storage/allorgs/part_barcodes') }}" src="" alt="" />
										</div>
									</div>
									<div class="col-md-8" id="part_tags">
										<p class="part_heading">Tags:</p>
										<div id='loader_frame'><img src="{{ URL::asset( 'images/loading2.gif') }}" alt='' /></div>
										<div id="part_tags_container">
										</div>
										<hr />
										<p class="part_heading">Vendors:</p>
										<div id='vendors_container'>
											<table id='vendors_table_inventory'>
												
											</table>
										</div>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="text-center">
										@if (Auth::user()->hasPermission('edit_inventory'))
												{!! Form::label('update_stock', 'Enter quantity:') !!}
												<br />
												{!! Form::text('update_stock', null, ['class'=>'form-control', 'id'=>'update_stock']) !!}
												<br />
												{{-- This needs to be fixed --}}
												{!! Form::submit('Remove Stock', ['class'=>'btn btn-primary btn-sm', 'id'=>'update_stock_button']) !!}
											@else
												&nbsp;
											@endif
										</div>
								</div>
								<div class="row">
									<table>
										<tr>
											<td class="part_heading_big">Stock:</td>
											<td class="part_data_big" id="part_stock"></td>
										</tr>
									</table>

									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">Vendor</th>
												<th scope="col">Price</th>
												<th scope="col">Quantity</th>
												<th scope="col">Date</th>
											</tr>
										</thead>
										<tbody id="stock_table">
											
										</tbody>
										
									</table>
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

