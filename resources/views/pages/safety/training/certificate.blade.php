@extends('layouts.training_course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Training Course - {{ $training_course_name }}</div>

                <div class="panel-body" id='safety_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
	                <div class="row" id='training_certificate_container'>
	                	<div class="col-md-10 col-md-offset-1">
	                		<div id='loading_certificate'>
	                			<p>GENERATING CERTIFICATE</p>
	                			<img src="{{ URL::asset( 'images/loading.gif') }}" alt='' />
	                		</div>
	                		<div id='show_certificate'>
	                			<a href="{{ URL::asset('storage/training/certificates/' . $filename) }}" target='_blank'>DOWNLOAD CERTIFICATE</a>
	                		</div> 
	                		
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
