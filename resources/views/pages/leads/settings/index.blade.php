@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Projects Settings
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
									<a href="{{ route('leads.settings.project_attributes') }}">Project Attributes</a>
								</li>
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
