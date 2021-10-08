@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create Lead</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-12">
		                	<div id='create_lead_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
				                		<div class='form-group'>
				                			{!! Form::label('category', 'Primary Lead Category (You Can Add Features Later, If Needed)') !!}
				                			{!! Form::select('category', array('0' => '-- Select --', '1' => 'Solar PV Only', '2' => 'Solar PV with Storage', '3' => 'Solar PV with Steel Canopy(ies)', '4' => 'Building Integrated PV', '5' => 'Tech/Repair', '6' => 'General Electrical', '7' => 'General Construction'), null, ['class' => 'form-control']) !!}
				                			{!! $errors->first('category', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('project_class', 'Lead Class') !!}
				                			{!! Form::select('project_class', array('0' => '-- Select --', '1' => 'Residential', '2' => 'Commercial', '3' => 'Utility'), null, ['class' => 'form-control']) !!}
				                			{!! $errors->first('project_class', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('expansion', 'Is this an expansion to an existing project?') !!}
				                			{!! Form::select('expansion', array('0' => '-- Select --', '1' => 'Yes', '2' => 'No'), null, ['class' => 'form-control']) !!}
				                			{!! $errors->first('expansion', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div id='existing_project'>
				                			<div class='form-group'>
				                				{!! Form::label('existing_proj', 'Starting typing an existing customer:') !!}
				                				{!! Form::text('existing_proj', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('existing_proj', '<p class="help-block">:message</p>') !!}
					                		</div>
				                		</div>
				                		<div id='commercial'>
				                			<span class='form_instruction'>If the project is one of many projects/locations that exist or may exist under a single organization:</span>
				                			<div class='form-group'>
				                				{!! Form::label('project_corporations', 'Select an existing organization from the list below:') !!}
				                				{!! Form::select('project_corporations', $cos, null, ['class' => 'form-control']) !!}
				                				{!! $errors->first('project_corporations', '<p class="help-block">:message</p>') !!}
				                			</div>
				                			<div class='form-group'>
				                				{!! Form::label('corporate_organization', 'Or, Enter a new organization name here:') !!}
				                				{!! Form::text('corporate_organization', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('corporate_organization', '<p class="help-block">:message</p>') !!}
					                		</div>
					                		<span class='form_instruction' id='multiple'>Enter the specific Corporate name of the next project:</span>
					                		<br />
					                		<span class='form_instruction' id='single'>Or, If the project is a single Corporation or LLC with one location:</span>
					                		<div class='form-group'>
				                				{!! Form::label('corporate_name', 'Enter the Corporate name:') !!}
				                				{!! Form::text('corporate_name', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('corporate_name', '<p class="help-block">:message</p>') !!}
					                		</div>
					                		<div class='form-group'>
				                				{!! Form::label('internal_nickname', 'Internal Nickname') !!}
				                				{!! Form::text('internal_nickname', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('internal_nickname', '<p class="help-block">:message</p>') !!}
					                		</div>
					                	</div>
					                	<hr />
					                	<div id='residential'>
					                		<div class="row">
					                			<div class='col-md-12'>
					                				<span class='form_instruction'>Add a new project to an existing customer contact or create a new contact:</span>
						                			<div class='form-group'>
						                				{!! Form::label('existing_contact', 'Starting typing an existing customer contact:') !!}
						                				{!! Form::text('existing_contact', null, ['class'=>'form-control']) !!}
						                				{!! Form::hidden('existing_contact_id', null) !!}
						                				{!! $errors->first('existing_contact', '<p class="help-block">:message</p>') !!}
						                				
							                		</div>
							                	</div>
					                		</div>
					                		<div id='new_contact'>
						                		<span class='form_instruction'>New Contact:</span>
						                		<div class="row">
				                					<div class='col-md-4'>
								                		<div class='form-group'>
							                				{!! Form::label('res_first_name', 'First Name:') !!}
							                				{!! Form::text('res_first_name', null, ['class'=>'form-control']) !!}
							                				{!! $errors->first('res_first_name', '<p class="help-block">:message</p>') !!}
								                		</div>
								                	</div>
								                	<div class='col-md-4'>
								                		<div class='form-group'>
							                				{!! Form::label('res_middle_name', 'Middle Name:') !!}
							                				{!! Form::text('res_middle_name', null, ['class'=>'form-control']) !!}
							                				{!! $errors->first('res_middle_name', '<p class="help-block">:message</p>') !!}
								                		</div>
								                	</div>
								                	<div class='col-md-4'>
								                		<div class='form-group'>
							                				{!! Form::label('res_last_name', 'Last Name:') !!}
							                				{!! Form::text('res_last_name', null, ['class'=>'form-control']) !!}
							                				{!! $errors->first('res_last_name', '<p class="help-block">:message</p>') !!}
								                		</div>
								                	</div>
								                </div>
								                <div class="row">
								                	<div class='col-md-6'>
								                		<div class='form-group'>
							                				{!! Form::label('res_phone', 'Phone:') !!}
							                				{!! Form::text('res_phone', null, ['class'=>'form-control']) !!}
							                				{!! $errors->first('res_phone', '<p class="help-block">:message</p>') !!}
								                		</div>
								                	</div>
								                	<div class='col-md-6'>
								                		<div class='form-group'>
							                				{!! Form::label('res_cell', 'Cell:') !!}
							                				{!! Form::text('res_cell', null, ['class'=>'form-control']) !!}
							                				{!! $errors->first('res_cell', '<p class="help-block">:message</p>') !!}
								                		</div>
								                	</div>
								                </div>
						                		<div class='form-group'>
					                				{!! Form::label('res_email', 'Email:') !!}
					                				{!! Form::text('res_email', null, ['class'=>'form-control']) !!}
					                				{!! $errors->first('res_email', '<p class="help-block">:message</p>') !!}
						                		</div>
						                		<div>* You may create additional contacts once the lead is entered.</div>
						                	</div>
						                </div>
						                <div id="address_section">
					                		<h4>Address:</h4>
					                		<div class="row">
							                	<div class='col-md-6'>
							                		<div class='form-group'>
						                				{!! Form::label('parcel', 'Parcel #:') !!}
						                				{!! Form::text('parcel', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('parcel', '<p class="help-block">:message</p>') !!}
							                		</div>
							                	</div>
							                	<div class='col-md-6'>
							                		<div class='form-group'>
						                				{!! Form::label('jurisdiction', 'Jurisdiction:') !!}
						                				{!! Form::text('jurisdiction', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('jurisdiction', '<p class="help-block">:message</p>') !!}
							                		</div>
							                	</div>
							                </div>
				                			<div class='form-group'>
				                				{!! Form::label('address', 'Address:') !!}
				                				{!! Form::text('address', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
					                		</div>
					                		<div class="row">
			                					<div class='col-md-6'>
							                		<div class='form-group'>
						                				{!! Form::label('city', 'City:') !!}
						                				{!! Form::text('city', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
							                		</div>
							                	</div>
							                	<div class='col-md-3'>
							                		<div class='form-group'>
						                				{!! Form::label('state', 'State:') !!}
						                				{!! Form::select('state', $states, 'AZ', ['class'=>'form-control']) !!}
						                				{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
							                		</div>
							                	</div>
							                	<div class='col-md-3'>
							                		<div class='form-group'>
						                				{!! Form::label('zip', 'Zip:') !!}
						                				{!! Form::text('zip', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
							                		</div>
							                	</div>
							                </div>
					                		<div class='form-group'>
				                				{!! Form::label('subdivision', 'Subdivision:') !!}
				                				{!! Form::text('subdivision', null, ['class'=>'form-control']) !!}
				                				{!! $errors->first('subdivision', '<p class="help-block">:message</p>') !!}
					                		</div>
					                		<div class="row">
			                					<div class='col-md-6'>
			                						<div class='form-group'>
						                				{!! Form::label('zoning', 'Zoning:') !!}
						                				{!! Form::text('subdivision', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('subdivision', '<p class="help-block">:message</p>') !!}
							                		</div>
			                					</div>
			                					<div class='col-md-6'>
			                						<div class='form-group'>
						                				{!! Form::label('lot', 'Lot #:') !!}
						                				{!! Form::text('lot', null, ['class'=>'form-control']) !!}
						                				{!! $errors->first('lot', '<p class="help-block">:message</p>') !!}
							                		</div>
			                					</div>
			                				</div>
			                				{!! Form::label('utility', 'Utility:') !!}
			                				@if ($utilities)
				                				<div class='form-group'>
						                			<select class='form-control' name='utility'>
						                				@foreach($utilities as $utility)
						                					<option value='{{ $utility->id }}'>{{ $utility->company_name }}</option>
						                				@endforeach
						                			</select>
						                			{!! $errors->first('utility', '<p class="help-block">:message</p>') !!}
						                		</div>
						                	@endif
						                	<div>* You may create additional addresses once the lead is entered.</div>
						                	<br />
						                </div>
					                	{!! Form::submit('Create Lead', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                		<a class='crm_btn2' href='{{ route('projects.index') }}'>Cancel</a>
				                	</div>
				                	<div class='col-md-6'>
				                		&nbsp;
				                	</div>
				                </div>
				              	{!! Form::close() !!}
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
