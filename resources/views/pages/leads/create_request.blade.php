@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create Request
                    <a class='crm_btn2 right_side right_pad' href="{{ route('leads.portfolio', $portfolio_id )}}"><i class="fas fas_left fa-caret-left"></i> Return to Portfolio</a>
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
		                	Create Request Form Here
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
