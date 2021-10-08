@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Part</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
	                <div class="row">
	                	<div class="col-md-12">
		                	<div id='create_repository_part_form'>
		                		{!! Form::model($repository_part, ['method' => 'PATCH', 'route' => array('repository.manage.update_part', $repository_part->id)]) !!}
		                		<div class="row">
			                		<div class='col-md-6'>
				                		<div class='form-group'>
			                				{!! Form::label('part_no', 'Part #') !!}
			                				{!! Form::text('part_no', null, ['class'=>'form-control']) !!}
			                				{!! $errors->first('part_no', '<p class="help-block">:message</p>') !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('manufacturer', 'Manufacturer') !!}
			                				<select class='form-control' name='manufacturer'>
				                				<option value='0'>-- Select --</option>
				                				@if ($manufacturers)
					                				@foreach($manufacturers as $manufacturer)
					                					<option value="{{ $manufacturer->id }}"
					                						@if($manufacturer->id == $repository_part->manufacturer) 
					                							selected='selected' 
					                						@endif >
					                						{{ $manufacturer->company_name . " - " . $manufacturer->internal_nickname }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='manufacturer_error'></p>
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('description', 'Description') !!}
			                				<br />
				                			{!! Form::textarea('description', null, ['rows' => 4, 'cols' => 106, 'style'=>'resize:none']) !!}
				                		</div>
			                			<div class='form-group'>
				                			{!! Form::label('length', 'Length') !!}
				                			<br />
				                			{!! Form::text('length', null, ['class'=>'form-control short_text']) !!}
				                			<select class='form-control float_select' name='length_unit'>
				                				<option value='0'>-- Select --</option>
				                				@if ($units)
					                				@foreach($units as $unit)
					                					<option value="{{ $unit->id }}"
					                						@if($unit->id == $repository_part->length_unit) 
					                							selected='selected' 
					                						@endif >
					                						{{ $unit->unit }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='length_error'></p>
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('width', 'Width') !!}
				                			<br />
				                			{!! Form::text('width', null, ['class'=>'form-control short_text']) !!}
				                			<select class='form-control float_select' name='width_unit'>
				                				<option value='0'>-- Select --</option>
				                				@if ($units)
					                				@foreach($units as $unit)
					                					<option value="{{ $unit->id }}"
					                						@if($unit->id == $repository_part->width_unit) 
					                							selected='selected' 
					                						@endif >
					                						{{ $unit->unit }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='width_error'></p>
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('height', 'Height') !!}
				                			<br />
				                			{!! Form::text('height', null, ['class'=>'form-control short_text']) !!}
				                			<select class='form-control float_select' name='height_unit'>
				                				<option value='0'>-- Select --</option>
				                				@if ($units)
					                				@foreach($units as $unit)
					                					<option value="{{ $unit->id }}"
					                						@if($unit->id == $repository_part->height_unit) 
					                							selected='selected' 
					                						@endif >
					                						{{ $unit->unit }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='height_error'></p>
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('weight', 'Weight') !!}
				                			{!! Form::text('weight', null, ['class'=>'form-control']) !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('color', 'Color') !!}
				                			<select class='form-control' name='color'>
				                				<option value='0'>-- Select --</option>
				                				@if ($colors)
					                				@foreach($colors as $color)
					                					<option value="{{ $color->id }}"
					                						@if($color->id == $repository_part->color) 
					                							selected='selected' 
					                						@endif >
					                						{{ $color->color_name }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('volts', 'Volts') !!}
				                			{!! Form::text('volts', null, ['class'=>'form-control']) !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('watts', 'Watts') !!}
				                			{!! Form::text('watts', null, ['class'=>'form-control']) !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('amps', 'Amps') !!}
				                			{!! Form::text('amps', null, ['class'=>'form-control']) !!}
				                		</div>
				                		<div class='form-group'>
				                			{!! Form::label('stock', 'Stock') !!}
				                			{!! Form::text('stock', null, ['class'=>'form-control']) !!}
				                		</div>
				                		<div class='form-group'>
			                				{!! Form::label('unit', 'Pricing Unit') !!}
			                				<select class='form-control' name='pricing_unit'>
				                				<option value='0'>-- Select --</option>
				                				@if ($units)
					                				@foreach($units as $unit)
					                					<option value="{{ $unit->id }}"
					                						@if($unit->id == $repository_part->pricing_unit) 
					                							selected='selected' 
					                						@endif >
					                						{{ $unit->unit }}
					                					</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='unit_error'></p>
			                			</div>
			                			<div class='form-group'>
			                				{!! Form::label('unit', 'Stocking Unit') !!}
			                				<select class='form-control' name='stocking_unit'>
				                				<option value='0'>-- Select --</option>
				                				@if ($units)
					                				@foreach($units as $unit)
					                					<option value="{{ $unit->id }}"
					                						@if($unit->id == $repository_part->stocking_unit) 
					                							selected='selected' 
					                						@endif >
					                					{{ $unit->unit }}</option>
					                				@endforeach
					                			@endif
				                			</select>
				                			<p class="help-block" id='unit_error'></p>
			                			</div>
				                	</div>
				                	<div class='col-md-6'>
				                		&nbsp;
				                	</div>
				                </div>
				                <div class='row'>
				                	<div class='col-md-6'>
				                		<div class='form-group'>
				                			{!! Form::submit('Edit Part', ['class'=>'crm_btn', 'id'=>'submit_edit_part_form']) !!}
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
@endsection