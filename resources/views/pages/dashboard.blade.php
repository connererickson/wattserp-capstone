@extends('layouts.app')

@section('content')
<div class="container">
	<style type='text/css'>
		
	</style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Dashboard
                	<div id='modules_select_container'>
                		<!-- List Available Dashboard Modules -->
                		<h4>Install Dashboard Module</h4>
                		<?php
            			if ($available_modules){ ?>
            				<select id='select_dmodules'><?php
                				foreach($available_modules as $available_module){ ?>
                    				<option value='<?php echo $available_module['id'] ?>'><?php echo $available_module['name'] ?></option><?php
                    			}?>
							 </select>
							 <button id='install_dmodule' class='crm_btn'>Install</button><?php
                    	}
                    	else{
                    		?><p>No modules available</p><?php
                    	}?>
                		
                	</div>
                	<br class='clear_fix' />
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <!-- GET DASHBOARD MODULES FOR USER -->
                    <div class="grid" id='dashboard_grid'>
                    	<div class="grid-sizer"></div>
					  	<?php 
                    	$filename = '';
						$counter = 1;
                    	if($installed_modules){
                    		foreach($installed_modules as $installed_module){
	                    		//var_dump($modules_data);
	                    		$filename = $installed_module['filename'];?>
						
						  		<div class="grid-item" data-item-id="{{ $counter }}" id='<?php echo $filename; ?>'>
									@include('dashboard_modules.' . $filename)
						  		</div>
						  		<?php $counter++; ?>
						  	<?php
						  	}
						}?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
