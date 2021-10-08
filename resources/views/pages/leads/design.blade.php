@extends('layouts.projects')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Design - {{ $design->name }}
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
            		<div class="row">
	                	<div class="col-md-2">
	                       <ul id='design_main_menu'>
	                           <li id='designer_mo'>Designer</li>
	                           <li id='utility_mo'>Utility Impact</li>
	                		   <li id='bom_mo'>Bill of Materials</li>
	                		   <li id='tools_mo'>Tools
	                               <ul class='dropdown'>
	                                   <li id='fault_mo'>Fault Calculator</li>
	                		           <li id='vd_mo'>Voltage Drop</li>
	                		           <li id='ps_mo'>Panel Schedule Builder</li>
	                		           <li id='rlc_mo'>Residential Load Calculator</li>
	                		       </ul>
	                           </li>
	                       </ul>
	                	</div>
	                	<div class="col-md-9">
                            <div id='design_frame'>
                                <h3>Designer</h3>
                            </div>
                            <div id='utility_frame'>
                                <h3>Utility Impact</h3>
                            </div>
                            <div id='bom_frame'>
                                <h3>Bill of Materials</h3>
                            </div>
                            <div id='tools_frame'>
                                <div id='fault_calculator'>
                                    <h3>Fault Calculator</h3>
                                </div>
                                <div id='vd_calculator'>
                                    <h3>Voltage Drop Calculator</h3>
                                </div>
                                <div id='schedule_builder'>
                                    <h3>Panel Schedule Builder</h3>
                                </div>
                                <div id='res_load_calc'>
                                    <h3>Residential Load Calculation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div id='tool_palette'>
                                <h3>Tools Palette</h3>
                                <ul>
                                    <li>Tool Icons Here</li>
                                </ul>
                            </div>
                        </div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
