@extends('layouts.training_course')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Safety</div>

                <div class="card-body" id='safety_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div id='safety_topics'>
	                    <div class="row">
	                    	<div class="col-md-1">&nbsp;</div>
	                    	<div class="col-md-10">
	                    		<div class="row">
	                    			@if (Auth::user()->hasPermission('view_training_courses_results'))
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('safety.training_courses') }}">
				                    		<div class='safety_topic' id='training'>
				                    			<h4>Training Center</h4>
				                    			<p>Create, Assign and View Training Courses, Results and Certificates</p>
				                    		</div>
				                    	</a>
			                    	</div>
			                    	@else
			                    	<div class="col-md-4 padded">
			                    		&nbsp;
			                    	</div>
			                    	@endif
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('safety.forms') }}">
				                    		<div class='safety_topic' id='forms'>
				                    			<h4>Forms (UNDER CONSTRUCTION)</h4>
				                    			<p>Create, Assign and View Forms</p>
				                    		</div>
				                    	</a>
			                    	</div>
			                    </div>
			                </div>
	                    	<div class="col-md-1">&nbsp;</div>
	                    </div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
