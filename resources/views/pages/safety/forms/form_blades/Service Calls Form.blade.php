@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="" href="{{ route('safety.forms.forms_index') }}"><button class="btn btn-primary text-light">Back</button></a>
                    <span class="float-end mt-2"><strong>Field Safety Observation</strong></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <div class="container">
                        <h1 class="text-center">
                            Service Calls Form
                        </h1>
                        {!! Form::open(array('route' => 'safety.forms.submit_serviceform', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
                        <form method="post">
                        {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="nameLabel" class="form-label">Customer Name:</label>
                                <input name="customerName" type="text" class="form-control" id="nameLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateLabel" class="form-label">Date</label>
                                <input name="date" type="date" class="form-control" id="dateLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="techName" class="form-label">Tech Name:</label>
                                <br>
                                <select name="techName" class="form-control" required>
                                    <option style="display: none;">-- Select your answer --</option>
                                    <option value="Jason Moore">Jason Moore</option>
                                    <option value="Juan Godinez">Juan Godinez</option>
                                    <option value="Justin Tidwell">Justin Tidwell</option>
                                    <option value="Lorenzo Ramos">Lorenzo Ramos</option>
                                    <option value="Prescott Brigham">Prescott Brigham</option>
                                    <option value="Stephen Hieb">Stephen Hieb</option>
                                </select>
                            </div>
                            <div class="mb-3">
                              <label for="addressLabel" class="form-label">Address:</label>
                              <input  name="address" type="text" class="form-control" id="addressLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="cityLabel" class="form-label">City:</label>
                                <input  name="city" type="text" class="form-control" id="cityLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="stateLabel" class="form-label">State:</label>
                                <input  name="state" type="text" class="form-control" id="stateLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipLabel" class="form-label">Zip:</label>
                                <input  name="zip" type="text" class="form-control" id="zipLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="clientLabel" class="form-label">Client's #:</label>
                                <input  name="clientNumber" type="text" class="form-control" id="clientLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="issue" class="form-label">Issue:</label>
                                <textarea name="issue" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="diagnosis" class="form-label">Diagnosis:</label>
                                <textarea name="diagnosis" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Solution" class="form-label">Solution:</label>
                                <textarea name="solution" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="equipment" class="form-label">Equipment to Order:</label>
                                <textarea name="equipmentToOrder" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary w-25 text-light">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection