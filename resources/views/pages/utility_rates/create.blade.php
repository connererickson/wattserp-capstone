@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Utility Rate for {{ $utility->company_name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div id='create_rate_form'>
                                {!! Form::open(['method'=>'POST', 'action'=>'UtilityRatesController@store', 'class'=>'crm_form']) !!}
                                {{ Form::hidden('utility', $utility->id) }}
                                {{ Form::hidden('utility_name', $utility->company_name) }}
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('rate_name', 'Rate Name') !!}
                                            {!! Form::text('rate_name', null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('rate_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="row">
                                            <div class='col-md-6'>
                                                <div class='form-group'>
                                                    {!! Form::label('service_charge_type', 'Service Charge Type') !!}
                                                    <select class='form-control' name='service_charge_type'>
                                                        <option value='select'>-- Select --</option>
                                                        <option value='no_service_charge'>No Service Charge</option>
                                                        <option value='fixed_monthly_charge'>Fixed Monthly Charge</option>
                                                        <option value='daily_charge'>Daily Charge</option>                                       
                                                    </select>
                                                    {!! $errors->first('service_charge_type', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class='col-md-6' id='fixed_charge_container'>
                                                <div class='form-group input-icon'>
                                                    {!! Form::label('fixed_charge', 'Fixed Charge Amount') !!}
                                                    {!! Form::text('fixed_charge', null, ['class'=>'form-control']) !!}
                                                    <i>$</i>
                                                    {!! $errors->first('fixed_charge', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class='col-md-6' id='daily_charge_container'>
                                                <div class='form-group input-icon'>
                                                    {!! Form::label('daily_charge', 'Daily Charge Amount') !!}
                                                    {!! Form::text('daily_charge', null, ['class'=>'form-control']) !!}
                                                    <i>$</i>
                                                    {!! $errors->first('daily_charge', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {!! Form::label('rate_description', 'Rate Description') !!}
                                            {!! Form::textarea('rate_description', null, ['class'=>'form-control erp_textarea rate_description']) !!}
                                            {!! $errors->first('rate_description', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row" id="year_container">
                                    <div class="col-md-1">
                                        Month
                                    </div>
                                    <div class="col-md-4">
                                        Demand
                                    </div>
                                    <div class="col-md-4">
                                        Usage Charge
                                    </div>
                                    <div class="col-md-3">
                                        Adjustor
                                    </div>
                                </div>
                                <br />
                                <div class="row" id="january_container">
                                    <div class="col-md-1">
                                        January
                                    </div>
                                    <div class="col-md-4">
                                        <div class='form-group'>
                                            <select class='form-control' name='demand'>
                                                <option value='no'>No Demand</option>
                                                <option value='yes'>Demand</option>                                       
                                            </select>
                                            <a class="crm_btn3" id="demand_add_period"><i class="far fa-plus-square"></i> Add Period</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="crm_btn3" id="usage_add_period"><i class="far fa-plus-square"></i> Add Period</a>
                                    </div>     
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class='form-group'>
                                                    <label for='adjust_type'>Type</label>
                                                    <select class='form-control adjustor_type' name='adjustor_type'>
                                                        <option value='none'>None</option>
                                                        <option value='adjust_per_kwh'>$ / kWh</option>
                                                        <option value='adjust_per_kw'>$ / kW</option>                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class='form-group adjust_amount_group'>
                                                    <label for='adjust_amount' class='adjustor_amount_label'>Add $ / kWh</label>
                                                    {!! Form::text('adjust_amount', null, ['class'=>'form-control adjust_amount']) !!}
                                                    {!! $errors->first('adjust_amount', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
                                </div>
                                
                                            
                                            
                                            <!--
                                            {!! Form::label('rate_type', 'Rate Type') !!}
                                            <select class='form-control' name='rate_type'>
                                                <option value='select'>-- Select --</option>
                                                <option value='time_of_use'>Time-Of-Use</option>
                                                <option value='flat_rate'>Flat Rate</option>
                                                <option value='tiered'>Tiered</option>                                       
                                            </select>
                                            {!! $errors->first('rate_type', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class='col-md-6' id='flat_rate_container'>
                                        <div class='form-group input-icon'>
                                            {!! Form::label('flat_rate', 'Flat Rate ( per kWh )') !!}
                                            {!! Form::text('flat_rate', null, ['class'=>'form-control']) !!}
                                            <i>$</i>
                                            {!! $errors->first('flat_rate', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id='tou_rate_container'>
                                    <div class='col-md-12'>
                                        <div class="row">
                                            <div class='col-md-12' id='intervals'>
                                                <button class='crm_btn' id='add_interval'>Add Interval</button>
                                            </div>
                                        </div>
                                        <div class="row" id='tou_graphic'>
                                            <canvas id="tou_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id='tiered_rate_container'>
                                    <div class='col-md-10' id='tiers'>
                                        <button class='crm_btn' id='add_tier'>Add Tier</button>
                                    </div>
                                    <div class='col-md-2' id='graph'>
                                        <canvas id="tiered_chart"></canvas>
                                    </div>
                                </div>
                                <br />-->
                                
                                <div class="row" id='rate_form_controls'>
                                    <div class='col-md-12'>
                                        <input type='submit' value='Submit' class='crm_btn'>
                                        <a class='crm_btn2' href='{{ route('utility_rates.index', $utility) }}'>Cancel</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class='row' id='rate_form_templates'>
                        <div class="row" id="demand_period_row">
                            <div class='col-md-4'>
                                {!! Form::label('max_demand', 'Type') !!}
                                <select class='form-control' name='max_demand'>
                                    <option value='no_max'>No Max</option>
                                    <option value='max'>Max kW</option>                                       
                                </select>
                            </div>
                            <div class='col-md-3 demand_limit' style='display: none;'>
                                {!! Form::label('demand_limit', 'Max') !!}
                                {!! Form::text('demand_limit', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('demand_limit', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class='col-md-3'>
                                {!! Form::label('demand_cost', '$ / kW') !!}
                                {!! Form::text('demand_cost', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('demand_cost', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class='col-md-2'>
                                <a class="delete_demand_period">
                                    <img src="http://localhost/crm/public/images/delete.png" alt="" class="action_icon delete_icon">
                                </a>
                            </div>
                            <div class='col-md-12'>
                                <div class="row demand_period_row">
                                    <div class='col-md-6'>
                                        {!! Form::label('demand_interval_start', 'From') !!}
                                        {!! Form::text('demand_interval_start', null, ['class'=>'form-control timepicker demand_interval_start']) !!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        {!! $errors->first('demand_interval_start', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class='col-md-6'>
                                        {!! Form::label('demand_interval_stop', 'To') !!}
                                        {!! Form::text('demand_interval_stop', null, ['class'=>'form-control timepicker demand_interval_stop']) !!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        {!! $errors->first('demand_interval_stop', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="kwh_period_row">
                            <div class='col-md-4'>
                                {!! Form::label('max_kwh', 'Type') !!}
                                <select class='form-control' name='max_kwh'>
                                    <option value='no_max'>No Max</option>
                                    <option value='max'>Max kWh</option>
                                    <option value='per kW'>Per kW</option>
                                </select>
                            </div>
                            <div class='col-md-3 kwh_limit' style='display: none;'>
                                {!! Form::label('kwh_limit', 'Max') !!}
                                {!! Form::text('kwh_limit', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('kwh_limit', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class='col-md-3'>
                                {!! Form::label('kwh_cost', '$ / kWh') !!}
                                {!! Form::text('kwh_cost', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('kwh_cost', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class='col-md-2'>
                                <a class="delete_usage_period">
                                    <img src="http://localhost/crm/public/images/delete.png" alt="" class="action_icon delete_icon">
                                </a>
                            </div>
                            <div class='col-md-12'>
                                <div class="row kwh_period_row">
                                    <div class='col-md-6'>
                                        {!! Form::label('kwh_interval_start', 'From') !!}
                                        {!! Form::text('kwh_interval_start', null, ['class'=>'form-control timepicker kwh_interval_start']) !!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        {!! $errors->first('kwh_interval_start', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class='col-md-6'>
                                        {!! Form::label('kwh_interval_stop', 'To') !!}
                                        {!! Form::text('kwh_interval_stop', null, ['class'=>'form-control timepicker kwh_interval_stop']) !!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        {!! $errors->first('kwh_interval_stop', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div> 
                            
                            
                        
                        
                        
                        
                        <div class='col-md-12'>
                            <div class='row tiered_row' id='tiered_row'>
                                <div class='col-md-3'>
                                    <span class='tier_label'>Tier 1</span>
                                </div>
                                <div class='col-md-4'>
                                    {!! Form::label('rate_tier', 'Rate Tier ( kWhs )') !!}
                                    {!! Form::text('rate_tier', null, ['class'=>'form-control']) !!}
                                    {!! $errors->first('rate_tier', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-4'>
                                    {!! Form::label('tier_cost', 'Tier Cost ( $ / kWh )') !!}
                                    {!! Form::text('tier_cost', null, ['class'=>'form-control']) !!}
                                    {!! $errors->first('tier_cost', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-1'>
                                    <a class="remove_tier">
                                        <img src="http://localhost/crm/public/images/delete.png" alt="" class="action_icon delete_icon">
                                    </a>
                                </div>
                            </div>
                            <div class='row interval_row' id='interval_row'>
                                <div class='col-md-4'>
                                    {!! Form::label('interval_name', 'Interval Name') !!}
                                    {!! Form::text('interval_name', null, ['class'=>'form-control interval_name']) !!}
                                    {!! $errors->first('interval_name', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-2'>
                                    {!! Form::label('rate_interval_start', 'Rate Interval Start') !!}
                                    {!! Form::text('rate_interval_start', null, ['class'=>'form-control timepicker rate_interval_start']) !!}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    {!! $errors->first('rate_interval_start', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-2'>
                                    {!! Form::label('rate_interval_end', 'Rate Interval End') !!}
                                    {!! Form::text('rate_interval_end', null, ['class'=>'form-control timepicker rate_interval_end']) !!}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    {!! $errors->first('rate_interval_end', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-3'>
                                    {!! Form::label('interval_cost', 'Interval Cost ( $ / kWh )') !!}
                                    {!! Form::text('interval_cost', null, ['class'=>'form-control interval_cost']) !!}
                                    {!! $errors->first('interval_cost', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class='col-md-1'>
                                    <a class="remove_interval">
                                        <img src="http://localhost/crm/public/images/delete.png" alt="" class="action_icon delete_icon">
                                    </a>
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