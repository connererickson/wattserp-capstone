@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Users for {{ $organization->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                	<a class='crm_btn2 right_side' href="{{ route('admin.users.create' )}}">Create New User</a>
	                
	                <div class="row mb-4">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'users'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.users.index') }}">Users</a>
	                			</li>
	                			@if (Auth::user()->authorizeRoles(array('God Mode')))
	                			<li 
	                				<?php if ($tab == 'permissions'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.permissions.index') }}">Permissions</a>
	                			</li>
	                			@endif
	                			<li 
	                				<?php if ($tab == 'modules'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.modules.index') }}">Modules</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('created_user'))
	                			<p class='bg_success'>{{ Session('created_user') }}</p>
	                		@endif
	                		@if(Session::has('updated_user'))
	                			<p class='bg_success'>{{ Session('updated_user') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					<th>ID</th>
	                					<th>Name</th>
	                					<th>Username</th>
	                					<th>Email</th>
	                					<th>Role</th>
	                					<th>Status</th>
	                					<th>Created At</th>
	                					<th>Update At</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($users)
	                					@foreach($users as $user)
	                						<tr>
	                							<td>{{ $user->id }}</td>
	                							<td><a href="{{ route('admin.users.edit', $user->id)}}">{{ $user->name }}</a></td>
	                							<td>{{ $user->username }}</td>
	                							<td>{{ $user->email }}</td>
	                							<td>
	                								@foreach( $user->roles as $role )
	                									{{ $role->name }}
	                									@if (!$loop->last) , @endif
	                								@endforeach
	                							</td>
	                							<!--<td>{{ $user->role }}</td>-->
	                							<td>{{ $user->is_active == 1 ? "Online" : "Offline" }}</td>
	                							<td>{{ $user->created_at->diffForHumans() }}</td>
	                							<td>{{ $user->updated_at->diffForHumans() }}</td>
	                						</tr>
	                					@endforeach
	                				@endif
	                			</tbody>
	                		</table>
	                		{{ $users->links() }}
	                		@if (!$users->count())
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
