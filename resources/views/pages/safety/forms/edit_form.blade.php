@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Form</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($form_id == 1)
                     <p>Hello Dick!</p>   
                    @endif

                    Edit FORM
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
