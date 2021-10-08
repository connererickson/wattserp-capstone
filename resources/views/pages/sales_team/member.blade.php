@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Team Member</div>

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
	                				<?php if ($tab == 'sales_team'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('sales_team') }}">Sales Members</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('updated_team_member'))
	                			<p class='bg_success'>{{ Session('updated_team_member') }}</p>
	                		@endif
							
							 <div class="row">
	                			<div class="col-md-6">
	                				@if ($team_member)
										<h2>Team Member Information</h2>
										<table id='employee_personal_information'>
											<tbody>
												<tr>
													<td>Name:</td>
													<td>
														{{ $team_member->first_name }}
														{{ " " . $team_member->last_name }}
													</td>
												</tr>
												<tr>
													<td>Phone:</td>
													<td class='phone'>
														{{ $team_member->phone }}
													</td>
												</tr>
												<tr>
													<td>Email:</td>
													<td>
														{{ $user->email }}
														<br />
														{{ $team_member->alt_email }}
													</td>
												</tr>
												@if ($team_member->address)
													<tr>
														<td style='padding-bottom: 0;'>Address:</td>
														<td style='padding-bottom: 0;'>{{ $team_member->address->first()->address }}</td>
														
													</tr>
													<tr>
														<td style='padding-top: 0;'></td>
														<td style='padding-top: 0;'>{{ $team_member->address->first()->city . ", " . $team_member->address->first()->state . " " . $team_member->address->first()->zip }}</td>
													</tr>
												@endif
												<tr>
													<td>Start Date:</td>
													<td>{{ date('M d, Y', strtotime($team_member->start_date)) }}</td>
												</tr>
											</tbody>
										</table>
										@if (Auth::user()->hasPermission('edit_sales_member'))
											<a class='crm_btn little_margined' href="{{ route('sales_team.edit', $team_member->id) }}">Edit Information</a>
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
