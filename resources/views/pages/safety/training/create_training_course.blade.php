@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Training Course</div>

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
	                				<?php if ($tab == 'overview'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.training_courses') }}">Overview</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'training_courses'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.training.training_courses_index') }}">Training Courses</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'assign_courses'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.training.scheduled_training_index') }}">Schedule Training</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'training_history'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.training.training_results_index') }}">Training Reports</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
		                	<div id='create_training_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'TrainingController@store_training_course', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
				                			{!! Form::label('name', 'Training Course Name') !!}
				                			{!! Form::text('name', null, ['class'=>'form-control']) !!}
				                			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('description', 'Description') !!}
			                				{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::submit('Create Training Course', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                			<a class='crm_btn2' href='{{ route('safety.training.training_courses_index') }}'>Cancel</a>
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