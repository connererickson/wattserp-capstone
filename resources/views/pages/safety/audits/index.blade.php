@extends('layouts.audits')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Audits</div>

                <div class="panel-body" id='safety_index'>
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
	                				><a href="{{ route('safety.audits') }}">Overview</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'manage_audits'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.audits.audits_index') }}">Manage Audits</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'schedule_audits'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.audits.scheduled_audits_index') }}">Audit Scheduling</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'audit_history'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('safety.audits.audit_history_index') }}">Audit History</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                
	                <div class="row" id='audit_index_content'>
	                	<div class="col-md-10 col-md-offset-1">
	                		<p>
	                			Welcome to the Audit Center. Here you can create new audits, 
	                			schedule them for qualified employees to complete and review
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
