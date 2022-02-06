@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">{{ $organization->name }} Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="row mb-4">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li><a href="{{ route('admin.users.index') }}">Users</a></li>
	                			@if (Auth::user()->authorizeRoles(array('God Mode')))
	                				<li><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
	                			@endif
	                			<li><a href="{{ route('admin.modules.index') }}">Modules</a></li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		<h4>Admin Main Page</h4>
	                	</div>
	                </div>
	        	</div>
            </div>
        </div>
    </div>
</div>
@endsection
