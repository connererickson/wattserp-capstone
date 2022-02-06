@extends('layouts.account_settings')

@section('content')
<div class="container">
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
						<?php
						//echo ("<pre>");
						//var_dump($user_data);
						//aecho ("</pre>");
						?>
						
						
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
