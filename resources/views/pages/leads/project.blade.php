@extends('layouts.projects')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                	#{{ $project->project_number . " - " . $project->name }}
                	@if (Auth::user()->hasPermission('create_project_leads'))
	        			<a class='crm_btn2 right_side right_pad' href="{{ route('leads.entity', $entity['id'] )}}"><i class="fas fas_left fa-caret-left"></i> Return to Entity</a>
	        		@endif
	        		<br class='clear_fix'/>
                </div>

                <div class="panel-body">
                	
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                    	<div class="col-md-12">
							@if(Session::has('created_design'))
		            			<p class='bg_success'>{{ Session('created_design') }}</p>
		            		@endif
		            		@if(Session::has('updated_design'))
		            			<p class='bg_success'>{{ Session('updated_design') }}</p>
		            		@endif
            			</div>
            		</div>
            		<div class="row" id='designs'>
	                	<div class="col-md-12">
	                		
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
