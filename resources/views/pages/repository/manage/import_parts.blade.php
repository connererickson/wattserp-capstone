@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Import Parts</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class='col-md-12'>
                            <div class="row" id='import_result_container'>
                                Attempted to import {{ $row_count }} rows.
                                @if (count($failures))
                                    <h5>The Import could not be completed. Please correct the following inconsistencies</h5>
                                    @foreach($failures as $failure)
                                        <div class='failure alert-danger alert-block'>
                                            @if ($failure->errors()[0] == 'manufacturer')
                                                Row {{ $failure->row() }} :  for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' does not match a manufacturer on file
                                            @elseif ($failure->errors()[0] == 'unit')
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' does not match a unit on file
                                            @elseif ($failure->errors()[0] == "color")
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' does not match a color on file
                                            @elseif ($failure->errors()[0] == "dimension")
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' must be a number for {{ $failure->attribute() }}
                                            @elseif ($failure->errors()[0] == "type")
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' does not match a part type on file
                                            @elseif ($failure->errors()[0] == "exists")
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' part already exists
                                            @else
                                                Row {{ $failure->row() }} : for {{ $failure->attribute() }}, '{{ $failure->values()[$failure->attribute()] }}' {{ $failure->errors()[0] }}
                                            @endif
                                            <?php $row_count-- ?>
                                        </div>
                                    @endforeach
                                @else
                                    ALL PARTS IMPORTED SUCCESSFULLY!
                                    <br />
                                @endif
                                <div class='alert-success alert-block'>{{ $row_count }} rows imported successfully</div>
                                <br />
                                <a class="crm_btn2" href="{{ route('repository.manage.upload_import_file') }}"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                        
