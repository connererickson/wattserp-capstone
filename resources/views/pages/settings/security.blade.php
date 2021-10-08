@extends('layouts.account_settings')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Account Settings</div>

                <div class="panel-body" id='administrate_account_settings'>
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
						<?php
						//echo ("<pre>");
						//var_dump($user_data);
						//aecho ("</pre>");
						?>
						<div class="col-md-10">
							<h4>Security</h4>
							<h5>Change Password</h5>
							{!! Form::open(['method'=>'POST', 'action'=>'MySettingsController@update_password', 'class'=>'crm_form']) !!}
							  <div class="col-md-9">             
							    
							    <div class="col-sm-8">
							      <div class="form-group">
							        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							        {!! Form::label('current_password', 'Current Password') !!}
				                	{!! Form::text('current_password', null, ['class'=>'form-control']) !!}
							        {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
							      </div>
							    </div>
							    <div class="col-sm-8">
							      <div class="form-group">
							      	{!! Form::label('password', 'New Password') !!}
				                	{!! Form::text('password', null, ['class'=>'form-control']) !!}
							        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
							      </div>
							    </div>
							    
							    <div class="col-sm-8">
							      <div class="form-group">
							        {!! Form::label('password_confirmation', 'Confirm Password') !!}
				                	{!! Form::text('password_confirmation', null, ['class'=>'form-control']) !!}
							        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
							      </div>
							    </div>
							    <div class="col-sm-8">
							      <div class="form-group">
							        @if(Session::has('msg'))
								      <h5 style='color: #fe8970;'>{{Session::get('msg')}}</h5>
								    @endif
								    @if(Session::has('success'))
								      <h5 style='color: #8CC63F;'>{{Session::get('success')}}</h5>
								    @endif
								  </div>
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-offset-5 col-sm-6">
							      <button type="submit" class="btn btn-danger">Submit</button>
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
