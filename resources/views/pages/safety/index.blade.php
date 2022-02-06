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
			                    		<!--<a href="{{ route('safety.audits') }}">-->
				                    		<div class='safety_topic' id='audits'>
				                    			<h4>Audits (NOT READY)</h4>
				                    			<p>Create, Assign and View Audits and Reports</p>
				                    		</div>
				                    	<!--</a>-->
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		<!--<a href="{{ route('safety.jhas') }}">-->
				                    		<div class='safety_topic' id='jhas'>
				                    			<h4>JHAs (NOT READY)</h4>
				                    			<p>Create, Assign and View Job Hazard Analyses and Reports</p>
				                    		</div>
				                    	<!--</a>-->
			                    	</div>
			                    </div>
			                </div>
	                    	<div class="col-md-1">&nbsp;</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-1">&nbsp;</div>
	                    	<div class="col-md-10">
	                    		<div class="row">
	                    			<div class="col-md-4 padded">
	                    				<a href="{{ route('safety.incidents') }}">
				                    		<div class='safety_topic' id='incidents'>
				                    			<h4>Incidents</h4>
				                    			<p>Log and Review Jobsite Incidents and Reports</p>
				                    		</div>
				                    	</a>
	                    			</div>
	                    			<div class="col-md-4">&nbsp;</div>
	                    			<div class='col-md-4'>&nbsp;</div>
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
