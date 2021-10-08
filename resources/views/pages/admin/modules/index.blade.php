@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Modules for {{ $organization->name }}</div>
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
	                			@if (Auth::user()->authorizeRoles(array('God Mode')))
	                			<li 
	                				<?php if ($tab == 'permissions'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('admin.permissions.index') }}">Permissions</a>
	                			</li>
	                			@endif
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
                		<p class='ajax_success'>Modules Updated</p>
                		<div id='modules_index'>
	                		<?php
	                			$inc = 1;
								$module_roles = array();
								$checked = 0;
							?>
	                		{!! Form::open([ 'route' => array('admin.modules.update'), 'method' => 'post', 'id' => 'modules_form' ]) !!}
	                		{!! Form::hidden('url', url('pages/admin/modules/update'), ['id'=>'url']) !!}
	                		<table>
	                			<thead>
	                				<tr>
	                					<th>Modules</th>
	                					@if ( $roles )
	                						@foreach( $roles as $role)
	                							@if ($role->id != 1000)
	                								<th>{{ $role->name }}</th>
	                							@endif
	                						@endforeach
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ( $modules )
                						<!-- FOR EACH OF THE MODULES -->
                						@foreach( $modules as $module)
	                						@if ( $module->id != 1)
		                						<tr>
		                							
		                							<!-- GET THE ROLES ASSOCIATED WITH THE CURRENT MODULE -->
		                							@foreach ( $module->roles as $role_relationship )
		                								<?php 
		                								if ($role_relationship->pivot->org_id == $org_id){
		                									$module_roles[] = $role_relationship->pivot->role_id;
														}?>
		                							@endforeach
		
		                							<td class='right'><span class='module_name'>{{ $module->name }}</span><div class='module_description'>{{ $module->description }}</div></td>
		                							
		                							<!-- FOR EACH OF THE ROLES -->
		                							@foreach ( $roles as $role )
		                								@if ($role->id != 1000)
			                								<td>
			                									<!-- IF THE ROLE ID IS ASSOCIATED WITH THE CURRENT MODULE, MARK THE CHECKBOX AS CHECKED -->
			                									@if ( in_array( $role->id, $module_roles ) )
			                										<?php $checked = 1; ?>
			                									@endif
			                									{!! Form::checkbox('checkbox'.$inc, $role->id, $checked, ['id'=>$module->id . "-" . $role->id, 'class'=>'form-control module crm_checkbox']) !!}
			                									<?php $inc++; $checked = 0;?>
			                								</td>
			                							@endif
		                							@endforeach
		                							<?php $module_roles = array(); ?>
		                						</tr>
		                					@endif
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
