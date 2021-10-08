@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Team</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
					@if (Auth::user()->hasPermission('create_sales_member'))
            			<a class='crm_btn2 right_side' href="{{ route('sales_team.create' )}}">Create New Sales Member</a>
            		@endif
	                		
                    <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'sales_members'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('sales_team') }}">Sales Members</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('created_sales_member'))
	                			<p class='bg_success'>{{ Session('created_sales_member') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					@if (Auth::user()->hasPermission('view_sales_team_admin'))
	                					<th>ID</th>
	                					@endif
	                					<th>First Name</th>
	                					<th>Last Name</th>
	                					<th>Phone</th>
	                					<th>Email</th>
	                					@if (Auth::user()->hasPermission('view_sales_team_admin'))
	                					<th>Created At</th>
	                					<th>Update At</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<?php $curr_email = ""; ?>
	                				@if ($sales_members)
	                					@foreach($sales_members as $sales_member)
	                						@foreach($users as $user)
	                							@if ($sales_member->user_id == $user->id)
	                								<?php $curr_email = $user->email; ?>
	                							@endif
	                						@endforeach
	                						<tr>
	                							@if (Auth::user()->hasPermission('view_sales_team_admin'))
	                							<td> {{ $sales_member->id }} </td>
	                							@endif
	                							<td>
	                								<a href="{{ route('sales_team.member', $sales_member->id) }}"> 
	                									{{ $sales_member->first_name }}
	                								</a>
	                							</td>
	                							<td>
	                								<a href="{{ route('sales_team.member', $sales_member->id) }}">
	                									{{ $sales_member->last_name }}
	                								</a>
	                							</td>
	                							<td>
	                								<a href='tel:{{ $sales_member->phone }}'>
	                									<span class='phone'> {{ $sales_member->phone }} </span>
	                								</a>
	                							</td>
	                							<td><a href='mailto: {{ $curr_email }}'>{{ $curr_email }}</a></td>
	                							@if (Auth::user()->hasPermission('view_sales_team_admin'))
	                							<td>{{ $sales_member->created_at->diffForHumans() }}</td>
	                							<td>{{ $sales_member->updated_at->diffForHumans() }}</td>
	                							@endif
	                						</tr>
	                					@endforeach
	                				@endif
	                				{{ $sales_members->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$sales_members->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                		<hr />
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
