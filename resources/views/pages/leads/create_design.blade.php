@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create Design</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-12">
		                	<div id='create_lead_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store_design', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
				                		<div class='form-group'>
				                			{!! Form::hidden('proposal_id', $proposal_id, ['class'=>'form-control']) !!}
				                			{!! Form::label('name', 'Design Name') !!}
				                			{!! Form::text('name', null, ['class'=>'form-control']) !!}
				                			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				                		</div>
			                			<!-- THERE IS SELECT ELEMENT FOR "DESIGN CATEGORY" IN THE PROJECT DOCUMENTATION - I WASNT SURE WHY I CREATED IT -->
				                		<div class='form-group'>
			                				{!! Form::label('description', 'Enter a description of the design') !!}
			                				{!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 6, 'cols' => 40]) !!}
			                				{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
				                		</div>
					                	{!! Form::submit('Create Design', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                		<a class='crm_btn2' href='{{ route('leads.proposal', $proposal_id) }}'>Cancel</a>
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
