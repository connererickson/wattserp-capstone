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
                        <form>
                            <div class="mb-3">
                                <label for="nameLabel" class="form-label">Customer Name:</label>
                                <input type="text" class="form-control" id="nameLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateLabel" class="form-label">Date</label>
                                <input type="date" class="form-control" id="dateLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="techName" class="form-label">Tech Name:</label>
                                <br>
                                <select class="form-control" required>
                                    <option style="display: none;">-- Select your answer --</option>
                                    <option value="1">Jason Moore</option>
                                    <option value="2">Juan Godinez</option>
                                    <option value="3">Justin Tidwell</option>
                                    <option value="4">Lorenzo Ramos</option>
                                    <option value="5">Prescott Brigham</option>
                                    <option value="6">Stephen Hieb</option>
                                </select>
                            </div>
                            <div class="mb-3">
                              <label for="addressLabel" class="form-label">Address:</label>
                              <input type="text" class="form-control" id="addressLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="cityLabel" class="form-label">City:</label>
                                <input type="text" class="form-control" id="cityLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="stateLabel" class="form-label">State:</label>
                                <input type="text" class="form-control" id="stateLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipLabel" class="form-label">Zip:</label>
                                <input type="text" class="form-control" id="zipLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="clientLabel" class="form-label">Client's #:</label>
                                <input type="text" class="form-control" id="clientLabel" required>
                            </div>
                            <div class="mb-3">
                                <label for="issue" class="form-label">Issue:</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="diagnosis" class="form-label">Diagnosis:</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Solution" class="form-label">Solution:</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="equipment" class="form-label">Equipment to Order:</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
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