@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Project Attributes
                    <a class='crm_btn2 right_side right_pad' href="{{ route('leads.index' )}}"><i class="fas fas_left fa-caret-left"></i> Return to Portfolios</a>
                    <br class='clear_fix'/>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
	                	<div class="col-md-2">
							<ul id='administrate_functions_list' class='functions_list'>
								<li class='sidebar_function'>
									<a href="{{ route('leads.settings.project_attributes') }}" >Project Attributes</a>
								</li>
							</ul>
						</div>
						<div class="col-md-10" id='attributes_sections'>
							<div class="row attributes_section">
								<div class="col-md-12 no_pad_left">
									<h4>Residential</h4>
									<?php $curr_cat = ""; ?>
									<div class="row">
										@if ($meta_attributes)
											@foreach($meta_attributes as $attribute)
												@if ($attribute->class == 'Residential')
													@if ($curr_cat != $attribute->category)
														@if ($curr_cat != "")
															</div>
														@endif
														<?php $curr_cat = $attribute->category; ?>
														<div class="col-md-4 attribute_category">
														<h5>{{ $curr_cat }}</h5>
													@endif
													<div id='{{ $attribute->id }}' class='attribute_display'>{{ $attribute->display }}<i class="delete_attribute fas fas_right fa-trash-alt"></i></div>
												@endif
											@endforeach
											</div>
										@endif
									</div>
									<br class='clear_fix' />
									<hr />
									<div class="row">
										<div class="col-md-12">
											<h5>Add New Residential Attribute</h5>
											<form id='add_res_attribute' action='#' method='post'>
												<div class="row">
													<div class='form-group col-md-4'>
														<input type='hidden' name='class' value='Residential' class='form-control' />
														<input type='hidden' name='org_id' value='{{ $org_id }}' class='form-control' />
														<label for='category'>Select or Create A New Category</label>
														<select name='category' class='form-control' id='category_res'>
															<option value='0'>-- Select --</option>
															<option value='new'>Add New Category</option>
															<?php $used_arr = array(); ?>
															@foreach($meta_attributes as $attribute)
																@if ($attribute->class == 'Residential')
																	@if (!in_array($attribute->category, $used_arr))
																		<?php $used_arr[] = $attribute->category; ?>
																		<option value='{{ $attribute->category }}'>{{ $attribute->category }}</option>
																	@endif
																@endif
															@endforeach
														</select>
														<p class="help-block cat_error">Please Select A Attribute Category</p>
													</div>
													<div class='form-group col-md-3' id='new_category_res'>
														<label for='new_category'>New Category</label>
														<input type='text' name='new_category' class='form-control'/>
														<p class="help-block new_cat_error">Please Enter New Category</p>
													</div>
													<div class='form-group col-md-3'>
														<label for='attribute'>Attribute</label>
														<input type='text' name='attribute' class='form-control'/>
														<p class="help-block prop_error">Please Enter New Attribute</p>
													</div>
													<div class='form-group col-md-2'>
														<br />
														<button class='crm_btn add_project_attribute_button'>Add Attribute</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<br />
								</div>
							</div>

							<div class="row attributes_section">
								<div class="col-md-12 no_pad_left">
									<div class="col-md-12 no_pad_left">
										<h4>Commercial</h4>
										<?php $curr_cat = ""; ?>
										<div class="row">
											@if ($meta_attributes)
												@foreach($meta_attributes as $attribute)
													@if ($attribute->class == 'Commercial')
														@if ($curr_cat != $attribute->category)
															@if ($curr_cat != "")
																</div>
															@endif
															<?php $curr_cat = $attribute->category; ?>
															<div class="col-md-4 attribute_category">
															<h5>{{ $curr_cat }}</h5>
														@endif
														<div id='{{ $attribute->id }}' class='attribute_display'>{{ $attribute->display }}<i class="delete_attribute fas fas_right fa-trash-alt"></i></div>
													@endif
												@endforeach
											@endif
										</div>
										<br class='clear_fix' />
										<hr />
										<div class="row">
											<div class="col-md-12">
												<h5>Add New Commercial Attribute</h5>
												<form id='add_com_attribute' action='#' method='post'>
													<div class="row">
														<div class='form-group col-md-4'>
															<input type='hidden' name='class' value='Commercial' class='form-control' />
															<input type='hidden' name='org_id' value='{{ $org_id }}' class='form-control' />
															<label for='category'>Select or Create A New Category</label>
															<select name='category' class='form-control' id='category_com'>
																<option value='0'>-- Select --</option>
																<option value='new'>Add New Category</option>
																<?php $used_arr = array(); ?>
																@foreach($meta_attributes as $attribute)
																	@if ($attribute->class == 'Commercial')
																		@if (!in_array($attribute->category, $used_arr))
																			<?php $used_arr[] = $attribute->category; ?>
																			<option value='{{ $attribute->category }}'>{{ $attribute->category }}</option>
																		@endif
																	@endif
																@endforeach
															</select>
															<p class="help-block cat_error">Please Select A Attribute Category</p>
														</div>
														<div class='form-group col-md-3' id='new_category_com'>
															<label for='new_category'>New Category</label>
															<input type='text' name='new_category' class='form-control'/>
															<p class="help-block new_cat_error">Please Enter New Category</p>
														</div>
														<div class='form-group col-md-3'>
															<label for='attribute'>Attribute</label>
															<input type='text' name='attribute' class='form-control'/>
															<p class="help-block prop_error">Please Enter New Attribute</p>
														</div>
														<div class='form-group col-md-2'>
															<br />
															<button class='crm_btn add_project_attribute_button'>Add Attribute</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										<br />
									</div>
								</div>
							</div>
							<div class="row attributes_section">
								<div class="col-md-12 no_pad_left">
									<h4>Utility</h4>
									<?php $curr_cat = ""; ?>
									<div class="row">
										@if ($meta_attributes)
											@foreach($meta_attributes as $attribute)
												@if ($attribute->class == 'Utility')
													@if ($curr_cat != $attribute->category)
														@if ($curr_cat != "")
															</div>
														@endif
														<?php $curr_cat = $attribute->category; ?>
														<div class="col-md-4 attribute_category">
														<h5>{{ $curr_cat }}</h5>
													@endif
													<div id='{{ $attribute->id }}' class='attribute_display'>{{ $attribute->display }}<i class="delete_attribute fas fas_right fa-trash-alt"></i></div>
												@endif
											@endforeach
										@endif
									</div>
									<br class='clear_fix' />
									<hr />
									<div class="row">
										<div class="col-md-12">
												<h5>Add New Utility Attribute</h5>
												<form id='add_util_attribute' action='#' method='post'>
													<div class="row">
														<div class='form-group col-md-4'>
															<input type='hidden' name='class' value='Utility' class='form-control' />
															<input type='hidden' name='org_id' value='{{ $org_id }}' class='form-control' />
															<label for='category'>Select or Create A New Category</label>
															<select name='category' class='form-control' id='category_util'>
																<option value='0'>-- Select --</option>
																<option value='new'>Add New Category</option>
																<?php $used_arr = array(); ?>
																@foreach($meta_attributes as $attribute)
																	@if ($attribute->class == 'Utility')
																		@if (!in_array($attribute->category, $used_arr))
																			<?php $used_arr[] = $attribute->category; ?>
																			<option value='{{ $attribute->category }}'>{{ $attribute->category }}</option>
																		@endif
																	@endif
																@endforeach
															</select>
															<p class="help-block cat_error">Please Select A Attribute Category</p>
														</div>
														<div class='form-group col-md-3' id='new_category_util'>
															<label for='new_category'>New Category</label>
															<input type='text' name='new_category' class='form-control'/>
															<p class="help-block new_cat_error">Please Enter New Category</p>
														</div>
														<div class='form-group col-md-3'>
															<label for='attribute'>Attribute</label>
															<input type='text' name='attribute' class='form-control'/>
															<p class="help-block prop_error">Please Enter New Attribute</p>
														</div>
														<div class='form-group col-md-2'>
															<br />
															<button class='crm_btn add_project_attribute_button'>Add Attribute</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										<br />
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
