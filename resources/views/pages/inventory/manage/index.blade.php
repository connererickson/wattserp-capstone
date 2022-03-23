@extends('layouts.inventory')

@section('content')
<style>
	thead th {
		font-size: 1rem;
	}
	.no-border-top {
		border-top: none;
	}
</style>
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
									<div class="col d-flex justify-content-end">
										<p class="" id="part_stock" style="margin: auto 0;"></p>
									</div>
									<div class="col d-flex justify-content-start">
										<button id="remove_stock_button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#RemoveStockModal" hidden>Remove Stock</button>
									</div>
								</div>
								<div id="low_stock_notification_div" class="form-check mt-1" hidden>
									<input class="form-check-input" type="checkbox" id="low_stock_notification">
									<label for="low_stock_notifications" class="form-check-label">Enable low-stock notification for this part</label>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
	<!-- Edit Price Modal -->
	<div class="modal fade" id="EditPriceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditPriceModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="EditPriceModalTitle">Edit Price</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<table class="table table-striped no-border-top" style="border-top: none;">
						<thead>
							<tr>
								<th scope="col">Vendor</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody class="stock_table no-border-top">
							
						</tbody>
						
					</table>
					<label for="edit_price_input" class="form-label">Enter the new price here:</label>
					<input id="edit_price_input" type="number" class="form-control text-center"/>
				</div>
				<div class="modal-footer">
					<button id="change_price_button_modal" type="button" class="btn btn-success">Change Price</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Purchase Stock Modal -->
	<div class="modal fade" id="PurchaseStockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="PurchaseStockModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="PurchaseStockModalTitle">Purchase Stock</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<table class="table table-striped no-border-top">
						<thead>
							<tr>
								<th scope="col">Vendor</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody class="stock_table no-border-top">
							
						</tbody>
						
					</table>
					<label for="edit_price_input" class="form-label">Enter the quantity to be purchased:</label>
					<input id="purchase_stock_input" type="number" class="form-control text-center"/>
				</div>
				<div class="modal-footer">
					<button id="purchase_button_modal" type="button" class="btn btn-success">Purchase</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Remove Stock Modal -->
	<div class="modal fade" id="RemoveStockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="RemoveStockModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="RemoveStockModalTitle">Remove Stock</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<table class="table table-striped no-border-top">
						<thead>
							<tr>
								<th scope="col">Vendor</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody class="stock_table no-border-top">
							
						</tbody>
						
					</table>
					<label for="edit_price_input" class="form-label">Enter the quantity to be removed: </label>
					<input id="remove_stock_input" type="number" class="form-control text-center"/>
					<div class="form-text text-muted">Stock will be removed starting with the oldest purchase date.</div>
				</div>
				<div class="modal-footer">
					<button id="remove_button_modal" type="button" class="btn btn-success">Remove</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

