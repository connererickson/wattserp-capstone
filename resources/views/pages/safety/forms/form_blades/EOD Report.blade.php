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
                        <form>
                            <div class="mb-3">
                              <label for="dateLabel" class="form-label">Date</label>
                              <input type="date" class="form-control" id="dateLabel" required>
                            </div>
                            <div class="mb-3">
                              <label for="jobsiteClean" class="form-label">Is jobsite clean?</label>
                              <br>
                              <select class="form-select" required>
                                <option style="display: none;">-- Select your answer --</option>
                                  <option value="1">No</option>
                                  <option value="2">Yes</option>
                              </select>
                            </div>
                            <div class="mb-3">
                                <label for="materials" class="form-label">Are all loose materials secured?</label>
                                <br>
                                <select class="form-select" required>
                                    <option style="display: none;">-- Select your answer --</option>
                                    <option value="1">No</option>
                                    <option value="2">Yes</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tasks" class="form-label">What tasks were completed today?</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="parts" class="form-label">Do you need parts to be ordered?</label>
                                <textarea class="form-control" id="textarea" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes:</label>
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