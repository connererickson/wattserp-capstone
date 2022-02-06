@extends('layouts.inventory')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Repository</div>

                <div class="card-body" id='repository_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div id='repository_topics'>
	                    <div class="row">
	                    	<div class="col-md-1">&nbsp;</div>
	                    	<div class="col-md-10">
	                    		<div class="row">
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('repository.manage') }}">
				                    		<div class='repository_topic' id='manage_parts'>
				                    			<h4>Manage</h4>
				                    			<p>Create and Update Parts and Equipment</p>
				                    		</div>
				                    	</a>
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('repository.administrate') }}">
				                    		<div class='repository_topic' id='administrate_parts'>
				                    			<h4>Administrate</h4>
				                    			<p>Organizations, Kitting, Types, Tags, Units &amp; <br />Colors</p>
				                    		</div>
				                    	</a>
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		&nbsp;
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

