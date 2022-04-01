@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Manage Forms</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a class='right_side' href="{{ route('safety.forms.create_form' )}}"><button class="btn btn-primary text-light" disabled>Create New Form</button></a>
                    
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
                            @if(Session::has('created_form'))
                                <p class='bg_success'>{{ Session('created_form') }}</p>
                            @endif
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Form Name</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($forms)
                                        @foreach($forms as $form)
                                            <tr>
                                                <td> {{ $form->id }} </td>
                                                <td><a href="{{ route('safety.forms.edit_form', $form->name)}}"> {{ $form->name }} </td>
                                                <td> {{ $form->type }} </td>
                                                <td> {{ $form->description }} </td>
                                                <td> {{ date('M d, Y', strtotime($form->updated_at)) }} </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    {{ $forms->links() }}
                                </tbody>
                            </table>
                            @if (!$forms->count())
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