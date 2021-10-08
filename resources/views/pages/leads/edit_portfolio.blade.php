@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Update Portfolio</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-12">
		                	<div id='create_lead_form'>
		                		{!! Form::model($portfolio, ['method' => 'PATCH', 'route' => array('leads.update_portfolio', $portfolio->id)]) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
			                				{!! Form::label('name', 'Customer or Organization Name:') !!}
			                				{!! Form::text('name', $portfolio->name, ['class'=>'form-control']) !!}
			                				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('nickname', 'Internal Nickname') !!}
			                				{!! Form::text('nickname', $portfolio->nickname, ['class'=>'form-control']) !!}
			                				{!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
				                		</div>   
					                	{!! Form::submit('Update Portfolio', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
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
