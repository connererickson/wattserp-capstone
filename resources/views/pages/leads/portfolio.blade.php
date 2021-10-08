@extends('layouts.projects')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span class='page_title'>{{ $portfolio->name }}</span>
                	@if (Auth::user()->hasPermission('create_project_leads'))
	        			<a class='crm_btn2 right_side' href="{{ route('leads.create_proposal', $portfolio->id )}}">Create New Proposal <i class="fas fas_right fa-project-diagram"></i></a>
	        			<a class='crm_btn2 right_side right_pad' href="{{ route('leads.create_request', $portfolio->id )}}">Create Request<i class="fas fas_right fa-tools"></i></i></a>
	        			<a class='crm_btn2 right_side right_pad' href="{{ route('leads.index' )}}"><i class="fas fas_left fa-caret-left"></i> Return to Portfolios</a>
	        		@endif
	        		<br class='clear_fix'/>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                    	<div class="col-md-12">
							@if(Session::has('created_proposal'))
		            			<p class='bg_success'>{{ Session('created_proposal') }}</p>
		            		@endif
		            		@if(Session::has('updated_proposal'))
		            			<p class='bg_success'>{{ Session('updated_proposal') }}</p>
		            		@endif
		            		@if(Session::has('created_contact'))
		            			<p class='bg_success'>{{ Session('created_contact') }}</p>
		            		@endif
		            		@if(Session::has('updated_contact'))
		            			<p class='bg_success'>{{ Session('updated_contact') }}</p>
		            		@endif
            			</div>
            		</div>
            		<div class="row" id='contacts'>
	                	<div class="col-md-12">
	                		<h3>Contacts</h3>
	                		<a class='crm_btn2 right_side' href="#" id='add_portfolio_contact'>Add Contact<i class="fas fas_right fa-id-card"></i></a>
	                		<div class="row">
		                		@if (count($contacts))
		                			@foreach($contacts as $contact)
			                			<div class='portfolio_contact col-md-3' id='{{ $contact['id'] }}'>
											<a class='portfolio_edit_contact'><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon edit_contact" /></a>
											<span class='portfolio_contact_name'>
												<span class='contact_first_name'>{{ $contact['first_name'] }}</span>
												<span class='contact_middle_name'>{{ " " . $contact['middle_name'] }}</span>
												<span class='contact_last_name'>{{ " " . $contact['last_name'] }}</span>
											</span>
											<br />
											@if ($contact['title'] != '')
												<span class='portfolio_contact_title'>
													{{ $contact['title'] }}
												</span>
												<br /><br />
											@endif
											@if ($contact['home_phone'] != '')
												<span class='portfolio_contact_phone e_home_phone'>
													P: <span class='phone'>{{ $contact['home_phone'] }}</span>
												</span>
												<br />
											@endif
											@if ($contact['work_phone'] != '')
												<span class='portfolio_contact_phone e_work_phone'>
													O: <span class='phone'>{{ $contact['work_phone'] }}</span>
												</span>
												<br />
											@endif
											@if ($contact['cell_phone'] != '')
												<span class='portfolio_contact_phone e_cell_phone'>
													C: <span class='phone'>{{ $contact['cell_phone'] }}</span>
												</span>
												<br />
											@endif
											@if ($contact['email1'] != '')
												<span class='portfolio_contact_email e_email1'>
													<a href="mailto:{{ $contact['email1']}}">{{ $contact['email1'] }}</a>
												</span>
												<br />
											@endif
											@if ($contact['email2'] != '')
												<span class='portfolio_contact_email e_email2'>
													<a href="mailto:{{ $contact['email2']}}">{{ $contact['email2'] }}</a>
												</span>
											@endif
										</div>
		                			@endforeach
	                			@else
	                				<div class='portfolio_contact'>
	                					No Contacts
	                				</div>
	                			@endif
	                		</div>
	                	</div>
	                </div>
	                <div class="row" id='add_contact_form'>
	                	<div class="col-md-6">
	                		{!! Form::open(['method'=>'POST', 'action'=>'LeadsController@store_portfolio_contact', 'class'=>'crm_form']) !!}
	                			<div class='form-group'>
	                				{!! Form::hidden('portfolio_id', $portfolio->id, ['id'=>'portfolio_id']) !!}
	                				{!! Form::hidden('contact_id', null, ['id'=>'contact_id']) !!}
		                			{!! Form::label('first_name', 'First Name') !!}
		                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
		                			{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
		                		</div>
		                		<div class='form-group'>
	                				{!! Form::label('middle_name', 'Middle Name') !!}
	                				{!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
	                				{!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
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
		                	</div>
		                	<div class="col-md-6">
		                		<div class='form-group'>
	                				{!! Form::label('home_phone', 'Home Phone') !!}
	                				{!! Form::text('home_phone', null, ['class'=>'form-control']) !!}
	                				{!! $errors->first('home_phone', '<p class="help-block">:message</p>') !!}
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
		                			<a class='crm_btn2' id='cancel_add_portfolio_contact' href='#'>Cancel</a>
		                		</div>
		                	{!! Form::close() !!}
		                </div>
	                </div>
	                <div class="row" id='edit_contact_form'>
	                	<div class="col-md-12">
	                		{!! Form::model(null, ['method' => 'PATCH', 'route' => array('leads.update_portfolio_contact', null)]) !!}
	                			<div class='form-group'>
	                				{!! Form::hidden('portfolio_id', $portfolio->id, ['id'=>'portfolio_id']) !!}
	                				{!! Form::hidden('contact_id', null, ['id'=>'contact_id']) !!}
		                			{!! Form::label('first_name', 'First Name') !!}
		                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
		                			{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
		                		</div>
		                		<div class='form-group'>
	                				{!! Form::label('middle_name', 'Middle Name') !!}
	                				{!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
	                				{!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
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
	                				{!! Form::label('home_phone', 'Home Phone') !!}
	                				{!! Form::text('home_phone', null, ['class'=>'form-control']) !!}
	                				{!! $errors->first('home_phone', '<p class="help-block">:message</p>') !!}
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
		                			{!! Form::submit('Update Contact', ['class'=>'crm_btn', 'id'=>'submit_edit_contact_form']) !!}
		                			<a class='crm_btn2' id='cancel_edit_portfolio_contact' href='#'>Cancel</a>
		                		</div>
		                	{!! Form::close() !!}
		                </div>
	                </div>
	                <hr />
	                <div class="row" id='projects'>
	                	<div class="col-md-12">
	                		<h3>Projects</h3>
	                		@if (count($projects))
	                			@foreach($projects as $project)
	                				<a href="{{ route('leads.project', $project->id )}}">
		                				<div class='row project'>
		                					<div class="col-md-4">
		                						<span class='project_number'>{{ $project->project_number }}</span>
		                						<br />
		                						<span class='project_name'>{{ $project->name }}</span>
		                					</div>
		                					
		                				</div>
		                			</a>
		                		@endforeach
		                	@else
		                		<div class='portfolio_project'>
		                				No Projects
		                		</div>
		                	@endif
	                	</div>
	                </div>
	                <hr />
            		<div class="row" id='proposals'>
	                	<div class="col-md-12">
	                		<h3>Proposals</h3>
	                		@if (count($proposals))
	                			@foreach($proposals as $proposal)
	                				<a href="{{ route('leads.proposal', $proposal->id )}}">
		                				<div class='row project'>
		                					<div class="col-md-4">
		                						<span class='project_name'>{{ $proposal->class . " - " . $proposal->internal_nickname }}</span>
		                					</div>
		                				</div>
		                			</a>
		                		@endforeach
		                	@else
		                		<div class='portfolio_project'>
		                				No Proposals
		                		</div>
		                	@endif
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
