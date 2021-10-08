@extends('layouts.incidents')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Incidents</div>

                <div class="panel-body" id='safety_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-12">
                            <ul class='page_menu'>
                                <li 
                                    <?php if ($tab == 'overview'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.incidents') }}">Overview</a>
                                </li>
                                <li 
                                    <?php if ($tab == 'incidents'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.incidents.incidents') }}">Incidents</a>
                                </li>
                                @if (Auth::user()->hasPermission('log_incident_reports'))
                                <li 
                                    <?php if ($tab == 'log_incident'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.incidents.log_incident') }}">Log Incident</a>
                                </li>
                                @endif
                                @if (Auth::user()->hasPermission('create_edit_incident_reports'))
                                <li 
                                    <?php if ($tab == 'osha_reports'){
                                        echo "class='current_tab'";
                                    }?>
                                    ><a href="{{ route('safety.incidents.osha_reports') }}">OSHA Reports</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    <div class="row" id='audit_index_content'>
                        <div class="col-md-10 col-md-offset-1">
                            <p>
                                This is the form to log an incident
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
