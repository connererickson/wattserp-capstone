@extends('layouts.training_course')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Scheduled Training Courses</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
	                	<div class="col-md-5">
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
	                	<div class="col-md-7">
	                	    <div class="row justify-content-center" id='schedule_training_form'>
                                <select name="employees" class="form-control" id='training_employees'>
                                    <option value="select">-- Select --</option>
                                    <?php foreach($employees as $employee){ ?>
                                        <option value="<?php echo $employee->id; ?>"><?php echo $employee->first_name . " " . $employee->middle_name . " " . $employee->last_name; ?></option>
                                    <?php } ?>
                                </select>
                                <select name="training_courses" class="form-control" id='training_training_courses'>
                                    <option value="select">-- Select --</option>
                                    <?php foreach($training_courses as $training_course){ ?>
                                        <option value="<?php echo $training_course->id; ?>"><?php echo $training_course->name; ?></option>
                                    <?php } ?>
                                </select>
                                <a id='schedule_training' class='btn btn-primary text-light w-25 ms-3' href="">Schedule Training</a>
                            </div>
	                    </div>
                    </div>
                    <div class="row" id='audits_table'>
	                	<div class="col-md-12">
	                		@if(Session::has('create_scheduled_training_course'))
	                			<p class='bg_success'>{{ Session('create_scheduled_training_course') }}</p>
	                		@endif
	                		@if(Session::has('updated_scheduled_training_course'))
	                			<p class='bg_success'>{{ Session('updated_scheduled_training_course') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					<th>Training Course Name</th>
	                					<th>Employee Name</th>
	                					<th>Created</th>
	                					<th>Last Updated</th>
	                					@if (Auth::user()->hasPermission('create_edit_assign_training'))
	                					<th>Unschedule</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($scheduled_training_courses)
	                					@foreach($scheduled_training_courses as $training_course)
	                						<tr>
			                					<td> {{ $training_course->name }} </td>
			                					<td> {{ $training_course->first_name . " " . $training_course->last_name }} </td>
			                					<td> {{ date('M d, Y', strtotime($training_course->created_at)) }} </td>
			                					<td> {{ date('M d, Y', strtotime($training_course->updated_at)) }} </td>
			                					@if (Auth::user()->hasPermission('create_edit_assign_training'))
			                					<td>
			                						<a 
			                							data-elem1='<?php echo $training_course->name; ?>' 
			                							data-elem2='<?php echo $training_course->first_name . " " . $training_course->middle_name . " " . $training_course->last_name; ?>' 
			                							class='unschedule_training' id='<?php echo $training_course->id; ?>'>
			                							<img src="{{ URL::asset('/images/delete.png' )}}" alt="" class="action_icon delete_icon" />
			                						</a>
			                					</td>
			                					@endif
			                				</tr>
	                					@endforeach
	                				@endif
	                				{{ $scheduled_training_courses->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$scheduled_training_courses->count())
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
