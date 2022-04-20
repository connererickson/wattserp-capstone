@extends('layouts.app')

@section('content')

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" id="timeclock">
	<div class="offcanvas-header">
    	<h1 class="offcanvas-title">Time Clock</h1>
    	<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body text-center">
    	<!--<p>Some text lorem ipsum.</p>
    	<p>Some text lorem ipsum.</p>
    	<button class="btn btn-secondary" type="button">A Button</button>-->
		<div id='time'></div>
		<br />
		<div id="video-container">
			<canvas id="canvas" width="265" height="220"></canvas>
			<video id="video" width="265" height="220" autoplay playsinline></video>
			<input type="text" id="image-url-input" disabled>
		</div>
		<div id='id_entry'>
			<form id='clock_form' action='' method='post'>
				<span>Employee ID: </span><input type='text' class='form-control' name='emp_id' />
				<br />
				<span>Note: </span><input type='text' class='text_input' name='note' />
				<br />
				<input id='clock_in' type='button' class='button' value='Clock In' />
				<input id='clock_out' type='button' class='button' value='Clock Out' />
				<input id='status' type='button' class='button' value='Status' />
				<a href="/timeclock-csv" class="btn btn-primary">Export as CSV</a>
			</form>
		</div>
	</div>
</div>

<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#timeclock" style="position: fixed; top: 50%;">
	<i class="fas fa-clock fa-3x py-5" style="color: #fff"></i>
</button>

<div class="container-fluid">
	<div class="border border-primary border-2 rounded p-4 col-md-12 text-center">
		<div class="mt-2">
			<h2>Dashboard</h2>
			<div>
				<h5 class="text-muted">Install Dashboard Modules</h5>
				<!-- Offcanvas trigger -->
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
