@extends('layouts.directory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Company Directory
                    @if (Auth::user()->hasPermission('create_company'))
                        <a class='crm_btn2 right_side' href="{{ route('directory.create' )}}">Create New Company</a>
                        <br class='clear_fix' />
                    @endif
                </div>

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
	                				<?php if ($tab == 'utilities'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.utilities') }}">Utilities</a>
	                			</li>
	                					
	                			<li 
	                				<?php if ($tab == 'municipalities'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.municipalities') }}">Municipalities</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'vendors'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.vendors') }}">Vendors</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'suppliers'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.suppliers') }}">Suppliers/Services</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'partners'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.partners') }}">Partners</a>
	                			</li>
	                			<li 
                                    <?php if ($tab == 'ckc_companies'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('directory.ckc_companies') }}">CKC Companies</a>
                                </li>
	                			<li 
	                				<?php if ($tab == 'manufacturers'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.manufacturers') }}">Manufacturers</a>
	                			</li>
	                			<li 
	                				<?php if ($tab == 'others'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('directory.others') }}">Other</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                
            		<div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('created_company'))
	                			<p class='bg_success'>{{ Session('created_company') }}</p>
	                		@endif
	                		@if(Session::has('updated_company'))
	                			<p class='bg_success'>{{ Session('updated_company') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					@if (Auth::user()->hasPermission('edit_company'))
	                					<th>Edit</th>
	                					@endif
	                					<th>Name</th>
	                					<th>Legal Name</th>
	                					<th>Nickname</th>
	                					<th>Type</th>
	                					<th>Last Updated</th>
	                					@if ($type == 'utilities' || $type == 'vendors' || $type == 'partners' || $type == 'ckc_companies')
	                					<th>Manage</th>
	                					@endif
	                					@if ($type == 'suppliers' || $type == 'municipalities' || $type == 'manufacturers' || $type == 'others')
	                					<th>Info</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				@if ($companies)
	                					@foreach($companies as $company)
			                				<tr>
			                					@if (Auth::user()->hasPermission('edit_company'))
			                					<td><a href="{{ route('directory.edit', $company->id)}}"><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon" /></a></td>
			                					@endif
			                					<td> {{ $company->company_name }} </td>
			                					<td> {{ $company->company_legal_name }} </td>
			                					<td> {{ $company->internal_nickname }} </td>
			                					<td> {{ $company->type }} </td>
			                					<td> {{ date('M d, Y', strtotime($company->updated_at)) }} </td>
			                					@if ($type == 'utilities' || $type == 'vendors' || $type == 'partners' || $type == 'ckc_companies')
			                					<td><a href="{{ route('directory.manage',['id' => $company->id, 'name' => $company->company_name, 'type' => $type]) }}">
			                							<img src="{{ URL::asset( '/images/gear.png' )}}" alt="" class="action_icon" />
			                						</a>
			                					</td>
			                					@endif
			                					@if ($type == 'suppliers' || $type == 'municipalities' || $type == 'manufacturers' || $type == 'others')
			                					<td><a href="{{ route('directory.manage',['id' => $company->id, 'name' => $company->company_name, 'type' => $type]) }}">
			                							<img src="{{ URL::asset( '/images/icon-info.png' )}}" alt="" class="action_icon" />
			                						</a>
			                					</td>
			                					@endif
			                				</tr>
	                					@endforeach
	                				@endif
	                				{{ $companies->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$companies->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
