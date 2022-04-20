@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Form History</div>

                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <ul class='page_menu'>
                                <li 
                                    <?php if ($tab == 'overview'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.forms') }}">Overview</a>
                                </li>
                                <li 
                                    <?php if ($tab == 'manage_forms'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.forms.forms_index') }}">Manage Forms</a>
                                </li>
                                <li 
                                    <?php if ($tab == 'schedule_forms'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.forms.scheduled_forms_index') }}">Form Scheduling</a>
                                </li>
                                <li 
                                    <?php if ($tab == 'form_history'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.forms.form_history_index') }}">Form History</a>
                                </li>
                            </ul>
                        </div>
                    </div>

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
