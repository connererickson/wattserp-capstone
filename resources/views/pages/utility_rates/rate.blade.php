@extends('layouts.directory')

@section('content')
<div class="container" id='manage_rates'>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Utility Rate {{ $rate->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('created_rate'))
                                <p class='bg_success'>{{ Session('created_rate') }}</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
