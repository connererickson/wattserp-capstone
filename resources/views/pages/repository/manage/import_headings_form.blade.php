@extends('layouts.form')

@section('content')
<div class="container" id='import_part_container'>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Import Parts</div>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <div class="row" id='define_columns'>
                        <div>
                            @if ($headings)
                                <p>Please match up ERP data with columns identified in the import file uploaded.</p>
                                <?php 
                                $heading_tags = array(
                                    'Part Number' => 'part', 
                                    'Manufacturer' => 'manufacturer', 
                                    'Description' => 'description', 
                                    'Type' => 'type',
                                    'Pricing Unit' => 'pricing_unit',
                                    'Stocking Unit' => 'stocking_unit',
                                    'Length' => 'length',
                                    'Length Unit' => 'length_unit',
                                    'Height' => 'height',
                                    'Height Unit' => 'height_unit',
                                    'Width' => 'width',
                                    'Width Unit'=> 'width_unit',
                                    'Weight' => 'weight',
                                    'Color' => 'color',
                                    'Volts' => 'volts',
                                    'Watts' => 'watts',
                                    'Amps' => 'amps',
                                    'Location' => 'location'
                                );
                                ?>
                                {!! Form::open(['method'=>'POST', 'action'=>'RepositoryController@process_import_headings', 'class'=>'crm_form', 'id'=>'import_parts_headings']) !!}
                                    {!! Form::hidden('name', $name, ['class'=>'form-control']) !!}
                                    <div class="row">
                                            <?php $keys = array_keys( $heading_tags ); ?>
                                            @foreach($heading_tags as $key => $heading_tag)
                                                <div class="col-md-2">
                                                    <div class='heading_title'>{{ $key }}
                                                        @for ($i = 0; $i < 6; $i++)
                                                            @if ($heading_tags[$keys[$i]] == $heading_tags[$key])
                                                                <span>*</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <select name='{{ $heading_tags[$key] }}' class='form-control'>
                                                        <option value='select' {{ old($heading_tags[$key])=='select' ? 'selected="selected"' : '' }}>-- Select --</option>
                                                        <option value='no' {{ old($heading_tags[$key])=='no' ? 'selected="selected"' : '' }}>Not Used</option>
                                                        @foreach($headings[0][0] as $heading)
                                                            <option value="{{ $heading }}" {{ old($heading_tags[$key]) == $heading ? 'selected="selected"' : '' }}>{{ $heading }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first($heading_tags[$key], '<p class="help-block heading_field_error">:message</p>') !!}
                                                </div>
                                            @endforeach
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </tr>
                                    </div>
                                    <br /><br />
                                    {!! Form::submit('Import Parts', ['class'=>'crm_btn', 'id'=>'import_file_list']) !!}
                                    <a class='crm_btn2' href="{{ route('repository.manage') }}">Cancel</a>
                                {!! Form::close() !!}
                            @endif
                            <div id='part_import_loading_bar'>
                                <img src="{{ URL::asset( 'images/loading3.gif') }}" alt='' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                    