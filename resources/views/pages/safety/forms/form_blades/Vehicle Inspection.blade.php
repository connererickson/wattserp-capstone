@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="" href="{{ route('safety.forms.forms_index') }}"><button class="btn btn-primary text-light">Back</button></a>
                    <span class="float-end mt-2"><strong>Vehicle Inspection Report</strong></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

    <div class="container my-4">
        <h1 class="text-center">
            Vehicle Inspection Report
        </h1>
        {!! Form::open(array('route' => 'safety.forms.submit_inspection', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
        <form>
        {{ csrf_field() }}
            <div class="mb-3">
                <label for="dateLabel" class="form-label">Date</label>
                <input name="date" type="date" class="form-control" id="dateLabel" required value='<?php if(isset($form_data)) echo $form_data[0]->date; ?>'>
            </div>
            <div class="mb-3">
                <label for="truck" class="form-label">Truck:</label>
                <br>
                <select name="truck" class="form-select" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="105 - F250" <?php if(isset($form_data) && strcmp($form_data[0]->truck,"105 - F250")==0) echo 'selected';?>>105 - F250</option>
                    <option value="106 - F250 Ladder Rack"<?php if(isset($form_data) && strcmp($form_data[0]->truck,"106 - F250 Ladder Rack")==0) echo 'selected';?>>106 - F250 Ladder Rack</option>
                    <option value="323 - Chevy"<?php if(isset($form_data) && strcmp($form_data[0]->truck,"323 - Chevy")==0) echo 'selected';?>>323 - Chevy</option>
                    <option value="332 - Flatbed"<?php if(isset($form_data) && strcmp($form_data[0]->truck,"332 - Flatbed")==0) echo 'selected';?>>332 - Flatbed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="trailer" class="form-label">Trailer:</label>
                <br>
                <select name="trailer" class="form-control"  required>
                    <option style="display: none;" >-- Select your answer --</option>
                    <option value="T-14DT - Flat"<?php if(isset($form_data) && strcmp($form_data[0]->trailer,"T-14DT - Flat")==0) echo 'selected';?>>T-14DT - Flat</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="equipmentLabel" class="form-label">Equipment:</label>
              <input name="equipment" type="text" class="form-control" id="equipmentLabel" value='<?php if(isset($form_data)) echo $form_data[0]->equipment; ?>' required>
            </div>
            <div class="mb-3">
                <label for="startingODOLabel" class="form-label">Starting Odometer Mileage:</label>
                <input name="startingMileage" type="text" class="form-control" id="startingODOLabel" value='<?php if(isset($form_data)) echo $form_data[0]->startingMileage; ?>' required>
            </div>
            <div class="mb-3">
                <label for="endingODOLabel" class="form-label">Ending Odometer Mileage:</label>
                <input name="endingMileage" type="text" class="form-control" id="endingODOLabel" value='<?php if(isset($form_data)) echo $form_data[0]->endingMileage; ?>' required>
            </div>
            <div class="mb-3">
                <label for="engine" class="form-label">Engine:</label>
                <br>
                <select name="engine" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->engine,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->engine,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="clutch" class="form-label">Clutch:</label>
                <br>
                <select name="clutch" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->clutch,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->clutch,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="transmission" class="form-label">Transmission:</label>
                <br>
                <select name="transmission" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->transmission,"Satisfactory")==0) echo 'selected';?> >Satisfactory</option>
                    <option value="Unsatisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->transmission,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="steering" class="form-label">Steering Mechanism:</label>
                <br>
                <select name="steeringMechanism" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->steeringMechanism,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->steeringMechanism,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="horn" class="form-label">Horn:</label>
                <br>
                <select name="horn" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->horn,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->horn,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="mirrors" class="form-label">Rear View Mirrors:</label>
                <br>
                <select name="rearMirrors" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->rearMirrors,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->rearMirrors,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lights" class="form-label">Lights and Reflectors:</label>
                <br>
                <select name="lightsAndReflectors" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->lightsAndReflectors,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Needs Replaced"<?php if(isset($form_data) && strcmp($form_data[0]->lightsAndReflectors,"Unsatisfactory")==0) echo 'selected';?>>Needs Replaced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="wipers" class="form-label">Windshield Wipers and Washers:</label>
                <br>
                <select name="windshieldWipers" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->windshieldWipers,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Needs Replaced"<?php if(isset($form_data) && strcmp($form_data[0]->windshieldWipers,"Unsatisfactory")==0) echo 'selected';?>>Needs Replaced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parkingBreak" class="form-label">Parking Break:</label>
                <br>
                <select name="parkingBreak" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->parkingBreak,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->parkingBreak,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="serviceBreaks" class="form-label">Service Breaks:</label>
                <br>
                <select name="serviceBreaks" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory" <?php if(isset($form_data) && strcmp($form_data[0]->serviceBreaks,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->serviceBreaks,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tires" class="form-label">Tires:</label>
                <br>
                <select name="tires" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->tires,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->tires,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rims" class="form-label">Wheels and Rims:</label>
                <br>
                <select name="wheelsRims" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->wheelsRims,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->wheelsRims,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="emergency" class="form-label">Emergency Equipment:</label>
                <br>
                <select name="emergencyEquipment" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="Satisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->emergencyEquipment,"Satisfactory")==0) echo 'selected';?>>Satisfactory</option>
                    <option value="Unsatisfactory"<?php if(isset($form_data) && strcmp($form_data[0]->emergencyEquipment,"Unsatisfactory")==0) echo 'selected';?>>Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes:</label>
                <textarea name="notes" class="form-control" id="textarea" rows="3"  required><?php if(isset($form_data)) echo $form_data[0]->notes; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="vehicleSafe" class="form-label">Is vehicle safe to drive?</label>
                <br>
                <select name="safeToDrive" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="No" <?php if(isset($form_data) && strcmp($form_data[0]->{'safeToDrive?'},"No")==0) echo 'selected';?>>No</option>
                    <option value="Yes"<?php if(isset($form_data) && strcmp($form_data[0]->{'safeToDrive?'},"Yes")==0) echo 'selected';?>>Yes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="acknowledgementLabel" class="form-label">Driver Responsibility & Acknowledgement:</label>
                <p>As Driver, I am acknowledging that all Company owned & rented equipment is to be used solely for SCP, LLC use.  I understand in entirety that a Dishonest report or the occurrence of an incident due to negligence may be subject to discipline, up to and including termination.  By saying "Yes" I am accepting responsibility, and confirm that all statements and remarks reported are accurate.</p>
                <select name="driverResponsibility" class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="No" <?php if(isset($form_data) && strcmp($form_data[0]->driverResponsibility,"No")==0) echo 'selected';?>>No</option>
                    <option value="Yes" <?php if(isset($form_data) && strcmp($form_data[0]->driverResponsibility,"Yes")==0) echo 'selected';?>>Yes</option>
                </select>
              </div>
            <div class="mb-3">
                <label for="nameLabel" class="form-label">Name:</label>
                <input name="name" type="text" class="form-control" id="nameLabel" value='<?php if(isset($form_data)) echo $form_data[0]->name; ?>' required>
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
@endsection