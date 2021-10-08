@extends('layouts.training_course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Training Courses</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
	                	<div class="col-md-9">
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
	                			@if (Auth::user()->hasPermission('create_edit_assign_training'))
		                			<li 
		                				<?php if ($tab == 'assign_courses'){
		                					echo "class='current_tab'";
		                				}?>
		                				><a href="{{ route('safety.training.scheduled_training_index') }}">Schedule Training</a>
		                			</li>
	                			@endif
	                			<li 
	                				<?php if ($tab == 'training_history'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.training.training_results_index') }}">Training Reports</a>
	                			</li>
	                		</ul>
	                	</div>
	                	<div class="col-md-3">
	                	    @if (Auth::user()->hasPermission('create_edit_assign_training'))
                                <a class='crm_btn2 right_side' href="{{ route('safety.training.create_training_course' )}}">Create New Training Course</a>
                            @endif
	                	</div>
	                </div>
                    
                    <div class="row" id='audits_table'>
	                	<div class="col-md-12">
	                		@if(Session::has('created_training_course'))
	                			<p class='bg_success'>{{ Session('created_training_course') }}</p>
	                		@endif
	                		@if(Session::has('updated_training_course'))
	                			<p class='bg_success'>{{ Session('updated_training_course') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					<th>ID</th>
	                					<th>Training Course Name</th>
	                					<th>Description</th>
	                					<th>Created</th>
	                					<th>Last Updated</th>
	                					@if (Auth::user()->hasPermission('create_edit_assign_training'))
	                					<th>Delete</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($training_courses)
	                					@foreach($training_courses as $training_course)
			                				<tr>
			                					<td> {{ $training_course->id }} </td>
			                					<td>
			                						@if (Auth::user()->hasPermission('create_edit_assign_training'))
			                							<a href="{{ route('safety.training.edit_training_course', $training_course->id)}}"> {{ $training_course->name }} </a>
			                						@else
			                							{{ $training_course->name }}
			                						@endif
			                					</td>
			                					<td> {{ $training_course->description }} </td>
			                					<td> {{ date('M d, Y', strtotime($training_course->created_at)) }} </td>
			                					<td> {{ date('M d, Y', strtotime($training_course->updated_at)) }} </td>
			                					@if (Auth::user()->hasPermission('create_edit_assign_training'))
			                					<td>
			                						<a 
			                							data-elem1='<?php echo $training_course->name; ?>' class='delete_training_course' id='<?php echo $training_course->id; ?>'>
			                							<img src="{{ URL::asset('/images/delete.png' )}}" alt="" class="action_icon delete_icon" />
			                						</a>
			                					</td>
			                					@endif
			                				</tr>
	                					@endforeach
	                				@endif
	                				{{ $training_courses->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$training_courses->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
