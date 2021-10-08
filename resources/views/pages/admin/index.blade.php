@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $organization->name }} Admin</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="row">
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
