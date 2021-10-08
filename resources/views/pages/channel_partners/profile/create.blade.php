@extends('layouts.sales')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Channel Partner Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            
                    <div class="row">
                        <div class="col-md-12">
                            <div id='channel_partner_profile_form'>
                                {!! Form::open(['method'=>'POST', 'action'=>'ChannelPartnerController@profile_store', 'class'=>'crm_form']) !!}
                                <div class="row">
                                    <div class='col-md-12'>
                                        <h5>Company Information</h5>
                                        <hr />
                                    </div>
                                </div>      
                                <div class="row" id='company_information_row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::hidden('user_id', $user, ['id'=>'user_id']) !!}
                                            {!! Form::label('cp_company_name', 'Channel Partner Company Name') !!}
                                            {!! Form::text('cp_company_name', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_company_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_main_phone', 'Main Phone #') !!}
                                            {!! Form::text('cp_main_phone', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_main_phone', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-5'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_mailing_address', 'Mailing Address') !!}
                                            {!! Form::text('cp_mailing_address', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_mailing_address', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_mailing_city', 'City') !!}
                                            {!! Form::text('cp_mailing_city', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_mailing_city', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_mailing_state', 'State') !!}
                                            {!! Form::select('cp_mailing_state', $states, 'AZ', ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_mailing_state', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_mailing_zip', 'Zip') !!}
                                            {!! Form::text('cp_mailing_zip', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_mailing_zip', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_website', 'Website Address') !!}
                                            {!! Form::text('cp_website', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_website', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_taxid', 'Tax-ID / FEIN#') !!}
                                            {!! Form::text('cp_taxid', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_taxid', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-12'>
                                        <h5>Main Partner Contact</h5>
                                        <hr />
                                    </div>
                                </div>    
                                <div class="row" id='main_contact_row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_main_contact_name', 'Contact Name') !!}
                                            {!! Form::text('cp_main_contact_name', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_main_contact_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_main_contact_title', 'Contact Title') !!}
                                            {!! Form::text('cp_main_contact_title', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_main_contact_title', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_main_contact_email', 'Email Address') !!}
                                            {!! Form::text('cp_main_contact_email', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_main_contact_email', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('cp_main_contact_direct', 'Direct Phone') !!}
                                            {!! Form::text('cp_main_contact_direct', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('cp_main_contact_direct', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-12'>
                                        <h5>Referring Sales Contacts</h5>
                                        <h6>Additional Individuals From Main Contact</h6>
                                        <hr />
                                        <div id='referring_contacts_container'></div>
                                        <button class='crm_btn' id='add_sales_contact'>Add Referring Sales Contact</button>
                                        <button class='crm_btn2' id='remove_sales_contact'>Remove Sales Contact</button>
                                    </div>
                                </div>
                                <br /><br />
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::submit('Create Profile', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
                                            <a class='crm_btn2' href='{{ route('profile.index') }}'>Cancel</a>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        &nbsp;
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
                                
                                
                                
                                
                                
                                
<div class="row referring_contact_inner" id='referring_contact_template'>                 
    <div class="row" id='referring_contact_info'>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_contact_name', 'Contact Name') !!}
                {!! Form::text('cp_contact_name', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_contact_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_contact_title', 'Contact Title') !!}
                {!! Form::text('cp_contact_title', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_contact_title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_contact_email', 'Email Address') !!}
                {!! Form::text('cp_contact_email', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_contact_email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_contact_direct', 'Direct Phone') !!}
                {!! Form::text('cp_contact_direct', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_contact_direct', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12'>
            <h5>Information for the Payment</h5>
            <hr />
        </div>
    </div>
    <div class="row" id='referring_contact_payment'>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_check_name', 'Name On Check') !!}
                {!! Form::text('cp_check_name', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_check_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_check_id', 'Unique Identifier # (If Required)') !!}
                {!! Form::text('cp_check_id', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_check_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_check_address', 'Mailing Address for Check') !!}
                {!! Form::text('cp_check_address', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_check_address', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                {!! Form::label('cp_check_attn', 'Mail Attention To Whom / What Department') !!}
                {!! Form::text('cp_check_attn', null, ['class'=>'form-control']) !!}
                {!! $errors->first('cp_check_attn', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>