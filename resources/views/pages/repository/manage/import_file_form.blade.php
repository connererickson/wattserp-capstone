@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Import Parts</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('import_file_error'))
                                <p class='bg_fail'>{{ Session('import_file_error') }}</p>
                            @endif
                            <p>Part Import Instructions:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>File must be of type .CSV only</li>
                                        <li>File must contain the following column headings at a minimum
                                            <ul>
                                                <li>"Part Number"</li>
                                                <li>"Manufacturer" : Please ensure that column values will match to either a Company Name or Company Legal Name of a Company within the Directory</li>
                                                <li>"Description"</li>
                                                <li>"Type" : Please ensure that column values will match to an already defined Part Type</li>
                                                <li>"Pricing Unit" : i.e. "Count"</li>
                                                <li>"Stocking Unit" : i.e. "Count"</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Optional column headings that can be imported:</li>
                                            <ul>
                                                <li>"Length"</li>
                                                <li>"Length Unit" : Please ensure that column values will match an existing Unit, i.e. "Feet"</li>
                                                <li>"Height"</li>
                                                <li>"Height Unit" : Please ensure that column values will match an existing Unit, i.e. "Inches"</li>
                                                <li>"Width"</li>
                                                <li>"Width Unit" : Please ensure that column values will match an existing Unit, i.e. "Inches"</li>
                                                <li>"Weight"</li>
                                                <li>"Color" : Please ensure that column values will match an existing Color, i.e. "Red"</li>
                                                <li>"Volts"</li>
                                                <li>"Watts"</li>
                                                <li>"Amps"</li>
                                                <li>"Location"</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id='upload_part_list'>
                                        {!! Form::open(['method'=>'POST', 'action'=>'RepositoryController@process_import_file', 'class'=>'crm_form', 'id'=>'import_parts_form', 'enctype'=>'multipart/form-data', 'files' => true]) !!}
                                        <div class="row">
                                            <div class='col-md-6'>
                                                <div class='form-group'>
                                                    {!! Form::label('list_file', 'Upload Import File') !!}
                                                    {!! Form::file('list_file', ['class'=>'form-control']) !!}
                                                    {!! $errors->first('list_file', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <br />
                                                <div class='form-group'>
                                                    {!! Form::submit('Upload File', ['class'=>'crm_btn', 'id'=>'upload_list_file']) !!}
                                                    <a class='crm_btn2' href='{{ route('repository.manage') }}'>Cancel</a>
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
    </div>
</div>
@endsection