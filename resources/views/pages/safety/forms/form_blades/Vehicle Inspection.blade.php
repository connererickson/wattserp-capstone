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
        <form>
            <div class="mb-3">
                <label for="dateLabel" class="form-label">Date</label>
                <input type="date" class="form-control" id="dateLabel" required>
            </div>
            <div class="mb-3">
                <label for="truck" class="form-label">Truck:</label>
                <br>
                <select class="form-select" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">105 - F250</option>
                    <option value="2">106 - F250 Ladder Rack</option>
                    <option value="3">323 - Chevy</option>
                    <option value="4">332 - Flatbed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="trailer" class="form-label">Trailer:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">T-14DT - Flat</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="equipmentLabel" class="form-label">Equipment:</label>
              <input type="text" class="form-control" id="equipmentLabel" required>
            </div>
            <div class="mb-3">
                <label for="startingODOLabel" class="form-label">Starting Odometer Mileage:</label>
                <input type="text" class="form-control" id="startingODOLabel" required>
            </div>
            <div class="mb-3">
                <label for="endingODOLabel" class="form-label">Ending Odometer Mileage:</label>
                <input type="text" class="form-control" id="endingODOLabel" required>
            </div>
            <div class="mb-3">
                <label for="engine" class="form-label">Engine:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="clutch" class="form-label">Clutch:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="transmission" class="form-label">Transmission:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="steering" class="form-label">Steering Mechanism:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="horn" class="form-label">Horn:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="mirrors" class="form-label">Rear View Mirrors:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lights" class="form-label">Lights and Reflectors:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Needs Replaced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="wipers" class="form-label">Windshield Wipers and Washers:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Needs Replaced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parkingBreak" class="form-label">Parking Break:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="serviceBreaks" class="form-label">Service Breaks:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tires" class="form-label">Tires:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rims" class="form-label">Wheels and Rims:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="emergency" class="form-label">Emergency Equipment:</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">Satisfactory</option>
                    <option value="2">Unsatisfactory</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes:</label>
                <textarea class="form-control" id="textarea" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="vehicleSafe" class="form-label">Is vehicle safe to drive?</label>
                <br>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">No</option>
                    <option value="2">Yes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="acknowledgementLabel" class="form-label">Driver Responsibility & Acknowledgement:</label>
                <p>As Driver, I am acknowledging that all Company owned & rented equipment is to be used solely for SCP, LLC use.  I understand in entirety that a Dishonest report or the occurrence of an incident due to negligence may be subject to discipline, up to and including termination.  By saying "Yes" I am accepting responsibility, and confirm that all statements and remarks reported are accurate.</p>
                <select class="form-control" required>
                    <option style="display: none;">-- Select your answer --</option>
                    <option value="1">No</option>
                    <option value="2">Yes</option>
                </select>
              </div>
            <div class="mb-3">
                <label for="nameLabel" class="form-label">Name:</label>
                <input type="text" class="form-control" id="nameLabel" required>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary w-25 text-light">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection