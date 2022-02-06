@extends('layouts.account_settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Account Settings</div>

                <div class="card-body" id='administrate_account_settings'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class="row">
						<div class="col-md-2">
							<ul id='administrate_functions_list' class='functions_list'>
								<li class='sidebar_function'>
									<a href=" {{ route('settings.information') }}" >My Information</a>
								</li>
								<li class='sidebar_function'>
									<a href=" {{ route('settings.security') }}" >Security</a>
								</li>
								<!--<li class='sidebar_function'>
									<a href='#'>Preferences</a>
								</li>-->
							</ul>
						</div>
						<div class="col-md-10">
							<h4 style='display: inline-block'>Information</h4>
							<a class='crm_btn right_side' href='{{ route('settings.information.edit') }}'>Update Information</a>
							<ul id='user_data'>
								<li>Organization: {{ $org_name }}</li>
								<li>Username: {{ $user_data->username }}</li>
								<li>Name: {{ $user_data->name }}</li>
								<li>Email: {{ $user_data->email }}</li>
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
