@extends('layouts.sales')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Channel Partner Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            
                    <div class="row">
                        <div class="col-md-12">
                            <a class='crm_btn' href="{{ route('profile.create' )}}">Complete My Profile</a>
                            <div id='channel_partner_profile'>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
