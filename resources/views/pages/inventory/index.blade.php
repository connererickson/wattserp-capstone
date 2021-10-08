@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Inventory</div>

                <div class="panel-body" id='inventory_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div id='inventory_topics'>
	                    <div class="row">
	                    	<div class="col-md-1">&nbsp;</div>
	                    	<div class="col-md-10">
	                    		<div class="row">
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('inventory.manage') }}">
				                    		<div class='inventory_topic' id='manage_parts'>
				                    			<h4>Manage</h4>
				                    			<p>Create and Update Parts and Equipment</p>
				                    		</div>
				                    	</a>
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		<!--<a href="{{ route('inventory.pull') }}">
				                    		<div class='inventory_topic' id='pull_parts'>
				                    			<h4>Pull</h4>
				                    			<p>Create, Update and Send Pulls</p>
				                    		</div>
				                    	</a>-->
				                    	&nbsp;
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		<!--<a href="{{ route('inventory.receive') }}">
				                    		<div class='inventory_topic' id='receive_parts'>
				                    			<h4>Receive</h4>
				                    			<p>Create and Update Stock and Pricing</p>
				                    		</div>
				                    	</a>-->
				                    	&nbsp;
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
			                    		<!--<a href="{{ route('inventory.order') }}">
				                    		<div class='inventory_topic' id='order'>
				                    			<h4>Orders</h4>
				                    			<p>Create, Update and Fulfill Orders</p>
				                    		</div>
				                    	</a>-->
				                    	&nbsp;
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		<a href="{{ route('inventory.printout') }}">
				                    		<div class='inventory_topic' id='print'>
				                    			<h4>Print</h4>
				                    			<p>Print Inventory</p>
				                    		</div>
				                    	</a>
			                    		&nbsp;
			                    	</div>
			                    	<div class="col-md-4 padded">
			                    		&nbsp;
			                    	</div>
			                    </div>
			        		</div>
			        	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
