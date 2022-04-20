@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Safety</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row" id='forms_table'>
                        <div class="col-md-12">

                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Form Name</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($history)
                                        @foreach($history as $cur_history)
                                            <tr>
                                                <td> {{ $cur_history->name }} </td>
                                                <td><a href="{{ route('safety.forms.view_form',['link'=>$cur_history->link, 'form_entry' => $cur_history->form_entry])}}"> {{ $cur_history->link }} </td>
                                                <td> {{ $cur_history->datetime }} </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (!$history->count())
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
