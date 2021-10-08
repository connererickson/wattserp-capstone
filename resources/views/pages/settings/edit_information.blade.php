@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Information</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
	                <div class="row">
						<div class="col-md-2">
							<ul id='administrate_functions_list' class='functions_list'>
								<li class='sidebar_function'>
									<a href=" {{ route('settings.information') }}" >My Information</a>
								</li>
								<li class='sidebar_function'>
									<a href=" {{ route('settings.security') }}" >Security</a>
								</li>
								<!--<li class='sidebar_function'>
									<a href='#'>Preferences</a>
								</li>-->
							</ul>
						</div>
						<div class="col-md-10">
		                	<div id='edit_directory_form'>
		                		{!! Form::model($user, ['method' => 'PATCH', 'route' => array('settings.update_information', $user->id)]) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
				                			{!! Form::label('username', 'User Name') !!}
				                			{!! Form::text('username', null, ['class'=>'form-control']) !!}
				                			{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('email', 'Email') !!}
			                				{!! Form::text('email', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::submit('Update Information', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                			<a class='crm_btn2' href='{{ route('settings.information') }}'>Cancel</a>
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