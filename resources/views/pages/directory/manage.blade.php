@extends('layouts.directory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ ucfirst($type) . " - " . ucfirst($company_name) }}
                    <a href="{{ route('directory') }}" class='right_side crm_btn2' style='padding: 4px 8px;'>
                        <i class="fas fa-caret-left"></i>
                        &nbsp;&nbsp;Return
                    </a>
                    <br class='clear_fix' />
                </div>

                <div class="panel-body" id='administrate_directory'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    	<div class="col-md-12">
                    		@if(Session::has('created_contact'))
	                			<p class='bg_success'>{{ Session('created_contact') }}</p>
	                		@endif
	                		@if(Session::has('updated_contact'))
	                			<p class='bg_success'>{{ Session('updated_contact') }}</p>
	                		@endif
	                		@if(Session::has('created_news'))
                                <p class='bg_success'>{{ Session('created_news') }}</p>
                            @endif
	                		@if(Session::has('created_address'))
                                <p class='bg_success'>{{ Session('created_address') }}</p>
                            @endif
                            @if(Session::has('updated_address'))
                                <p class='bg_success'>{{ Session('updated_address') }}</p>
                            @endif
	                		@if(Session::has('created_correspondence'))
                                <p class='bg_success'>{{ Session('created_correspondence') }}</p>
                            @endif
                    	</div>
                    </div>
                    <?php //echo $type; ?>
            		<div class="row">
	                	<div class="col-md-2">
							<ul id='directory_functions_list' class='functions_list'>
								<li class='sidebar_function'>
									<a href='#' id='contacts_button'>Contacts</a>
								</li>
								<li class='sidebar_function'>
									<a href='#' id='news_button'>News</a>
								</li>
								@if ($type != "Manufacturer")
								<li class='sidebar_function'>
									<a href='#' id='locations_button'>Locations</a>
								</li>
								@endif
								@if ($type == "Utility" || $type == "Municipality")
								<li class='sidebar_function'>
                                    <a href='#' id='stakeholder_button'>Stakeholder Correspondence</a>
                                </li>
								<li class='sidebar_function'>
									<a href='#' id='projects_button'>Associated Projects</a>
								</li>
								@endif
								@if ($type == "Utility")
								<li class='sidebar_function'>
									<a href='#' id='rates_button'>Rates</a>
								</li>
								@endif
							</ul>
						</div>
						<div class="col-md-10">
							<div id='contacts' class='directory_function_container'>
								<div class="row">
	                				<div class="col-md-5">
										<h4>Contacts</h4>
										<hr />
										@if ($contacts)
											@foreach($contacts as $contact)
												<div class='directory_contact' id='{{ $contact['id'] }}'>
												    @if (Auth::user()->hasPermission('manage_company'))
													   <a class='directory_edit_contact'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon edit_contact" /></a>
													@endif
													<span class='directory_contact_name'>
														<span class='contact_first_name'>{{ $contact['first_name'] }}</span>
														<span class='contact_middle_name'>{{ " " . $contact['middle_name'] }}</span>
														<span class='contact_last_name'>{{ " " . $contact['last_name'] }}</span>
													</span>
													<br />
													@if ($contact['title'] != '')
														<span class='directory_contact_title'>
															{{ $contact['title'] }}
														</span>
														<br /><br />
													@endif
													@if ($contact['home_phone'] != '')
														<span class='directory_contact_phone dc_home_phone'>
															P: <span class='phone'>{{ $contact['home_phone'] }}</span>
														</span>
														<br />
													@endif
													@if ($contact['work_phone'] != '')
														<span class='directory_contact_phone dc_work_phone'>
															O: <span class='phone'>{{ $contact['work_phone'] }}</span>
														</span>
														<br />
													@endif
													@if ($contact['cell_phone'] != '')
														<span class='directory_contact_phone dc_cell_phone'>
															C: <span class='phone'>{{ $contact['cell_phone'] }}</span>
														</span>
														<br />
													@endif
													@if ($contact['email1'] != '')
														<span class='directory_contact_email dc_email1'>
															<a href="mailto:{{ $contact['email1']}}">{{ $contact['email1'] }}</a>
														</span>
														<br />
													@endif
													@if ($contact['email2'] != '')
														<span class='directory_contact_email dc_email2'>
															<a href="mailto:{{ $contact['email2']}}">{{ $contact['email2'] }}</a>
														</span>
													@endif
												</div>
												<hr />
											@endforeach
										@endif
									</div>
									<div class="col-md-7">
									    @if (Auth::user()->hasPermission('manage_company'))
    										<div id='directory_contact_form'>
    											<h4>Create New Contact</h4>
    					                		{!! Form::open(['method'=>'POST', 'action'=>'DirectoryController@store_contact', 'class'=>'crm_form']) !!}
    					                			<div class='form-group'>
    					                				{!! Form::hidden('company_id', $company_id, ['id'=>'company_id']) !!}
    					                				{!! Form::hidden('contact_id', null, ['id'=>'contact_id']) !!}
    						                			{!! Form::label('first_name', 'First Name') !!}
    						                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
    						                			{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('last_name', 'Last Name') !!}
    					                				{!! Form::text('last_name', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('title', 'Title') !!}
    					                				{!! Form::text('title', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('work_phone', 'Office Phone') !!}
    					                				{!! Form::text('work_phone', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('work_phone', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('cell_phone', 'Cell Phone') !!}
    					                				{!! Form::text('cell_phone', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('cell_phone', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('email1', 'Email') !!}
    					                				{!! Form::text('email1', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('email1', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    					                				{!! Form::label('email2', 'Secondary Email') !!}
    					                				{!! Form::text('email2', null, ['class'=>'form-control']) !!}
    					                				{!! $errors->first('email2', '<p class="help-block">:message</p>') !!}
    						                		</div>
    						                		<div class='form-group'>
    						                			{!! Form::submit('Create Contact', ['class'=>'crm_btn', 'id'=>'submit_contact_form']) !!}
    						                		</div>
    						                	{!! Form::close() !!}
    					                	</div>
    					                @else
    					                   &nbsp;
    					                @endif
					            	</div>
					        	</div>
							</div>
							<div id='news' class='directory_function_container'>
								<h4>News</h4>
								@if (Auth::user()->hasPermission('manage_company'))
                                    {!! Form::open(['method'=>'POST', 'action'=>'DirectoryController@store_news', 'class'=>'crm_form']) !!}
                                        <div class='form-group'>
                                            {!! Form::hidden('company_id', $company_id, ['id'=>'company_id']) !!}
                                            {!! Form::label('news', 'News') !!}
                                            {!! Form::textarea('news', null, ['class'=>'form-control', 'id'=>'news_message']) !!}
                                            {!! $errors->first('news', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class='form-group'>
                                            {!! Form::submit('Submit News', ['class'=>'crm_btn', 'id'=>'submit_news_form']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                <hr />
                                @endif
                                
                                @if ($directory_news)
                                    @foreach($directory_news as $item)
                                        <div class='news_container row' id='{{ $item->id }}'>
                                            <div class='col-md-11 news_left_side'>
                                                <span>{{ date("F jS, Y", strtotime($item->created_at)) }}</span>
                                                <p>{{ $item->news }}</p>
                                            </div>
                                            <div class='col-md-1'>
                                                @if (Auth::user()->hasPermission('manage_company'))
                                                    <a href="" class='edit_news'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon" /></a>
                                                    <br /><br />
                                                    <a href="" class='delete_news'><img src="{{ URL::asset('/images/delete.png' )}}" alt="" class="action_icon" /></a>
                                                @else
                                                    &nbsp;
                                                @endif
                                            </div>
                                        </div>
                                        <hr />
                                    @endforeach
                                @endif
							</div>
							<div id='locations' class='directory_function_container'>
								<div class="row">
                                    <div class="col-md-5">
                                        <h4>Locations</h4>
                                        <hr />
                                        @if ($locations)
                                            @foreach($locations as $location)
                                                <div class='directory_location' id='{{ $location['id'] }}'>
                                                    <a class='directory_edit_location'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon edit_location" /></a>
                                                    <span class='directory_address'>{{ $location['address'] }}</span>
                                                    <br />
                                                    <span class='directory_city'>{{ $location['city'] }}</span>,
                                                    <span class='directory_state'>{{ $location['state'] }}</span>
                                                    <span class='directory_zip'>{{ $location['zip'] }}</span>
                                                </div>
                                                <hr />
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        @if (Auth::user()->hasPermission('manage_company'))
                                            <div id='directory_location_form'>
                                                <h4>Create New Address</h4>
                                                {!! Form::open(['method'=>'POST', 'action'=>'DirectoryController@store_address', 'class'=>'crm_form']) !!}
                                                    <div class='form-group'>
                                                        {!! Form::hidden('company_id', $company_id, ['id'=>'company_id']) !!}
                                                        {!! Form::hidden('address_id', null, ['id'=>'address_id']) !!}
                                                        {!! Form::label('address', 'Address') !!}
                                                        {!! Form::text('address', null, ['class'=>'form-control']) !!}
                                                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    <div class='form-group'>
                                                        {!! Form::label('city', 'City') !!}
                                                        {!! Form::text('city', null, ['class'=>'form-control']) !!}
                                                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    <div class='form-group'>
                                                        {!! Form::label('state', 'State') !!}
                                                        <select id='state' name='state' class='form-control'>
                                                            <option value='0'>-- Select --</option>
                                                            @foreach($states as $state)
                                                                <option value='{{ $state }}'>{{ $state }}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    <div class='form-group'>
                                                        {!! Form::label('zip', 'Zip') !!}
                                                        {!! Form::text('zip', null, ['class'=>'form-control']) !!}
                                                        {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    <div class='form-group'>
                                                        {!! Form::submit('Create Address', ['class'=>'crm_btn', 'id'=>'submit_address_form']) !!}
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        @else
                                            &nbsp;
                                        @endif
                                    </div>
                                </div>
							</div>
							<div id='stakeholder' class='directory_function_container'>
                                <h4>Stakeholder Correspondence</h4>
                                @if (Auth::user()->hasPermission('manage_company'))
                                    {!! Form::open(['method'=>'POST', 'action'=>'DirectoryController@store_stakeholdercorrespondence', 'class'=>'crm_form']) !!}
                                        <div class='form-group'>
                                            {!! Form::hidden('company_id', $company_id, ['id'=>'company_id']) !!}
                                            {!! Form::label('message', 'Message/Update/Correspondence') !!}
                                            {!! Form::textarea('message', null, ['class'=>'form-control', 'id'=>'sc_message']) !!}
                                            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class='form-group'>
                                            {!! Form::submit('Log Correspondence', ['class'=>'crm_btn', 'id'=>'submit_stakec_form']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                <hr />
                                @endif
                                
                                @if ($stakeholder_correspondence)
                                    @foreach($stakeholder_correspondence as $item)
                                        <div class='stakec_container row' id='{{ $item->id }}'>
                                            <div class='col-md-11 sc_left_side'>
                                                <span>{{ date("F jS, Y", strtotime($item->created_at)) }}</span>
                                                <p>{{ $item->message }}</p>
                                            </div>
                                            <div class='col-md-1'>
                                                @if (Auth::user()->hasPermission('manage_company'))
                                                    <a href="" class='edit_stakeholdercorrespondence'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon" /></a>
                                                    <br /><br />
                                                    <a href="" class='delete_stakeholdercorrespondence'><img src="{{ URL::asset('/images/delete.png' )}}" alt="" class="action_icon" /></a>
                                                @else
                                                    &nbsp;
                                                @endif
                                            </div>
                                        </div>
                                        <hr />
                                    @endforeach
                                @endif
                            </div>
							<div id='projects' class='directory_function_container'>
								<h4>Projects</h4>
								<p>This area is still under construction</p>
							</div>
							<div id='rates' class='directory_function_container'>
								<h4>Rates</h4>
								<a href='{{ route('utility_rates.index', $company_id) }}' id='manage_rates_button' class='crm_btn right_side'>Manage Rates</a>
								<br /><br />
								<div class="row" id='rates_table_headers'>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Name</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class='rates_heading'>Description</div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class='rates_heading'>Frozen</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Created At</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Last Update At</div>
                                    </div>
                                </div>
                                @if ($utility_rates)
                                    @foreach($utility_rates as $rate)
                                        <div class="row rates_table_data">
                                            <div class="col-md-2">
                                                <div>{{ $rate->rate_name }}</div>
                                            </div>
                                            <div class="col-md-5">
                                                <div>{!! html_entity_decode($rate->rate_description) !!}</div>
                                            </div>
                                            <div class="col-md-1">
                                                <div>
                                                    @if ($rate->frozen == 0)
                                                        No
                                                    @else
                                                        Yes
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>{{ $rate->created_at->diffForHumans() }}</div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>{{ $rate->updated_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{ $utility_rates->links() }}
                                @if (!$utility_rates->count())
                                    <div style='padding-left: 5px;'>No Results to Display</div>
                                @endif
							</div>
						</div>
	               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
