@extends('layouts.forms')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="" href="{{ route('safety.forms.forms_index') }}"><button class="btn btn-primary text-light">Back</button></a>
                    <span class="float-end mt-2"><strong>Employee Write Up</strong></span>
                </div>

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <div class="container-fluid p-0 mx-1 my-4">
                        <h1 class="text-center">
                            Employee Write Up
                        </h1>
<<<<<<< HEAD
                        {!! Form::open(array('route' => 'safety.forms.submit_writeup', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
                        <form method="post" class="px-2">
                        {{ csrf_field() }}
=======
                        <form class="px-2" action="pages/safety/forms/store_form" method="POST">
                            @csrf
>>>>>>> dce0323d5a2fc283254584afd3b3649c29ca9f95
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="employeeNameLabel" class="form-label">Employee Name:</label>
                                    <input name="employeeName" type="text" class="form-control" id="employeeNameLabel" required>
                                </div>
                                <div class="col">
                                    <label for="dateLabel" class="form-label">Date</label>
                                    <input name="date" type="date" class="form-control" id="dateLabel" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="employeeIDLabel" class="form-label">Employee ID:</label>
                                    <input name="employeeID" type="text" class="form-control" id="employeeIDLabel" required>
                                </div>
                                <div class="col">
                                    <label for="jobLabel" class="form-label">Job Title:</label>
                                    <input name="jobTitle" type="text" class="form-control" id="jobLabel" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="managerLabel" class="form-label">Manager:</label>
                                    <input name="manager" type="text" class="form-control" id="managerLabel" required>
                                </div>
                                <div class="col">
                                    <label for="departmentLabel" class="form-label">Department:</label>
                                    <input name="department" type="text" class="form-control" id="departmentLabel" required>                                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="serviceLabel" class="form-label">Service:</label>
                                    <input name="service" type="text" class="form-control" id="serviceLabel" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="warningLabel" class="form-label">Type of Warning:</label>
                                    <input name="warningType" type="text" class="form-control" id="warningLabel" required>
                                </div>
                                <div class="col">
                                    <label for="offenseLabel" class="form-label">Type of Offense:</label>
                                    <input name="offenseType" type="text" class="form-control" id="offenseLabel" required>                                   
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="descriptionTextArea" class="form-label">Description of Infraction:</label>
                                <textarea name="infractionDescription" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="planTextArea" class="form-label">Plan for Improvement:</label>
                                <textarea name="improvementPlan" class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="consequencesTextArea" class="form-label">Consequences of Futher Infractions:</label>
                                <textarea name="furtherConsequences" class="form-control" id="textarea" rows="3" required></textarea>
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