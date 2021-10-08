@extends('layouts.directory')

@section('content')
<div class="container" id='manage_rates'>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Utility Rates for {{ $utility->company_name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class='crm_btn2 right_side' href="{{ route('utility_rates.create', $utility->id )}}">Create New Rate</a>       
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('created_rate'))
                                <p class='bg_success'>{{ Session('created_rate') }}</p>
                            @endif
                            <br />
                            <div class="row" id='rates_table_headers'>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Name</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class='rates_heading'>Description</div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class='rates_heading'>Frozen</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Created At</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class='rates_heading'>Last Update At</div>
                                    </div>
                                </div>
                                @if ($rates)
                                    @foreach($rates as $rate)
                                        <div class="row rates_table_data">
                                            <div class="col-md-2">
                                                <div><a href='{{ route('utility_rates.rate', $rate->id) }}'>{{ $rate->rate_name }}</a></div>
                                            </div>
                                            <div class="col-md-5">
                                                <div>{!! html_entity_decode($rate->rate_description) !!}</div>
                                            </div>
                                            <div class="col-md-1">
                                                <div>
                                                    @if ($rate->frozen == 0)
                                                        No
                                                    @else
                                                        Yes
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>{{ $rate->created_at->diffForHumans() }}</div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>{{ $rate->updated_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{ $rates->links() }}
                                @if (!$rates->count())
                                    <div style='padding-left: 5px;'>No Results to Display</div>
                                @endif
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
