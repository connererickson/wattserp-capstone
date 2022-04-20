@extends('layouts.training_course')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Training Reports</div>

                <div class="card-body">
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
	                </div>
                    
                    <div class="row" id='audits_table'>
	                	<div class="col-md-12">
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					<th>Training Course Name</th>
	                					<th>Employee Name</th>
	                					<th>Date Completed</th>
	                					<th>Certificate</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($completed_training_courses)
	                					@foreach($completed_training_courses as $training_course)
	                						<tr>
			                					<td> {{ $training_course->name }} </td>
			                					<td> {{ $training_course->first_name . " " . $training_course->last_name }} </td>
			                					<td> {{ date('M d, Y', strtotime($training_course->updated_at)) }} </td>
			                					<td><a href="{{ URL::asset('storage/training/certificates/' . $training_course->certificate_file) }}" target='_blank'>PDF</a></td>
			                				</tr>
	                					@endforeach
	                				@endif
	                				{{ $completed_training_courses->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$completed_training_courses->count())
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
