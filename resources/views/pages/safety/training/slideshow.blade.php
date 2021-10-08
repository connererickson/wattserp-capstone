@extends('layouts.training_course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Training Course - {{ $training_course->name }}</div>

                <div class="panel-body" id='safety_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
	                <div class="row" id='training_slideshow'>
	                	<div class="col-md-10 col-md-offset-1">
	                		<div id='training_course_content'>
	                			<div class='slide_container'>
	                				<div class='training_course_slide_image'>
	                					<img id='training_course_play_button' src='{{ URL::asset('/images/play.png') }}' />
	                					<p>Click the play icon, or forward button below to begin the course.</p>
	                				</div>
	                				<div class='training_course_slide_info'>
	                					<div class='slide_name'></div>
	                					<div class='slide_progress'></div>
	                					<div class='slide_timer'>0</div>
	                				</div>
	                			</div>
	                			<?php
	                			foreach($slides as $slide){ ?>
	                				<div class='slide_container' id='{{ $slide->id }}' data_time='{{ $slide->seconds }}'>
		                				<div class='training_course_slide_image'>
		                					<img src='{{ URL::asset('storage/training/slides/' . $slide->id . '/' . $slide->image) }}' />
		                				</div>
		                				<div class='training_course_slide_info'>
		                					<div class='slide_name'>{{ $slide->name }}</div>
		                					<div class='slide_audio'>
		                						<audio controls>
											  		<source src='{{ URL::asset('storage/training/slides/' . $slide->id . '/' . $slide->audio) }}' type="audio/mp3">
											  		<p>Your browser doesn't support HTML5 audio.</p>
												</audio>
		                					</div>
		                					<div class='slide_timer'>{{ $slide->seconds }}</div>
		                					
		                				</div>
		                			</div><?php
	                			}
								?>
								<div class='slide_container'>
	                				<div class='training_course_slide_image'>
	                					<br /><br />
	                					<p class='finished_training'>Congratulations. You have finished the training course {{ $training_course->name }}.</p>
	                					<p class='finished_training'>Please click the button below to continue</p>
	                					<a href='{{ route("safety.training.certificate", ["id"=>$training_course->id]) }}' class='crm_btn'>Continue</a>
	                					<br /><br />
	                				</div>
	                				<div class='training_course_slide_info'>
	                					<div class='slide_name'></div>
	                					<div class='slide_progress'></div>
	                					<div class='slide_timer'>0</div>
	                				</div>
	                			</div>
	                			<div id='training_course_controls'>
	                				<div id='training_course_back' class=''><img src='{{ URL::asset('/images/back.png') }}' /></div>
	                				<div id='training_course_pause' class=''><img src='{{ URL::asset('/images/pause.png') }}' data-play='{{ URL::asset('/images/play2.png') }}' data-pause='{{ URL::asset('/images/pause.png') }}'/></div>
	                				<div id='training_course_forward' class='tbutton_active'><img src='{{ URL::asset('/images/forward.png') }}' /></div>
	                			</div>
	                		</div>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
