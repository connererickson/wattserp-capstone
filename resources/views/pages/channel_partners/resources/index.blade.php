@extends('layouts.sales')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Resources</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            
                    <div class="row">
                        <div class="col-md-12">
                            Resources HERE!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
