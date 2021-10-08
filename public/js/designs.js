$(document).ready(function(){
	
	var context;
	
	//Navigating Design Menus
	$('#design_main_menu li').not('#tools_mo').on('click', function(){
		$('#design_frame').hide();
		$('#utility_frame').hide();
		$('#bom_frame').hide();
		$('#tools_frame').hide();
		$('#fault_calculator').hide();
		$('#vd_calculator').hide();
		$('#schedule_builder').hide();
		$('#res_load_calc').hide();
		switch($(this).attr('id')){
			case 'designer_mo' :
				$('#design_frame').show();
				break;
			case 'utility_mo' :
				$('#utility_frame').show();
				break;
			case 'bom_mo' :
				$('#bom_frame').show();
				break;
			case 'tools_mo' :
				break;
			default:
				$('#design_frame').show();
				break;
		}
	});
	$('#design_main_menu li .dropdown li').on('click', function(){
		$('#design_frame').hide();
		$('#utility_frame').hide();
		$('#bom_frame').hide();
		$('#tools_frame').hide();
		$('#fault_calculator').hide();
		$('#vd_calculator').hide();
		$('#schedule_builder').hide();
		$('#res_load_calc').hide();
		switch($(this).attr('id')){
			case 'fault_mo' :
				$('#tools_frame').show();
				$('#fault_calculator').show();
				break;
			case 'vd_mo' :
				$('#tools_frame').show();
				$('#vd_calculator').show();
				break;
			case 'ps_mo' :
				$('#tools_frame').show();
				$('#schedule_builder').show();
				break;
			case 'rlc_mo' :
				$('#tools_frame').show();
				$('#res_load_calc').show();
				break;
			default:
				$('#design_frame').show();
				break;
		}
	});
});