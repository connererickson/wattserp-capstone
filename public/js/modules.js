$(document).ready(function(){
	$('.drop_down_options').on('click', function(){
		if( $(this).parent().find('.options_menu').css('display') == 'none'){
			$(this).parent().css('min-height', '100px');
			$(this).parent().find('.options_menu').show();
			
		}
		else{
			$(this).parent().css('min-height', '1px');
			$(this).parent().find('.options_menu').hide();
		}
	});
	$('#mashed_potatoes_body img').attr('src', "http://" + public_domain + "/images/mp.png");
});
