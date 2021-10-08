@extends('layouts.app')

@section('content')
<div class="container">
	<style type='text/css'>
		
	</style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span>Form Builder</span>
                	<div id='update_notification'>All Changes Saved!</div>
                	<!--<div class='right_side'>
                		<span>Form Type:</span>
                		<select id='form_type'>
                			<option value='0'>-- Select --</option>
                			<option value='audit'>Audit Form</option>
                			<option value='jha'>JHA Form</option>
                			<option value='incident'>Incident Form</option>
                		</select>
                		<br />
                		<span id='form_type_warning'>Please select a form type</span>
                	</div>-->
                	<br style='clear: both;' />
                </div>
                <div class="panel-body">
                    <div class="row">
        				<div class="col-md-2" id='form_tools'>
        					<ul>
        						<li id='heading'>Add Heading / Instructions</li>
        						<li id='text'>Add Text Input</li>
        						<li id='textarea'>Add Text Area Input</li>
        						<li id='checkbox'>Add Checkbox</li>
        						<li id='dropdown'>Add Drop Down</li>
        						<li id='radio'>Add Radio Buttons</li>
        					</ul>
        				</div>
        				<div class="col-md-10">
        				    <div id='form_name_container'>
                                <span>Form Name:</span>
                                <input type='text' name='name' id='form_name' />
                                <span id='form_name_warning'>Please enter a form name</span>
                            </div>
        					<div id='form_build' class='grid'>
        						<div class="grid-sizer"></div>
        						
        					</div>
        				</div>
        			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
