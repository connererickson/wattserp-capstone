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
                                        <th>User</th>
                                        <th>Form Name</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($forms)
                                        @foreach($forms as $form)
                                            <tr>
                                                <td> {{ $form->id }} </td>
                                                <td><a href="{{ route('safety.forms.edit_form', $form->name)}}"> {{ $form->link }} </td>
                                                <td> {{ $form->date }} </td>
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
