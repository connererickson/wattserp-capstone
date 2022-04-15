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
                        Task Hazard Analysis
                    </h1>
                    {!! Form::open(array('route' => 'safety.forms.submit_hazardanalysis', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
                    <form>
                    {{ csrf_field() }}
                        <div class="mb-3">
                        <label for="taskLabel" class="form-label">Task:</label>
                        <input name="task" type="text" class="form-control" id="taskLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="projectLabel" class="form-label">Project:</label>
                            <input name="project" type="text" class="form-control" id="projectLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="managerLabel" class="form-label">Project Manager:</label>
                            <input name="projectManager" type="text" class="form-control" id="managerLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateLabel" class="form-label">Date</label>
                            <input name="date" type="date" class="form-control" id="dateLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="addressLabel" class="form-label">Project Address:</label>
                            <input name="projectAddress" type="text" class="form-control" id="addressLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="leadLabel" class="form-label">Lead:</label>
                            <input name="lead" type="text" class="form-control" id="leadLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="crewAssignLabel" class="form-label">Crew Assigned:</label>
                            <input name="crewAssigned" type="text" class="form-control" id="crewAssignLabel" required>
                        </div>
                        <div class="mb-3">
                            <label for="tasks" class="form-label">Break Tasks Into Steps:</label>
                            <textarea name="taskStepsBreakdown" class="form-control" id="textarea" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                        <label for="q1" class="form-label">Can any body part get caught in, struckby, or caught between objects?</label>
                        <br>
                        <select name="bodyStuck" class="form-control" required>
                            <option style="display: none;">-- Select your answer --</option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="q2" class="form-label">Is the employee working with sharp or rough materials that require PPE?</label>
                            <br>
                            <select name="sharpObjects" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q3" class="form-label">Can pushing, pulling, lifting, bending, or twisting cause strain?</label>
                            <br>
                            <select name="strain" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q4" class="form-label">Do tools, machines, or equipment present any harm?</label>
                            <br>
                            <select name="harmedTools" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q5" class="form-label">Can the worker slip, trip, or fall?</label>
                            <br>
                            <select name="slipping" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q6" class="form-label">Is heavy equipment needed?</label>
                            <br>
                            <select name="heavyEquipment" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q7" class="form-label">Are there flammable, explosive, or electrical hazards present?</label>
                            <br>
                            <select name="flammableExplosive" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q8" class="form-label">Is there a danger from falling objects?</label>
                            <br>
                            <select name="fallingObjects" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q9" class="form-label">Can weather conditions affect Safety?</label>
                            <br>
                            <select name="weatherSafety" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="q10" class="form-label">Contact with acids, toxins, or caustics? (MSDS)</label>
                            <br>
                            <select name="acidContact" class="form-control" required>
                                <option style="display: none;">-- Select your answer --</option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hazardsTextArea" class="form-label">Hazards Associated With Steps:</label>
                            <textarea name="hazardsWithSteps" class="form-control" id="textarea" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="safePPE" class="form-label">Safe Work Procedures/PPE:</label>
                            <textarea name="safeWorkProcedures" class="form-control" id="textarea" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nameLabel" class="form-label">Name:</label>
                            <input name="name" type="text" class="form-control" id="nameLabel" required>
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