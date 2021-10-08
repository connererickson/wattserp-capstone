@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create Proposal</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-12">
		                	<div id='create_lead_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store_proposal', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
			                				{!! Form::label('class', 'Select A Primary Project Class:') !!}
			                				<select name="class" id="project_class" class="form-control" required autofocus>
			                					<option value='0'>-- Select --</option>
			                					<option value='Residential'>Residential</option>
			                					<option value='Commercial'>Commercial</option>
			                					<option value='Utility'>Utility</option>
			                				</select>
			                				{!! $errors->first('class', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::hidden('portfolio_id', $portfolio_id, ['class'=>'form-control']) !!}
				                			{!! Form::hidden('org_id', $org_id, ['class'=>'form-control']) !!}
				                			{!! Form::label('internal_nickname', 'Project Name') !!}
				                			{!! Form::text('internal_nickname', null, ['class'=>'form-control']) !!}
				                			{!! $errors->first('internal_nickname', '<p class="help-block">:message</p>') !!}
				                		</div>
					                	{!! Form::submit('Create Proposal', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                		<a class='crm_btn2' href='{{ route('leads.portfolio', $portfolio_id) }}'>Cancel</a>
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
