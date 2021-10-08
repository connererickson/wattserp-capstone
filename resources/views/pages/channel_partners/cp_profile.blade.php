@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Channel Partner</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'channel_partner'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('channel_partners') }}">Channel Partners</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('updated_channel_partner'))
	                			<p class='bg_success'>{{ Session('updated_channel_partner') }}</p>
	                		@endif
							
							 <div class="row">
	                			<div class="col-md-6">
	                				@if ($channel_partner)
										<h2>Channel Partner Information</h2>
										<table id='employee_personal_information'>
											<tbody>
												<tr>
													<td>Name:</td>
													<td>
														{{ $channel_partner->first_name }}
														{{ " " . $channel_partner->last_name }}
													</td>
												</tr>
												<tr>
													<td>Phone:</td>
													<td class='phone'>
														{{ $channel_partner->phone }}
													</td>
												</tr>
												<tr>
													<td>Email:</td>
													<td>
														{{ $user->email }}
														<br />
														{{ $channel_partner->alt_email }}
													</td>
												</tr>
												@if ($channel_partner->address)
													<tr>
														<td style='padding-bottom: 0;'>Address:</td>
														<td style='padding-bottom: 0;'>{{ $channel_partner->address->first()->address }}</td>
														
													</tr>
													<tr>
														<td style='padding-top: 0;'></td>
														<td style='padding-top: 0;'>{{ $channel_partner->address->first()->city . ", " . $channel_partner->address->first()->state . " " . $channel_partner->address->first()->zip }}</td>
													</tr>
												@endif
												<tr>
													<td>Start Date:</td>
													<td>{{ date('M d, Y', strtotime($channel_partner->start_date)) }}</td>
												</tr>
											</tbody>
										</table>
										@if (Auth::user()->hasPermission('edit_channel_partner'))
											<a class='crm_btn little_margined' href="{{ route('channel_partners.edit', $channel_partner->id) }}">Edit Information</a>
										@endif
									@endif
								</div>
								<div class="col-md-6">
									&nbsp;
								</div>
							</div>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
