@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Channel Partner User</div>

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
	                				<?php if ($tab == 'sales_members'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('channel_partners') }}">Channel Partners</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
		                	<div id='create_sales_member_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'ChannelPartnersController@store', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div>
			                				You May Only Create A Sales Team Member From An Unassigned Sales User.<br />
			                				Please Contact Your Administrator If The User Is Not Found In The List.
			                			</div>
			                			<br />
			                			<div class='form-group'>
				                			{!! Form::label('unassigned_users', 'Unassigned Users') !!}
				                			<select class='form-control' name='unassigned_users'>
				                				<option value='select'>-- Select --</option>
				                				@foreach($unassigned_users as $unassigned_user)
				                					<option value="{{ $unassigned_user->id }}">{{ $unassigned_user->name }}</option>
				                				@endforeach
				                			</select>
				                			{!! $errors->first('unassigned_users', '<p class="help-block">:message</p>') !!}
				                		</div>
				                	</div>
				                </div>
		                		<div class="row" id='create_employee_row'>
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
			                				{!! Form::label('phone', 'Phone') !!}
			                				{!! Form::text('phone', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('alt_email', 'Secondary Email') !!}
			                				{!! Form::text('alt_email', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('alt_email', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('start_date', 'Start Date') !!}
				                			{!! Form::text('start_date', '', array('class' => 'datepicker form-control')) !!}
				                			{!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::submit('Create Team Member', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                			<a class='crm_btn2' href='{{ route('channel_partners.index') }}'>Cancel</a>
				                		</div>
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
