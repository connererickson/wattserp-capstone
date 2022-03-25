@extends('layouts.forms')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Forms</div>

                <div class="card-body" id='safety_index'>
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
	                				><a href="{{ route('safety.forms') }}">Overview</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'manage_forms'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.forms.forms_index') }}">Manage Forms</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'schedule_forms'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.forms.scheduled_forms_index') }}">Form Scheduling</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'form_history'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.forms.form_history_index') }}">Form History</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                
	                <div class="row" id='form_index_content'>
	                	<div class="col-md-10 col-md-offset-1">
	                		<p>
	                			Welcome to the Forms Center. Here you can create new forms, 
	                			schedule them for qualified employees to complete, and review
	                			the results.
	                		</p>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
