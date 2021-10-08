@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create Portfolio</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-12">
		                	<div id='create_lead_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store_portfolio', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
			                				{!! Form::label('name', 'Enter a new customer or organization name:') !!}
			                				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('nickname', 'Internal Nickname') !!}
			                				{!! Form::text('nickname', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
				                		</div>
					                	{!! Form::submit('Create Portfolio', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                		<a class='crm_btn2' href='{{ route('leads.index') }}'>Cancel</a>
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
