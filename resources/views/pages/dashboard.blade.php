@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="border border-primary border-2 rounded p-4 col-md-12 text-center">
		<div class="mt-2">
			<h2>Dashboard</h2>
			<div>
				<h5 class="text-muted">Install Dashboard Modules</h5>
				<div class="d-flex justify-content-center flex-column flex-sm-row">
					<?php
					if ($available_modules){ ?>

							<select id='select_dmodules' class="form-select my-2 w-100 w-sm-25 text-center me-2"><?php
								foreach($available_modules as $available_module){ ?>
									<option value='<?php echo $available_module['id'] ?>' class="my-1"><?php echo $available_module['name'] ?></option><?php
								}?>
							</select>


							<button id='install_dmodule' class='btn btn-primary my-2'>Install</button>

						<?php
						}
							//crm_btn
					else{
						?><p>No modules available</p><?php
					}?>
					{{-- <br class='clear_fix' /> --}}
				</div>
			</div>

			
			<div class="panel-body mt-2">
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
@endsection
