@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Emergency Contact</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'employees'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('employees') }}">Employees</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
		                	<div id='create_ec_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'EmployeesController@store_ec', 'class'=>'crm_form']) !!}
		                		<div class='col-md-6'>
		                			<div class='form-group'>
		                				{!! Form::hidden('employee_id', $employee_id, ['id'=>'employee_id']) !!}
			                			{!! Form::label('first_name', 'First Name') !!}
			                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
			                			{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('middle_name', 'Middle Name') !!}
		                				{!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('last_name', 'Last Name') !!}
		                				{!! Form::text('last_name', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
			                		</div>
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
		                				{!! Form::label('state', 'State') !!}
		                				{!! Form::select('state', $states, 'AZ', ['class'=>'form-control']) !!}
		                				{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('zip', 'Zip') !!}
		                				{!! Form::text('zip', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('cell_phone', 'Phone') !!}
		                				{!! Form::text('cell_phone', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('cell_phone', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('email1', 'Email') !!}
		                				{!! Form::text('email1', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('email1', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::submit('Create Emergency Contact', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
			                			<a class='crm_btn2' href='{{ route('employees.employee', ['id' => $employee_id]) }}'>Cancel</a>
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
