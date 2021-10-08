@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Training Course</div>

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
	                		@if(Session::has('created_slide'))
	                			<p class='bg_success'>{{ Session('created_slide') }}</p>
	                		@endif
	                		@if(Session::has('updated_slide'))
	                			<p class='bg_success'>{{ Session('updated_slide') }}</p>
	                		@endif
		                	<div id='edit_training_form'>
		                		{!! Form::model($training_course, ['method' => 'PATCH', 'route' => array('safety.training.update_training_course', $training_course->id)]) !!}
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
				                			{!! Form::submit('Update Training Course', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                			<a class='crm_btn2' href='{{ route('safety.training.training_courses_index') }}'>Cancel</a>
				                		</div>
				                	</div>
				                	<div class='col-md-6' id='slides_area'>
				                		<h5 id='slides_heading'>Slides (Click and Drag to Re-Order)</h5>
				                		<a id='add_slide_button' class='crm_btn2' href="{{ route('safety.training.slides.create_slide', ['training_course_id' => $training_course->id]) }}">Add Slide</a>
				                		@foreach ($slides as $slide)
				                			<div class='slide' id='{{ $slide->id }}' data-order='{{ $slide->slide_order }}'>
				                				<h5 class='slide_name draggable'> {{ $slide->slide_order . ". " . $slide->name }}</h5>
				                				<div class='target' id='{{ $slide->id }}' data-order='{{ $slide->slide_order }}'></div>
				                				<div class='slide_inner'>
				                					<div class='slide_img'>
				                						<img src="{{ URL::asset('storage/training/slides/' . $slide->id . '/' . $slide->image) }}" alt='' />
				                					</div>
				                					<div class='slide_audio'>
				                						<audio controls>
													  		<source src="{{ URL::asset('storage/training/slides/' . $slide->id . '/' . $slide->audio) }}" type="audio/mp3">
													  		<p>Your browser doesn't support HTML5 audio.</p>
														</audio>
				                					</div>
				                					<div class='slide_time'>
				                						Slide Time: {{ $slide->seconds }}
				                					</div>
				                					<div class='slide_created'>
				                						Created: {{ $slide->created_at->format('M d Y g:i a') }}
				                					</div>
				                					<div class='slide_updated'>
				                						Updated: {{ $slide->updated_at->format('M d Y g:i a') }}
				                					</div>
				                					<a class='crm_btn_red delete_slide' id='{{ $slide->id }}' href='#'>Delete Slide</a>
				                					<button class='crm_btn'><a href="{{ route('safety.training.slides.edit_slide', ['slide_id' => $slide->id]) }}">Edit Slide</a></button>
				                				</div>
				                			</div>
				                		@endforeach
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