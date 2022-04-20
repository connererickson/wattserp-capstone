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
                                        <th>Schedule Form</th>
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
                                                <td><button class="btn btn-info schedule_forms_button" form_id={{$form->id}} form_name="{{$form->name}}">Schedule</button></td>
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

<div id="schedule_forms_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Schedule a form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Select a member schedule the form to.</p>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle w-100 text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Select a user
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">

                {{-- <p>{{$users}}</p> --}}
                {{-- WE CAN ALSO USE $org_users --}}
                @if ($users)
                @foreach($users as $user)
                    <li><a class="dropdown-item text-center user-select" user_id="{{$user->id}}">{{$user->name}}</a></li>

                    {{-- <td> {{ $form->id }} </td>
                    <td><a href="{{ route('safety.forms.edit_form', $form->name)}}"> {{ $form->name }} </td>
                    <td> {{ $form->type }} </td>
                    <td> {{ $form->description }} </td>
                    <td> {{ date('M d, Y', strtotime($form->updated_at)) }} </td>
                    <td><button class="btn btn-info schedule_forms_button" name={{$form->id}}>Schedule</button></td> --}}
                @endforeach

                @endif
                  {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="submit_form_notification" type="button" class="btn btn-success">Schedule</button>
        </div>
      </div>
    </div>
  </div>
@endsection