@extends('layouts.projects')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span class='page_title'>Portfolios</span>
                	@if (Auth::user()->hasPermission('create_project_leads'))
	        			<a class='crm_btn2 right_side' href="{{ route('leads.settings.index' )}}"><i class="fas fa-cogs"></i></a>
	        		@endif
                	@if (Auth::user()->hasPermission('create_project_leads'))
	        			<a class='crm_btn2 fas_left right_side' href="{{ route('leads.create_portfolio' )}}">Create New Customer Portfolio <i class="fas fas_right fa-folder-plus"></i></a>
	        		@endif
	        		<br class='clear_fix'/>
                </div>

                <div class="panel-body">
                	
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                    	<div class="col-md-12">
							@if(Session::has('created_portfolio'))
		            			<p class='bg_success'>{{ Session('created_portfolio') }}</p>
		            		@endif
		            		@if(Session::has('updated_portfolio'))
		            			<p class='bg_success'>{{ Session('updated_portfolio') }}</p>
		            		@endif
		            	</div>
		            </div>
		           <!--<div class="row">
                        <div class="col-md-12">
		            		<div id='lead_controls'>
		            			<div class="col-md-3">
									<label for='filter_entities'>Filter:</label>
									<br />
									<select name='filter_entities' class="form-control">
										<option value='0'>All</option>
										<option value='residential'>Residential</option>
										<option value='commercial'>Commercial</option>
										<option value='utility'>Utility</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for='sort_entities'>Sort By:</label>
									<br />
									<select name='sort_entities' class="form-control">
										<option value="">None</option>
										<option value='alpha'>Alphabetical</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for='search_entities'>Search:</label>
									<br />
									<input type='text' name='search_entities' class="form-control" />
								</div>
								<div class="col-md-3">
									&nbsp;
				            	</div>
		            		</div
            			</div>
            		</div>
            		<hr />-->
            		<div class="row">
	                	<div class="col-md-12">
	                		<div class="row entities">
	                		@foreach($portfolios as $portfolio)
	                			<div class='portfolio col-md-4'>
	                				<div class="row">
	                					<div class='col-md-6'>
	                						<span class='portfolio_name'><a href="{{ route('leads.portfolio', $portfolio->id )}}">{{ $portfolio->name }}</a></span>
	                						<br />
	                						<span class='portfolio_nickname'>"{{ $portfolio->nickname }}"</span>
	                					</div>
	                					<div class='col-md-3'>
	                						<span class='kw'>0 kW</span>
	                						<br />
	                						<span class='kw'>$0.00</span>
	                					</div>
	                					<div class='col-md-3'>
	                						<a href="{{ route('leads.edit_portfolio', $portfolio->id)}}"><img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon" /></a>
	                					</div>
	                				</div>
                				</div>
	                		@endforeach
	                		</div>
	                	</div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
