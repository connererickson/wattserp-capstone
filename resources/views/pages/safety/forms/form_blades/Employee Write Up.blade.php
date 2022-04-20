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
                        {!! Form::open(array('route' => 'safety.forms.submit_writeup', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
                        <form method="post" class="px-2">
                        {{ csrf_field() }}
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="employeeNameLabel" class="form-label">Employee Name:</label>
                                    <input name="employeeName" type="text" class="form-control" id="employeeNameLabel" value='<?php if(isset($form_data)) echo $form_data[0]->employeeName; ?>' required>
                                </div>
                                <div class="col">
                                    <label for="dateLabel" class="form-label">Date</label>
                                    <input name="date" type="date" class="form-control" id="dateLabel" value='<?php if(isset($form_data)) echo $form_data[0]->date; ?>' required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="employeeIDLabel" class="form-label">Employee ID:</label>
                                    <input name="employeeID" type="text" class="form-control" id="employeeIDLabel" value='<?php if(isset($form_data)) echo $form_data[0]->employeeID; ?>' required>
                                </div>
                                <div class="col">
                                    <label for="jobLabel" class="form-label">Job Title:</label>
                                    <input name="jobTitle" type="text" class="form-control" id="jobLabel" value='<?php if(isset($form_data)) echo $form_data[0]->jobTitle; ?>' required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="managerLabel" class="form-label">Manager:</label>
                                    <input name="manager" type="text" class="form-control" id="managerLabel" value='<?php if(isset($form_data)) echo $form_data[0]->manager; ?>' required>
                                </div>
                                <div class="col">
                                    <label for="departmentLabel" class="form-label">Department:</label>
                                    <input name="department" type="text" class="form-control" id="departmentLabel" value='<?php if(isset($form_data)) echo $form_data[0]->department; ?>' required>                                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="serviceLabel" class="form-label">Service:</label>
                                    <input name="service" type="text" class="form-control" id="serviceLabel" value='<?php if(isset($form_data)) echo $form_data[0]->service; ?>' required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="warningLabel" class="form-label">Type of Warning:</label>
                                    <input name="warningType" type="text" class="form-control" id="warningLabel" value='<?php if(isset($form_data)) echo $form_data[0]->typeOfWarning; ?>' required>
                                </div>
                                <div class="col">
                                    <label for="offenseLabel" class="form-label">Type of Offense:</label>
                                    <input name="offenseType" type="text" class="form-control" id="offenseLabel" value='<?php if(isset($form_data)) echo $form_data[0]->typeOfOffense; ?>' required>                                   
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="descriptionTextArea" class="form-label">Description of Infraction:</label>
                                <textarea name="infractionDescription" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->infractionDescription; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="planTextArea" class="form-label">Plan for Improvement:</label>
                                <textarea name="improvementPlan" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->improvementPlan; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="consequencesTextArea" class="form-label">Consequences of Futher Infractions:</label>
                                <textarea name="furtherConsequences" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->furtherConsequences; ?></textarea>
                            </div>
                            @if(!isset($form_data))
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary w-25 text-light">Submit</button>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection