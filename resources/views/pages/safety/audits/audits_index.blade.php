@extends('layouts.audits')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Audits</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
                    <a class='crm_btn2 right_side' href="{{ route('safety.audits.create_audit' )}}">Create New Audit</a>
                    
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
                    
                    <div class="row" id='audits_table'>
	                	<div class="col-md-12">
	                		@if(Session::has('created_audit'))
	                			<p class='bg_success'>{{ Session('created_audit') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					<th>ID</th>
	                					<th>Audit Name</th>
	                					<th>Type</th>
	                					<th>Description</th>
	                					<th>Last Updated</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($audits)
	                					@foreach($audits as $audit)
			                				<tr>
			                					<td> {{ $audit->id }} </td>
			                					<td><a href="{{ route('safety.audits.edit_audit', $audit->id)}}"> {{ $audit->name }} </td>
			                					<td> {{ $audit->type }} </td>
			                					<td> {{ $audit->description }} </td>
			                					<td> {{ date('M d, Y', strtotime($audit->updated_at)) }} </td>
			                				</tr>
	                					@endforeach
	                				@endif
	                				{{ $audits->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$audits->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
