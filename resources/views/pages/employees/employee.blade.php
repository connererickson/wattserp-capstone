@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee File</div>

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
	                				<?php if ($tab == 'employees'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('employees') }}">Employees</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('updated_employee'))
	                			<p class='bg_success'>{{ Session('updated_employee') }}</p>
	                		@endif
							
							 <div class="row">
	                			<div class="col-md-6">
									<h2>Personal Information</h2>
									<table id='employee_personal_information'>
										<tbody>
											<tr>
												<td>Name:</td>
												<td>
													{{ $employee->first_name }}
													@if (Auth::user()->hasPermission('view_employee_detailed'))
													{{ " " . $employee->middle_name }}
													@endif
													{{ " " . $employee->last_name }}
												</td>
											</tr>
											<tr>
												<td>Phone:</td>
												<td class='phone'>
													{{ $employee->phone }}
												</td>
											</tr>
											<tr>
												<td>Email:</td>
												<td>
													{{ $user->email }}
												</td>
											</tr>
											@if (Auth::user()->hasPermission('view_employee_admin'))
												@if ($ssn)
													<tr>
														<td>SSN:</td>
														<td>{{ substr($ssn, 0, 3) . "-" . substr($ssn, 3, 2) . "-" . substr($ssn, -4) }}</td>
													</tr>
												@endif
											@elseif (Auth::user()->hasPermission('view_employee_detailed'))
												@if ($ssn)
													<tr>
														<td>SSN:</td>
														<td>XXX-XX-{{ substr($ssn, -4) }}</td>
													</tr>
												@endif
											@endif
											
											@if (Auth::user()->hasPermission('view_employee_detailed'))
											<tr>
												<td style='padding-bottom: 0;'>Address:</td>
												<td style='padding-bottom: 0;'>{{ $employee->address->first()->address }}</td>
												
											</tr>
											<tr>
												<td style='padding-top: 0;'></td>
												<td style='padding-top: 0;'>{{ $employee->address->first()->city . ", " . $employee->address->first()->state . " " . $employee->address->first()->zip }}</td>
											</tr>
											<tr>
												<td>Date of Birth:</td>
												<td>{{ date('M d, Y', strtotime($employee->dob)) }}</td>
											</tr>
											@endif
											<tr>
												<td>Hire Date:</td>
												<td>{{ date('M d, Y', strtotime($employee->hire_date)) }}</td>
											</tr>
										</tbody>
									</table>
									@if (Auth::user()->hasPermission('edit_employee'))
										<a class='crm_btn little_margined' href="{{ route('employees.edit', $employee->id) }}">Edit Personal Information</a>
									@endif
								</div>
								<div class="col-md-6">
									<h2>Emergency Contact</h2>
									@if (count($emergency_contact))
									<table id='employee_emergency_contact'>
										<tbody>
											<tr>
												<td>Name:</td>
												<td>
													{{ $emergency_contact[0]->first_name . " " . $emergency_contact[0]->middle_name . " " . $emergency_contact[0]->last_name }}
												</td>
											</tr>
											<tr>
												<td>Phone:</td>
												<td class='phone'>{{ $emergency_contact[0]->cell_phone }}</td>
											</tr>
											<tr>
												<td>Email:</td>
												<td><a href='mailto:{{ $emergency_contact[0]->email1 }}'>{{ $emergency_contact[0]->email1 }}</a></td>
											</tr>
											<tr>
												<td>Address:</td>
												<td>
													{{ $emergency_contact[0]->address }}
													<br />
													{{ $emergency_contact[0]->city . " " . $emergency_contact[0]->state . " " . $emergency_contact[0]->zip }}
												</td>
											</tr>
										</tbody>
									</table>
									@else
									<a class="crm_btn2 little_margined" href="{{ route('employees.create_ec', ['id' => $employee->id]) }}">Add Emergency Contact</a>
									@endif
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
