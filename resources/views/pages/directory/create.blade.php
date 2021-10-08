@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Company</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
					<div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li><a href="{{ route('directory') }}">Directory</a></li>
	                		</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
		                	<div id='create_directory_form'>
		                		{!! Form::open(['method'=>'POST', 'action'=>'DirectoryController@store', 'class'=>'crm_form']) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
			                			<div class='form-group'>
				                			{!! Form::label('company_name', 'Company Name') !!}
				                			{!! Form::text('company_name', null, ['class'=>'form-control']) !!}
				                			{!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('company_legal_name', 'Company Legal Name') !!}
			                				{!! Form::text('company_legal_name', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('company_legal_name', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('internal_nickname', 'Internal Nickname') !!}
			                				{!! Form::text('internal_nickname', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('internal_nickname', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('type', 'Company Type') !!}
				                			<select class='form-control' name='type'>
				                				<option value='Utility'>Utility</option>
				                				<option value='Municipality'>Municipality</option>
				                				<option value='Vendor'>Vendor</option>
				                				<option value='Supplier/Service'>Supplier</option>
				                				<option value='Partner'>Partner</option>
				                				<option value='CKC'>CKC Company</option>
				                				<option value='Manufacturer'>Manufacturer</option>
				                				<option value='Other'>Other</option>		                				
				                			</select>
				                			{!! $errors->first('type', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::submit('Create Company', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
				                			<a class='crm_btn2' href='{{ route('directory.index') }}'>Cancel</a>
				                		</div>
				                	</div>
				                	<div class='col-md-6'>
				                		<div>
				                			<ul>
				                				<li>A <strong>Utility</strong> Is A Utility Service Provider. An Example Would Be APS</li>
				                				<li>A <strong>Municipality</strong> Is An AHJ. An Example Would Be The City of Phoenix</li>
				                				<li>A <strong>Vendor</strong> Sells Material and Equipment. An Example Would Be CED</li>
				                				<li>A <strong>Supplier/Service</strong> Provides One-Time or Hourly Based Services. Examples Would Be Hole Drilling or Concrete Delivery / Pour</li>
				                				<li>A <strong>Partner</strong> Is a Fellow CKC or Similar Company. An Example Is Red Mountain Lighting</li>
				                				<li>A <strong>Manufacturer</strong> Creates Products. An Example Would Be SMA America</li>
				                			</ul>
				                		</div>
				                	</div>
			                	</div>
			                	{!! Form::close() !!}
		                	</div>
	                	</div>
	                </div>
	        	</div>
            </div>
        </div>
    </div>
</div>
@endsection