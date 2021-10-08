@extends('layouts.training_course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Training Courses</div>

                <div class="panel-body" id='safety_index'>
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
	                
	                <div class="row" id='audit_index_content'>
	                	<div class="col-md-10 col-md-offset-1">
	                		<p>
	                			Welcome to the Training Center. Here you can create new Training Courses, 
	                			schedule them for employees and review the results.
	                		</p>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
