
$(document).ready(function(){
	
	//Start the Weather APP Clock
	startTime();
	
	//Set the Wind Bearing Needle
	windBearing();
	
	cloudCover();
	
	//LOCATION TABS FOR WEATHER APP
	$('#weather_locations li:first').addClass('current');
	$('#weather_container .weather_data:first').show();
	$('#weather_locations li').on('click', function(){
		if(!$(this).hasClass('current')){
			$('#weather_locations li').each(function(){
				$(this).removeClass('current');
			});
			$(this).addClass('current');
			$('.weather_data').each(function(){
				$(this).hide();
			});
			var curr_index = $(this).index() + 1;
			$('#weather_container :nth-child(' + curr_index +')').show();
		}
	});
	
	$('#weather_add_location').on('click', function(e){
		e.preventDefault();
		$('#add_location_form')[0].reset();
		$('#submit_new_location').show();
		$('#submit_location_update').hide();
		$('#add_location_form #location_id').val('');
		$('#weather_locations').slideUp();
		$('#add_location_form_container').slideDown();
	});
	if ($('.help-block').length){
		$('#weather_locations').slideUp();
		$('#add_location_form_container').slideDown();
		if ($('#add_location_form #location_id').val() == ''){
			$('#submit_new_location').show();
			$('#submit_location_update').hide();
		}
		else{
			$('#submit_new_location').hide();
			$('#submit_location_update').show();
		}
					//Need to know here if the form was new or UPDATE **************
	}
	$('#cancel_add_location').on('click', function(e){
		e.preventDefault();
		$('#add_location_form')[0].reset();
		$('#add_location_form_container').slideUp();
		$('#weather_locations').slideDown();
		$('#submit_new_location').hide();
		$('#submit_location_update').hide();
	});
	$(document).on('click', '.weather_edit_location', function(e){
		e.preventDefault();
		$('#add_location_form #location_id').val($(this).attr('id'));
		$('#add_location_form #city').val($(this).attr('data-city'));
		$('#add_location_form #state').val($(this).attr('data-state'));
		$('#add_location_form #latitude').val($(this).attr('data-latitude'));
		$('#add_location_form #longitude').val($(this).attr('data-longitude'));
		$('#submit_location_update').show();
		$('#weather_locations').slideUp();
		$('#add_location_form_container').slideDown();
	});
});


function checkTime(i) {
    return (i < 10) ? "0" + i : i;
}
function startTime() {
    var today = new Date(),
    h = checkTime(today.getHours()),
    m = checkTime(today.getMinutes()),
    s = checkTime(today.getSeconds());
    var ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12;
	h = h ? h : 12; // the hour '0' should be '12'

	//m = m < 10 ? '0'+m : m;
	var strTime = "" + h + ":" + m + ":" + s + ' ' + ampm;
    $('.time').each(function(){
    	$(this).html(strTime);
    });
    t = setTimeout(function () {
        startTime();
    }, 500);
}

//Wind Bearing Needle Animation
function windBearing() {
	var $elie;
	$('#weather_container .wind_bearing .needle').each(function(){
		var windBearing = $(this).attr('data-angle');
		$elie = $(this);
		rotate(windBearing);
	});

    function rotate(degree) {
        $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)'});
        $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)'});
    }
}
function cloudCover(){
	var $cloud;
	$('#weather_container .cloud_cover .fas').each(function(){
		var cloudCover = $(this).attr('data-cloud');
		$cloud = $(this);
		fill(cloudCover);
	});

    function fill(percent) {
    	console.log("test");
        $cloud.css({ "background-image": "-webkit-linear-gradient(left, #0F75BC 0%, #FFFFFF " + percent + "%" });
    	$cloud.css({ "background-image": "-moz-linear-gradient(left, #0F75BC 0%, #FFFFFF " + percent + "%" });
    	$cloud.css({ "background-image": "-ms-linear-gradient(left, #0F75BC 0%, #FFFFFF " + percent + "%" });
    	$cloud.css({ "background-image": "-o-linear-gradient(left, #0F75BC 0%, #FFFFFF " + percent + "%" });
    	$cloud.css({ "background-image": "linear-gradient(to right, #0F75BC 0%, #FFFFFF " + percent + "%" });
    }
}
