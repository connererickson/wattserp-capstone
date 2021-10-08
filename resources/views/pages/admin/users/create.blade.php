@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Create User</div>

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
	                				<?php if ($tab == 'users'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.users.index') }}">Users</a>
	                			</li>
	                			@if (Auth::user()->authorizeRoles(array('God Mode')))
	                			<li 
	                				<?php if ($tab == 'permissions'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.permissions.index') }}">Permissions</a>
	                			</li>
	                			@endif
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'class'=>'crm_form', 'id'=>'roles_form']) !!}
	                		<div class="row">
		                		<div class='col-md-6'>
		                			<div class='form-group'>
		                				{!! Form::hidden('url', url('pages/admin/users/store'), ['id'=>'url']) !!}
			                			{!! Form::label('name', 'Name') !!}
			                			{!! Form::text('name', null, ['class'=>'form-control']) !!}
			                			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('email', 'E-mail') !!}
		                				{!! Form::text('email', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('username', 'Username') !!}
		                				{!! Form::text('username', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::label('password', 'Password') !!}
			                			{!! Form::password('password', ['class'=>'form-control']) !!}
			                			{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::label('password_confirmation', 'Confirm Password ') !!}
			                			{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::submit('Create User', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
			                			<a class='crm_btn2' href='{{ route('admin.users.index') }}'>Cancel</a>
			                		</div>
			                	</div>
			                	<div class='col-md-6'>
			                		<div class='form-group'>
			                			{!! Form::label('role', 'Roles') !!}
			                			<?php $inc = 1; ?>
			                			@foreach($roles as $role)
			                				@if($role->id != 1000 && $role->id != 10001)
				                				<br />
				                				{!! Form::checkbox('role[]', $role->id, false, ['id'=>'checkbox'.$inc, 'class'=>'form-control crm_checkbox']) !!}
				                				{!! Form::label('role', $role->name) !!}
				                				<?php $inc++; ?>
				                			@endif
			                			@endforeach
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
