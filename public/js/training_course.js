var slides;
var slide_index=1;
var slide_id=0;
var refreshIntervalId;

$(document).ready(function(){
	
	//Wait to show the certificate for 3 seconds
	if($('#loading_certificate').length){
		setTimeout(function(){
			$('#loading_certificate').hide();
			$('#show_certificate').show();
		},3000);
	}
	
	if ($('#training_course_content .slide_container').length){
		slides = $('#training_course_content .slide_container').each(function(){
			return $(this);
		});
		var slide = slides.get(slide_index-1);
		slide_id = slide.id;
	}
	
	$('#training_course_content .slide_container:first-child').show();
	$('#training_course_play_button').on('click', function(){
		continue_training();
	});
	$('#training_course_forward').on('click', function(){
		if ($('#training_course_forward').hasClass('tbutton_active')){
			continue_training();
		}
	});
	$('#training_course_back').on('click', function(){
		var audio_el = $("#" + slide_id + ' .slide_audio audio');
		audio_el.trigger('pause');
		audio_el.prop('currentTime', 0);
		clearInterval(refreshIntervalId);
		if ($('#training_course_back').hasClass('tbutton_active')){
			rewind_training();
		}
	});
	$(document).on('click', '#training_course_pause', function(){
		$('#training_course_pause').attr('id', 'training_course_play');
		$('#training_course_play img').attr('src', $('#training_course_play img').attr('data-play'));
		$("#" + slide_id + ' .slide_audio audio').trigger("pause");
	});
	$(document).on('click', '#training_course_play', function(){
		$('#training_course_play').attr('id', 'training_course_pause');
		$('#training_course_pause img').attr('src', $('#training_course_pause img').attr('data-pause'));
		$("#" + slide_id + ' .slide_audio audio').trigger("play");
	});
	
	//Slides Accordion Open Close
	$('.slide h5').on('click', function(){
		$('.slide .slide_inner').each(function(){
			$(this).slideUp();
		});
		if ($(this).parent().find('.slide_inner').css('overflow') == 'visible'){
			$(this).parent().find('.slide_inner').slideDown();
		}
	});
	
	//DELETE TRAINING COURSE
	$('.delete_training_course').on('click', function(e){
		var training_course_id = $(this).attr('id');
		var training_name = $(this).attr('data-elem1');
		e.preventDefault();
		var dialog = new Messi(
		    'Are you sure you want to remove this training course?',
		    {
		        title: 'Remove Training Course',
		        titleClass: 'anim info',
		        buttons: [
		            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
		            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
		        ],
		        callback: function(val) { 
		        	if (val == 'Y'){
						var parameters = { 'training_course_id' : training_course_id, 'training_name' : training_name };
						go_ajax2(parameters, 'http://' + project_domain + '/pages/safety/training_courses/delete_training_course', 0);
						setTimeout(function(){
							if (rtn){
								var dialog = new Messi(
								    'Training course was successfully removed',
								    {
								        title: 'Remove Training Course',
								        titleClass: 'anim info',
								        buttons: [
											{id: 0, label: 'Ok', val: 'Y', class: 'btn-info'}
										],
								        callback: function() {
								        	window.location.reload();
								        } 
									}
								);
							}
						},500);
					}
				}
			}
		);
	});

	//UNSCHEDULE TRAINING
	$('.unschedule_training').on('click', function(e){
		var scheduled_training_id = $(this).attr('id');
		var training_name = $(this).attr('data-elem1');
		var employee_name = $(this).attr('data-elem2');
		e.preventDefault();
		var dialog = new Messi(
		    'Are you sure you want to unschedule this training?',
		    {
		        title: 'Unschedule Training',
		        titleClass: 'anim info',
		        buttons: [
		            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
		            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
		        ],
		        callback: function(val) { 
		        	if (val == 'Y'){
						var parameters = { 'schedule_id' : scheduled_training_id, 'training_name' : training_name, 'employee_name' : employee_name };
						go_ajax2(parameters, 'http://' + project_domain + '/pages/safety/training_courses/unschedule_training', 0);
						setTimeout(function(){
							if (rtn){
								var dialog = new Messi(
								    'Training was successfully unscheduled',
								    {
								        title: 'Unschedule Training',
								        titleClass: 'anim info',
								        buttons: [
											{id: 0, label: 'Ok', val: 'Y', class: 'btn-info'}
										],
								        callback: function() {
								        	window.location.reload();
								        } 
									}
								);
							}
						},500);
					}
				}
			}
		);
	});

	//SCHEDULE TRAINING
	$('#schedule_training').on('click', function(e){
		e.preventDefault();
		var employee_id = $('#training_employees option:selected').val();
		var training_course_id = $('#training_training_courses option:selected').val();
		var flag = 1;
		if (employee_id == 'select'){
			var dialog = new Messi(
		    'Please Select An Employee',
		    {
		        title: 'Schedule Training',
		        titleClass: 'anim info',
		        buttons: [{id: 0, label: 'Close', val: 'X'}]
		    });
		    flag = 0;
		}
		if(training_course_id == 'select' && flag == 1){
			var dialog = new Messi(
		    'Please Select A Training Course',
		    {
		        title: 'Schedule Training',
		        titleClass: 'anim info',
		        buttons: [{id: 0, label: 'Close', val: 'X'}]
		    });
		    flag = 0;
		}
		if(flag == 1){
			var dialog = new Messi(
			    'Are you sure you want to schedule this training?',
			    {
			        title: 'Schedule Training',
			        titleClass: 'anim info',
			        buttons: [
			            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
			            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
			        ],
			        callback: function(val) { 
			        	if (val == 'Y'){
			        		var parameters = { 'employee_id' : employee_id, 'training_course_id' : training_course_id };
							go_ajax2(parameters, 'http://' + project_domain + '/pages/safety/training_courses/schedule_training', 0);
							setTimeout(function(){
								if (rtn){
									var dialog = new Messi(
									    'Training was successfully scheduled',
									    {
									        title: 'Schedule Training',
									        titleClass: 'anim info',
									        buttons: [
												{id: 0, label: 'Ok', val: 'Y', class: 'btn-info'}
											],
									        callback: function() {
									        	window.location.reload();
									        } 
										}
									);
								}
							},500);
						}
					}
				}
			);
		}
	});
	
	//Slides Delete Messi Confirm
	$('.delete_slide').on('click', function(e){
		var context = $(this);
		e.preventDefault();
		var dialog = new Messi(
		    'Are you sure you want to delete this slide?',
		    {
		        title: 'Delete',
		        titleClass: 'anim info',
		        buttons: [
		            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
		            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
		        ],
		        callback: function(val) { 
		        	if (val == 'Y'){
						var slide_id = context.attr('id');
						var parameters = { 'slide_id' : slide_id };
						go_ajax2(parameters, 'http://' + project_domain + '/pages/safety/training/slides/delete_slide', 0);
						setTimeout(function(){ 
							if (rtn){
								location.reload();
							}
						},500);
		        	}
		        }
		    }
		);
		return false;
	});
});
function continue_training(){
	$('#training_course_play').attr('id', 'training_course_pause');
	$('#training_course_pause img').attr('src', $('#training_course_pause img').attr('data-pause'));
	$('#training_course_content .slide_container:nth-child(' + slide_index + ')').fadeOut();
	$('#training_course_forward').removeClass('tbutton_active');
	$('#training_course_back').addClass('tbutton_active');
	$('#training_course_pause').addClass('tbutton_active');
	var slide;
	var audio_el;
	var slide_time;
	if ((slide_index + 1) == slides.length){
		console.log("END");
		slide_index++;
		$('#training_course_content .slide_container:nth-child(' + slide_index + ')').fadeIn();
		slide = slides.get(slide_index-1);
		slide_id = slide.id;
	}
	else{
		setTimeout(function(){
			slide_index++;
			$('#training_course_content .slide_container:nth-child(' + slide_index + ')').fadeIn();
			slide = slides.get(slide_index-1);
			slide_id = slide.id;
			setTimeout(function(){
				//Start Slide Play
				audio_el = $("#" + slide_id + ' .slide_audio audio');
				audio_el.prop('currentTime', 0);
				audio_el.trigger("play");
				slide_time = $(slide).attr('data_time');
				refreshIntervalId = setInterval(function(){
					slide_time--;
					$("#" + slide_id + ' .slide_timer').html(slide_time);
					if (slide_time == 0){
						$('#training_course_forward').addClass('tbutton_active');
						$('#training_course_pause').removeClass('tbutton_active');
						$('#training_course_play').removeClass('tbutton_active');
						clearInterval(refreshIntervalId);
					}
				}, 1000);
			}, 1000);
		}, 1000);
	}
}
function rewind_training(){
	$('#training_course_content .slide_container:nth-child(' + slide_index + ')').fadeOut();
	$('#training_course_forward').removeClass('tbutton_active');
	console.log(slide_index);
	if(slide_index == 1 || slide_index == 2){
		$('#training_course_pause').removeClass('tbutton_active');
		$('#training_course_back').removeClass('tbutton_active');
	}
	if(slide_index != 2){
		$('#training_course_back').addClass('tbutton_active');
		$('#training_course_pause').addClass('tbutton_active');
	}
	else{
		$('#training_course_pause').removeClass('tbutton_active');
		$('#training_course_forward').addClass('tbutton_active');
		$('#training_course_play').attr('id', 'training_course_pause');
		$('#training_course_pause img').attr('src', $('#training_course_pause img').attr('data-pause'));
	}
	var slide;
	var slide_time;
	setTimeout(function(){
		slide_index--;
		$('#training_course_content .slide_container:nth-child(' + slide_index + ')').fadeIn();
		slide = slides.get(slide_index-1);
		slide_id = slide.id;
		if( slide_index != 1){
			setTimeout(function(){
				//Start Slide Play
				$('#' + slide_id + ' .slide_audio audio').trigger("play");
				slide_time = $(slide).attr('data_time');
				console.log(slide_time);
				refreshIntervalId = setInterval(function(){
					console.log(slide_time);
					slide_time--;
					$("#" + slide_id + ' .slide_timer').html(slide_time);
					if (slide_time == 0)
					{
						$('#training_course_forward').addClass('tbutton_active');
						$('#training_course_back').removeClass('tbutton_active');
						$('#training_course_pause').removeClass('tbutton_active');
						clearInterval(refreshIntervalId);
					}
				}, 1000);
			}, 1000);
		}
	}, 1000);
	
	
}