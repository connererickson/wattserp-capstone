@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Employee</div>

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
	                <?php
	             	//echo "<pre>";
					//print_r(( isset($employee) ? $employee : null ));
					//echo "</pre>";
					?>
	                <div class="row">
	                	<div class="col-md-12">
	                		{!! Form::model($employee, ['method' => 'PATCH', 'route' => array('employees.update', $employee->id)]) !!}
	                		<div class="row">
		                		<div class='col-md-6'>
		                			<div class='form-group'>
		                				{!! Form::hidden('user_id', null, ['id'=>'user_id']) !!}
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
		                				{!! Form::text('address', ( isset($employee->address->first()->address) ? $employee->address->first()->address : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('city', 'City') !!}
		                				{!! Form::text('city', ( isset($employee->address->first()->city) ? $employee->address->first()->city : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('state', 'State') !!}
		                				{!! Form::select('state', $states, ( isset($employee->address->first()->state) ? $employee->address->first()->state : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('zip', 'Zip') !!}
		                				{!! Form::text('zip', ( isset($employee->address->first()->zip) ? $employee->address->first()->zip : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('phone', 'Phone') !!}
		                				{!! Form::text('phone', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('ssn', 'SSN') !!}
		                				{!! Form::text('ssn', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('ssn', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::label('hire_date', 'Hire Date') !!}
			                			{!! Form::text('hire_date', date('m/d/Y', strtotime($employee->hire_date)), array('class' => 'datepicker form-control')) !!}
			                			{!! $errors->first('hire_date', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::label('dob', 'DOB') !!}
			                			{!! Form::text('dob', date('m/d/Y', strtotime($employee->dob)), array('class' => 'datepicker form-control')) !!}
			                			{!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::submit('Update Employee', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
			                			<a class='crm_btn2' href='{{ route('employees.index') }}'>Cancel</a>
			                		</div>
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
@endsection
