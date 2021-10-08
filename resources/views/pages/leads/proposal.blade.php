@extends('layouts.projects')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                	{{ $portfolio['name'] }} > {{ $proposal->internal_nickname }} ({{ $proposal->class }})
                	@if (Auth::user()->hasPermission('create_project_leads'))
	        			<a class='crm_btn2 right_side' href="{{ route('leads.create_design', $proposal->id )}}">Create New Design<i class="fas fas_right fa-pencil-ruler"></i></a>
	        			<a class='crm_btn2 right_side right_pad' href="{{ route('leads.portfolio', $portfolio['id'] )}}"><i class="fas fas_left fa-caret-left"></i> Return to Portfolio</a>
	        		@endif
	        		<br class='clear_fix'/>
                </div>

                <div class="panel-body">
                	
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                    	<div class="col-md-12">
							@if(Session::has('created_design'))
		            			<p class='bg_success'>{{ Session('created_design') }}</p>
		            		@endif
		            		@if(Session::has('updated_design'))
		            			<p class='bg_success'>{{ Session('updated_design') }}</p>
		            		@endif
		            		@if(Session::has('updated_address'))
		            			<p class='bg_success'>{{ Session('updated_address') }}</p>
		            		@endif
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-md-10">
            				<div class="row" id='address_display'>
			                	<div class="col-md-6">
			                		<h3>Address</h3>
			                		<div class="row">
			                			<div class='project_address col-md-12'>
											<a id='edit_project_address'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon edit_address" /></a>
											<span class='proposal_address'>
												@if (count($address) && $address['address'] != '')
													{{ $address['address'] }}
												@else
													12345 W. Nothing Rd.
												@endif
											</span>
											<br />
											<span class='proposal_city'>
												@if (count($address) && $address['city'] != '')
													{{ $address['city'] }},
												@else
													Nothingsburg,
												@endif
											</span>
											<span class='proposal_state'>
												@if (count($address) && $address['state'] != '')
													{{ $address['state'] }}
												@else
													AZ
												@endif
											</span>
											<span class='proposal_zip'>
												@if (count($address) && $address['zip'] != '')
													{{ $address['zip'] }}
												@else
													85000
												@endif
											</span>
										</div>
			                		</div>
			                	</div>
			                	<div class="col-md-6" id='meters'>
			                		<h3>Meters</h3>
			                		@if (!count($address))
			                		   <span id='meters_note'>You may add meters once the address is completed</span>
			                		@else
			                		   <a href="{{ route('leads.settings.index') }}" id='add_meter'><i class="fas fas_right fa-plus-square"></i></a>
			                		@endif
			                		<div class="row">
			                			
			                		</div>
			                	</div>
			                	<div class='col-md-12'>
			                		<div id='edit_project_address_form'>
			                			@if (count($address))
			                				{!! Form::model($address, ['method' => 'PATCH', 'route' => array('leads.update_project_address', $address['id'])]) !!}
			                			@else
					                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store_project_address', 'class'=>'crm_form']) !!}
					                	@endif
				                			<div class='form-group'>
				                				{!! Form::hidden('project_id', $proposal['id'], ['id'=>'proposal_id']) !!}
				                				@if (count($address))
				                					{!! Form::hidden('address_id', $address['id'], ['id'=>'contact_id']) !!}
				                				@else
				                					{!! Form::hidden('address_id', null, ['id'=>'contact_id']) !!}
				                				@endif
				                				
					                			{!! Form::label('state', 'State') !!}
					                			<select id='state' name='state' class='form-control'>
					                				<option value='0'>-- Select --</option>
					                				@foreach($states as $state)
					                					<option value='{{ $state }}'>{{ $state }}</option>
					                				@endforeach
					                			</select>
					                			{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
						                	</div>
						                	<div class='loader' id='county_loader'>
						                		<img src="{{ URL::asset( 'images/loading3.gif') }}" alt='' />
						                	</div>
						                	<div id='project_address_form_part_county'>
						                		<div class='form-group'>
					                				{!! Form::label('county', 'County') !!}
						                			<select id='county' name='county' class='form-control'></select>
						                			{!! $errors->first('county', '<p class="help-block">:message</p>') !!}
					                			</div>
					                		</div>
				                			<div id='project_address_form_part_apn' class='col-md-6 no_pad_left'>
				                				<div class='form-group'>
						                			{!! Form::label('apn', 'Parcel / APN #') !!}
						                			{!! Form::text('apn', null, ['class'=>'form-control']) !!}
						                			{!! $errors->first('apn', '<p class="help-block">:message</p>') !!}
						                		</div>
						                		<div id='county_records_data'>
					                				
					                			</div>
				                			</div>
				                			<div id='project_address_form_part_address' class='col-md-6 no_pad_right'>
					                			<div class='form-group'>
						                			{!! Form::label('address', 'Address') !!}
						                			{!! Form::text('address', null, ['class'=>'form-control']) !!}
						                			{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
						                		</div>
						                		<div class='form-group'>
					                				{!! Form::label('city', 'City') !!}
					                				{!! Form::text('city', null, ['class'=>'form-control']) !!}
					                				{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
						                		</div>
						                		<div class='form-group'>
					                				{!! Form::label('zip', 'Zip Code') !!}
					                				{!! Form::text('zip', null, ['class'=>'form-control']) !!}
					                				{!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
						                		</div>
						                	</div>
					                		<br />
					                		<div id='project_address_submit_button'>
						                		<div class='form-group'>
						                			{!! Form::submit('Update Address', ['class'=>'crm_btn', 'id'=>'submit_address_form']) !!}
						                		</div>
						                	</div>
						                	<a class='crm_btn2' id='cancel_edit_project_address' href='#'>Cancel</a>
					                	{!! Form::close() !!}
					                </div>
	                			</div>
	                		</div>
	                	</div>
	                	<div class="col-md-2" id='designs'>
	                       <h4>Designs</h4>
	                       @if(count($designs))
	                           @foreach($designs as $design)
	                               <div class='design_listing' id='{{ $design['id'] }}'>
	                                   <a href="{{ route('leads.design', $design['id'] ) }}">{{ $design['name'] }}</a>
	                               </div>
	                           @endforeach
	                       @else
	                       <span>No Designs</span>
	                       @endif
	                	</div>
	            	</div>
	            	<hr />
	            	<div class="row">
	            		<div class="col-md-12" id='project_properties'>
	            			<h3>Project Attributes</h3>
	            			<span>Check all that apply:</span>
	            			<?php $curr_cat = ""; ?>
	            			<div class="row">
	            				@if ($meta_attributes)
									@foreach($meta_attributes as $attribute)
										@if ($curr_cat != $attribute->category)
											@if ($curr_cat != "")
												</div>
											@endif
											<?php $curr_cat = $attribute->category; ?>
											<div class="col-md-4 property_category">
											<h5>{{ $curr_cat }}</h5>
										@endif
										<div id='{{ $attribute->tag }}' class='attribute_display'>
											<?php $checked = ""; ?>
											@foreach($proposal_attributes as $proposal_attribute)
												@if ($attribute->tag == $proposal_attribute->tag)
													<?php $checked = 'checked'; ?>
												@endif
											@endforeach
											<input type='checkbox' {{ $checked }} name='attribute' id='{{ $proposal->id }}'/>
											{{ $attribute->display }}
										</div>
									@endforeach
									</div>
								@endif
	            			</div>
	            		</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
