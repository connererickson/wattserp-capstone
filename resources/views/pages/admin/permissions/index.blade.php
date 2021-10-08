@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Permissions for {{ $organization->name }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'users'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.users.index') }}">Users</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'permissions'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.permissions.index') }}">Permissions</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'modules'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.modules.index') }}">Modules</a>
	                			</li>
	                		</ul>
                		</div>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		<p class='ajax_success'>Permissions Updated</p>
                		<div id='permissions_index'>
	                		<?php 
	                			$inc = 1;
								$permission_roles = array();
								$checked = 0;
								$cats = array('employees'=>1, 'safety'=>1, 'training'=>1, 'jha'=>1, 'audit'=>1, 'incident'=>1, 'vehicle'=>1, 'projects'=>1, 'leads'=>1, 'archive'=>1, 'inventory'=>1, 'repository'=>1, 'directory'=>1, 'sales'=>1, 'misc'=>1);
							?>
	                		{!! Form::open([ 'route' => array('admin.permissions.update'), 'method' => 'post', 'id' => 'permissions_form' ]) !!}
	                		{!! Form::hidden('url', url('pages/admin/permissions/update'), ['id'=>'url']) !!}
	                		<table>
	                			<thead>
	                				<tr>
	                					<th>Permissions</th>
	                					@if ( $roles )
	                						@foreach( $roles as $role)
	                							@if ($role->id != 1000 && $role->id != 10001)
	                								<th>{{ $role->name }}</th>
	                							@endif
	                						@endforeach
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ( $permissions )
                						<!-- FOR EACH OF THE PERMISSIONS -->
                						@foreach( $permissions as $permission)
                						<tr>
                							
                							<!-- GET THE ROLES ASSOCIATED WITH THE CURRENT PERMISSION -->
                							@foreach ( $permission->roles as $role_relationship )	
                							<?php 
                								if ($role_relationship->pivot->org_id == $org_id){
                									$permission_roles[] = $role_relationship->pivot->role_id;
                								}?>
                							@endforeach
                							
                							@foreach($cats as $key => $cat)
                								@if ($permission->category == $key)
                									<?php if ($cats[$key] == 1){ ?>
	                									</tr><tr><td class='permissions_heading'><hr />
	                										<?php
	                										switch ($key){
																case 'employees' :
																	?> Employee Permissions <?php
																	break;
																case 'safety' :
																	?> Safety Permissions <?php
																	break;
																case 'training' :
																	?> Training Permissions <?php
																	break;
																case 'audit' :
																	?> Audit Permissions <?php
																	break;
																case 'jha' :
																	?> JHA Permissions <?php
																	break;
																case 'incident' :
																	?> Incident Permissions <?php
																	break;
																case 'vehicle' :
																	?> Vehicle Permissions <?php
																	break;
																case 'sales' :
																	?> Sales Permissions <?php
																	break;
																case 'projects' :
																	?> Projects Permissions <?php
																	break;
																case 'leads' :
																	?> Leads Permissions <?php
																	break;
																case 'archive' :
																	?> Archive Permissions <?php
																	break;
																case 'inventory' :
																	?> Inventory Permissions <?php
																	break;
																case 'repository' :
																	?> Repository Permissions <?php
																	break;
																case 'directory' :
																	?> Directory Permissions <?php
																	break;
																case 'misc' :
																	?> Miscellaneous Permissions <?php
																	break;
																default :
																	break;
															}
															?>
															<hr /></td></tr>
														<tr>
                									<?php } ?>
                									<?php $cats[$key] = 0; ?>
                								@endif
                							@endforeach
                							<td class='right'><span class='permission_name'>{{ $permission->display_name }}</span><div class='permission_description'>{{ $permission->description }}</div></td>
                							
                							<!-- FOR EACH OF THE ROLES -->
                							@foreach ( $roles as $role )
                								@if ($role->id != 1000 && $role->id != 10001)
	                								<td>
	                									<!-- IF THE ROLE ID IS ASSOCIATED WITH THE CURRENT PERMISSION, MARK THE CHECKBOX AS CHECKED -->
	                									@if ( in_array( $role->id, $permission_roles ) )
	                										<?php $checked = 1; ?>
	                									@endif
	                									{!! Form::checkbox('checkbox'.$inc, $role->id, $checked, ['id'=>$permission->id . "-" . $role->id, 'class'=>'form-control permission crm_checkbox']) !!}
	                									<?php $inc++; $checked = 0;?>
	                								</td>
	                							@endif
                							@endforeach
                							<?php $permission_roles = array(); ?>
                						</tr>
                						@endforeach
	                				@endif
	                			</tbody>
	                		</table>
	                		{!!Form::close() !!}
	                	</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
