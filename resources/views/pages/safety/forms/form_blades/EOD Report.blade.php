@extends('layouts.forms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <a class="" href="{{ route('safety.forms.forms_index') }}"><button class="btn btn-primary text-light">Back</button></a>
                    <span class="float-end mt-2"><strong>EOD Report</strong></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <div class="container">
                        <h1 class="text-center">
                            EOD Report
                        </h1>
                        {!! Form::open(array('route' => 'safety.forms.submit_eod', 'method' => 'POST', 'files' => 'true'))!!}
                            {{-- {{method_field('PUT') }}  
                             @csrf  --}}
                        <form method="post">
                        {{ csrf_field() }}
                            <div class="mb-3">
                              <label for="dateLabel" class="form-label">Date</label>
                              <input name="date" type="date" class="form-control" id="dateLabel" value='<?php if(isset($form_data)) echo $form_data[0]->date; ?>' required>
                            </div>
                            <div class="mb-3">
                              <label for="jobsiteClean" class="form-label">Is jobsite clean?</label>
                              <br>
                              <select name="cleanJobsite" class="form-select" required>
                                <option style="display: none;">-- Select your answer --</option>
                                  <option value="no" <?php if(isset($form_data) && strcmp($form_data[0]->jobsiteClean,"no")==0) echo 'selected';?>>No</option>
                                  <option value="yes" <?php if(isset($form_data) && strcmp($form_data[0]->jobsiteClean,"yes")==0) echo 'selected';?>>Yes</option>
                              </select>
                            </div>
                            <div class="mb-3">
                                <label for="materials" class="form-label">Are all loose materials secured?</label>
                                <br>
                                <select name="looseMaterials" class="form-select" required>
                                    <option style="display: none;">-- Select your answer --</option>
                                    <option value="no" <?php if(isset($form_data) && strcmp($form_data[0]->looseMaterialsScrewed,"no")==0) echo 'selected';?>>No</option>
                                    <option value="yes" <?php if(isset($form_data) && strcmp($form_data[0]->looseMaterialsScrewed,"yes")==0) echo 'selected';?>>Yes</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tasks" class="form-label">What tasks were completed today?</label>
                                <textarea name="completedTasks" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->tasksCompleted; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="parts" class="form-label">Do you need parts to be ordered?</label>
                                <textarea name="partsToBeOrdered" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->partsToOrder; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes:</label>
                                <textarea name="notes" class="form-control" id="textarea" rows="3" required><?php if(isset($form_data)) echo $form_data[0]->notes; ?></textarea>
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

<?php 

function pre_r ( $array ) {
    echo '<pre>';
    print_r($array);
    echo '<pre>';
}

?>

@endsection