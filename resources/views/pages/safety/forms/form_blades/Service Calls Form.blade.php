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
                                <input name="customerName" type="text" class="form-control" id="nameLabel" value='<?php if(isset($form_data)) echo $form_data[0]->customerName; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="dateLabel" class="form-label">Date</label>
                                <input name="date" type="date" class="form-control" id="dateLabel" value='<?php if(isset($form_data)) echo $form_data[0]->date; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="techName" class="form-label">Tech Name:</label>
                                <br>
                                <select name="techName" class="form-control" required>
                                    <option style="display: none;">-- Select your answer --</option>
                                    <option value="Jason Moore" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Jason Moore")==0) echo 'selected';?>>Jason Moore</option>
                                    <option value="Juan Godinez" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Juan Godinez")==0) echo 'selected';?>>Juan Godinez</option>
                                    <option value="Justin Tidwell" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Justin Tidwell")==0) echo 'selected';?>>Justin Tidwell</option>
                                    <option value="Lorenzo Ramos" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Lorenzo Ramos")==0) echo 'selected';?>>Lorenzo Ramos</option>
                                    <option value="Prescott Brigham" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Prescott Brigham")==0) echo 'selected';?>>Prescott Brigham</option>
                                    <option value="Stephen Hieb" <?php if(isset($form_data) && strcmp($form_data[0]->techName,"Stephen Hieb")==0) echo 'selected';?>>Stephen Hieb</option>
                                </select>
                            </div>
                            <div class="mb-3">
                              <label for="addressLabel" class="form-label">Address:</label>
                              <input  name="address" type="text" class="form-control" id="addressLabel" value='<?php if(isset($form_data)) echo $form_data[0]->address; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="cityLabel" class="form-label">City:</label>
                                <input  name="city" type="text" class="form-control" id="cityLabel" value='<?php if(isset($form_data)) echo $form_data[0]->city; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="stateLabel" class="form-label">State:</label>
                                <input  name="state" type="text" class="form-control" id="stateLabel" value='<?php if(isset($form_data)) echo $form_data[0]->state; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="zipLabel" class="form-label">Zip:</label>
                                <input  name="zip" type="text" class="form-control" id="zipLabel"value='<?php if(isset($form_data)) echo $form_data[0]->zip; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="clientLabel" class="form-label">Client's #:</label>
                                <input  name="clientNumber" type="text" class="form-control" id="clientLabel" value='<?php if(isset($form_data)) echo $form_data[0]->clientsNumber; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="issue" class="form-label">Issue:</label>
                                <textarea name="issue" class="form-control" id="textarea" rows="3"  required><?php if(isset($form_data)) echo $form_data[0]->issue; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="diagnosis" class="form-label">Diagnosis:</label>
                                <textarea name="diagnosis" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->diagnosis; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Solution" class="form-label">Solution:</label>
                                <textarea name="solution" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->solution; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="equipment" class="form-label">Equipment to Order:</label>
                                <textarea name="equipmentToOrder" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->equipmentToOrder; ?></textarea>
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