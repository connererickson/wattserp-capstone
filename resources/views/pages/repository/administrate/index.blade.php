@extends('layouts.inventory')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Administrate Repository</div>

                <div class="card-body" id='administrate_repository'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
					<div class="row">
						<div class="col-md-2">
							<ul id='administrate_functions_list' class='functions_list'>
								<!--<li class='sidebar_function'>
									<a href='#' id='organizations_button'>Organizations</a>
								</li>
								<li class='sidebar_function'>
									<a href='#' id='kitting_button'>Kitting</a>
								</li>-->
								<li class='sidebar_function'>
									<a href='#' id='types_button'>Types &amp; Tags</a>
								</li>
								<li class='sidebar_function'>
									<a href='#' id='units_colors_button'>Units &amp; Colors</a>
								</li>
							</ul>
						</div>
						<div class="col-md-10">
							<!--<div id='organizations' class='administrate_function_container'>
								<h4>Organizations</h4>
								<p>This area is still under construction</p>
							</div>
							<div id='kitting' class='administrate_function_container'>
								<h4>Kitting</h4>
								<p>This area is still under construction</p>
							</div>-->
							<div id='types_tags' class='administrate_function_container'>
								<h3>Types</h3>
								<div class="row" id='types'>
									@if ($types)
										@foreach($types as $type)
											<div class="col-md-6 type_container">
												<span class='type_name'>{{ $type->type }}</span>
												<span>Filter: </span>
												<?php $checked = 0; ?>
												@if ( $type->is_filter )
	        										<?php $checked = 1; ?>
	        									@endif
												{!! Form::checkbox('checkbox'.$type->id, $type->id, $checked, ['id'=>$type->id, 'class'=>'form-control repository_type_filter_checkbox crm_checkbox']) !!}
												<?php $checked = 0;?>
												<span id='delete{{ $type->id }}'>
													<img src="{{ URL::asset( 'images/delete.png' ) }}" alt="" class="action_icon delete_icon">
												</span>
											</div>
										@endforeach
									@endif
								</div>
								<hr />
								<div class="row">
									<div class="col-md-12">
										<div id='create_type_form'>
											<h4>Add New Type</h4>
											<div class="row">
												<div class="col-md-4">
													{!! Form::label('type', 'Type') !!}
				                					{!! Form::text('type', null, ['class'=>'form-control']) !!}
				                					<div id='new_type_error'></div>
				                				</div>
				                				<div class="col-md-1">
						                			{!! Form::label('filter', 'Filter') !!}
						                			<br />
						                			{!! Form::checkbox('filter', 0, false, ['class'=>'form-control crm_checkbox']) !!}
						                		</div>
						                		<div class="col-md-7">
						                			<br />
													<input type='button' id='new_type_submit' class="crm_btn2" value='Add New Type' />
												</div>
											</div>
										</div>
									</div>
								</div>
								<br />
								<hr />
								<div class="row" id='tags'>
									<div class="col-md-8">
										<h3>Tags</h3>
										@if ($types_tags && $types)
											@foreach ($types as $type)
												<div class='tagtype_container' id='type{{ $type->id }}'>
													<h4>{{ $type->type }}</h4><a href='' class='crm_btn_red remove_tag_from_type'>Remove Selected Tag(s) From Type</a>
													<br />
													@foreach($types_tags as $type_tag)
														@if ($type_tag->type_id == $type->id)
															<div class='repo_tag draggable' id='{{ $type_tag->tag_id }}'><a href='#' class='repo_tag_a'>{{ $type_tag->tag }}</a></div>
														@endif
													@endforeach
													<div class='target' id='{{ $type->id }}'></div>
												</div>
											@endforeach
										@endif
									</div>
									<div class="col-md-4">
										<h3>Tag Bank</h3><a href='' class='crm_btn_red' id='delete_selected_tags'>Delete All Selected Tags</a>
										@if ($tag_bank)
											<div class='tags_container'>
												@foreach ($tag_bank as $tag)
													<div class='repo_tag draggable' id='{{ $tag->id }}'><a href='#' class='repo_tag_a'>{{ $tag->tag }}</a></div>
												@endforeach	
											</div>
										@endif
										<hr />
										<div id='create_tag_form'>
											<h3>Create Tag</h3>
											<br />
											{!! Form::label('tag', 'Tag') !!}
				                			{!! Form::text('tag', null, ['class'=>'form-control']) !!}
				                			<div id='new_tag_error'></div>
				                			<br />
				                			<input type='button' id='new_tag_submit' class="crm_btn2" value='Add New Tag' />
				                		</div>
									</div>
								</div>
							</div>
							<div id='units_colors' class='administrate_function_container'>
								<h3>Units</h3>
								<div class="row">
									<div class="col-md-12">
										@if($units)
											<table class='table' id='units'>
												<thead>
													<th>Unit Name</th>
													<th>Unit Display</th>
													<th>Unit Mark</th>
													<th>Delete</th>
												</thead>
												<tbody>
													@foreach($units as $unit)
														@if ($unit->id != 0)
														<tr>
															<td>{{ $unit->unit }}</td>
															<td>{{ $unit->alternate_display }}</td>
															<td>{{ $unit->unit_mark }}</td>
															<td>
																<span id='delete{{ $unit->id }}'>
																	<img src="{{ URL::asset( 'images/delete.png' ) }}" alt="" class="action_icon delete_icon delete_unit">
																</span>
															</td>
														</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										@endif
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-12">
										<div id='create_unit_form'>
											<h4>Add New Unit</h4>
											<div class="row">
												<div class="col-md-4">
													{!! Form::label('unit', 'Unit Name') !!}
				                					{!! Form::text('unit', null, ['class'=>'form-control']) !!}
				                					<div id='new_unit_name_error'></div>
				                				</div>
				                				<div class="col-md-2">
						                			{!! Form::label('alternate_display', 'Unit Display') !!}
				                					{!! Form::text('alternate_display', null, ['class'=>'form-control']) !!}
				                					<div id='new_unit_alt_error'></div>
						                		</div>
						                		<div class="col-md-2">
						                			{!! Form::label('unit_mark', 'Unit Mark') !!}
				                					{!! Form::text('unit_mark', null, ['class'=>'form-control']) !!}
				                					<div id='new_unit_mark_error'></div>
						                		</div>
						                		<div class="col-md-7">
						                			<br />
													<input type='button' id='new_unit_submit' class="crm_btn2" value='Add New Unit' />
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-8">
										<h3>Colors</h3>
										@if ($colors)
											<table class='table' id='colors'>
												<thead>
													<th>Color Name</th>
													<th>Color</th>
													<th>Delete</th>
												</thead>
												<tbody>
													@foreach ($colors as $color)
														@if ($color->id != 0)
														<tr>
															<td>{{ $color->color_name }}</td>
															<td><span class='color_box' style='background-color: {{ $color->color_code }}'></span></td>
															<td>
																<span id='delete{{ $color->id }}'>
																	<img src="{{ URL::asset( 'images/delete.png' ) }}" alt="" class="action_icon delete_icon delete_color">
																</span>
															</td>
														</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										@endif
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-12">
										<div id='create_color_form'>
											<h4>Add New Color</h4>
											<div class="row">
												<div class="col-md-4">
													{!! Form::label('color', 'Color Name') !!}
				                					{!! Form::text('color', null, ['class'=>'form-control']) !!}
				                					<div id='new_color_name_error'></div>
				                					<br style='clear:both'/>
													<input type='button' id='new_color_submit' class="crm_btn2" value='Add New Color' />
				                				</div>
						                		<div class="col-md-2">
						                			{!! Form::label('color_code', 'Color') !!}
						                			<span class='color_box color_pickr'></span>
				                					{!! Form::text('color_code', null, ['class'=>'form-control hidden']) !!}
				                					<div id='new_color_code_error'></div>
						                		</div>
						                		<div class="col-md-7">
						                			&nbsp;
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
        </div>
    </div>
</div>
@endsection

