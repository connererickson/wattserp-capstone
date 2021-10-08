var rate_tier_count = 0;
var rate_interval_count = 0;
var chart_colors = ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 206, 86, 0.2)'];
var chart_colors2 = ['#d41f36', '#3a9922', '#c66906', '#fdfd00', '#1465a5'];
var chart_hours = ['12 AM', '1 AM', '2 AM', '3 AM', '4 AM', '5 AM', '6 AM', '7 AM', '8 AM', '9 AM', '10 AM', '11 AM', '12 PM', '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM'];
$(document).ready(function(){
	
	var context;
	
	//show/hide administrate repository panes
	$('#directory_functions_list .sidebar_function a').on('click', function(){

		$('#administrate_directory .directory_function_container').each(function(){
			$(this).hide();
		});
		switch($(this).attr('id')){
			case 'contacts_button':
				$('#administrate_directory #contacts').show();
				break;
			case 'news_button':
				$('#administrate_directory #news').show();
				break;
			case 'locations_button':
				$('#administrate_directory #locations').show();
				break;
			case 'stakeholder_button':
				$('#administrate_directory #stakeholder').show();
				break;
			case 'projects_button':
				$('#administrate_directory #projects').show();
				break;
			case 'rates_button':
				$('#administrate_directory #rates').show();
				break;
			default:
				break;
		}
	});
	
	/**********************
	 * DIRECTORY CONTACTS 
	 *********************/
	if($('#directory_contact_form .help-block').length){
		$('#administrate_directory .directory_function_container').each(function(){
			$(this).hide();
		});
		$('#administrate_directory #contacts').show();
	}
	
	$(document).on('click', '.edit_contact', function(){
		var context = $(this).parent().parent();
		
		$('#directory_contact_form #first_name').val(context.find('.contact_first_name').html());
		$('#directory_contact_form #last_name').val(context.find('.contact_last_name').html());
		if (context.find('.directory_contact_title').length){
			$('#directory_contact_form #title').val(context.find('.directory_contact_title').html().trim());
		}
		if (context.find('.dc_work_phone .phone').length){
			$('#directory_contact_form #work_phone').val(context.find('.dc_work_phone .phone').html().trim().replace(/\D/g,''));
		}
		if (context.find('.dc_cell_phone .phone').length){
			$('#directory_contact_form #cell_phone').val(context.find('.dc_cell_phone .phone').html().trim().replace(/\D/g,''));
		}
		if (context.find('.dc_email1 a').length){
			$('#directory_contact_form #email1').val(context.find('.dc_email1 a').html().trim());
		}
		console.log(context.find('.dc_email1 a').html().trim());
		if (context.find('.dc_email2 a').length){
			$('#directory_contact_form #email2').val(context.find('.dc_email2 a').html().trim());
		}
		$('#directory_contact_form .crm_form').attr('action', 'http://' + public_domain + '/pages/directory/update_contact');
		$('#directory_contact_form #submit_contact_form').attr('value', 'Edit Contact');
		var contact_id = context.attr('id');
		$('#directory_contact_form #contact_id').val(contact_id);
	});
	/******************************
	 * DIRECTORY NEWS 
	 *****************************/
	$('.edit_news').on('click', function(e){
		e.preventDefault();
		if (!$('#news_save_edit').length){
			var curr_context = $(this).parent().parent();
			var curr_content = curr_context.find('p').html();
			curr_context.find('.news_left_side').append("<textarea class='form-control' id='edit_news'></textarea>");
			curr_context.find('.news_left_side').append("<a href='#' id='news_save_edit' class='crm_btn'>Save</a>");
			curr_context.find('.news_left_side').append("<a href='#' id='news_cancel_edit' class='crm_btn2'>Cancel</a>");
			curr_context.find('p').remove();
			$('#edit_news').html(curr_content);
		}
		return false;
	});
	$(document).on('click', '#news_save_edit', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var news_id = curr_context.attr('id');
		var curr_content = curr_context.find('textarea').val();
		var parameters = {'id' : news_id, 'news' : curr_content};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/directory/save_news', 0);
		setTimeout(function(){
			if (rtn){
				curr_context.find('textarea').remove();
				curr_context.find('#news_save_edit').remove();
				curr_context.find('#news_cancel_edit').remove();
				curr_context.find('.news_left_side').append("<p></p>");
				curr_context.find('p').html(curr_content);
			}
		},1000);
	});
	$(document).on('click', '#news_cancel_edit', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var curr_content = curr_context.find('textarea').html();
		curr_context.find('textarea').remove();
		curr_context.find('#news_save_edit').remove();
		curr_context.find('#news_cancel_edit').remove();
		curr_context.find('.news_left_side').append("<p></p>");
		curr_context.find('p').html(curr_content);
	});
	$('.delete_news').on('click', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var news_id = curr_context.attr('id');
		var parameters = {'id' : news_id};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/directory/delete_news', 0);
		setTimeout(function(){
			if (rtn){
				curr_context.remove();
			}
		},1000);
	});
	/******************************
	 * DIRECTORY LOCATIONS 
	 *****************************/
	if($('#directory_location_form .help-block').length){
		$('#administrate_directory .directory_function_container').each(function(){
			$(this).hide();
		});
		$('#administrate_directory #locations').show();
	}
	
	$(document).on('click', '.edit_location', function(){
		var context = $(this).parent().parent();
		
		$('#directory_location_form #address').val(context.find('.directory_address').html());
		$('#directory_location_form #city').val(context.find('.directory_city').html());
		$('#directory_location_form #state').val(context.find('.directory_state').html());
		$('#directory_location_form #zip').val(context.find('.directory_zip').html());
		
		$('#directory_location_form .crm_form').attr('action', 'http://' + public_domain + '/pages/directory/update_address');
		$('#directory_location_form #submit_address_form').attr('value', 'Edit Location');
		var location_id = context.attr('id');
		$('#directory_location_form #address_id').val(location_id);
	});
	/******************************
	 * STAKEHOLDER CORRESPONDENCE 
	 *****************************/
	$('.edit_stakeholdercorrespondence').on('click', function(e){
		e.preventDefault();
		if (!$('#sc_save_edit').length){
			var curr_context = $(this).parent().parent();
			var curr_content = curr_context.find('p').html();
			curr_context.find('.sc_left_side').append("<textarea class='form-control' id='edit_correspondence'></textarea>");
			curr_context.find('.sc_left_side').append("<a href='#' id='sc_save_edit' class='crm_btn'>Save</a>");
			curr_context.find('.sc_left_side').append("<a href='#' id='sc_cancel_edit' class='crm_btn2'>Cancel</a>");
			curr_context.find('p').remove();
			$('#edit_correspondence').html(curr_content);
		}
		return false;
	});
	$(document).on('click', '#sc_save_edit', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var sc_id = curr_context.attr('id');
		var curr_content = curr_context.find('textarea').val();
		console.log(curr_content);
		var parameters = {'id' : sc_id, 'message' : curr_content};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/directory/save_stakeholdercorrespondence', 0);
		setTimeout(function(){
			if (rtn){
				curr_context.find('textarea').remove();
				curr_context.find('#sc_save_edit').remove();
				curr_context.find('#sc_cancel_edit').remove();
				curr_context.find('.sc_left_side').append("<p></p>");
				curr_context.find('p').html(curr_content);
			}
		},1000);
	});
	$(document).on('click', '#sc_cancel_edit', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var curr_content = curr_context.find('textarea').html();
		curr_context.find('textarea').remove();
		curr_context.find('#sc_save_edit').remove();
		curr_context.find('#sc_cancel_edit').remove();
		curr_context.find('.sc_left_side').append("<p></p>");
		curr_context.find('p').html(curr_content);
	});
	$('.delete_stakeholdercorrespondence').on('click', function(e){
		e.preventDefault();
		var curr_context = $(this).parent().parent();
		var sc_id = curr_context.attr('id');
		var parameters = {'id' : sc_id};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/directory/delete_stakeholdercorrespondence', 0);
		setTimeout(function(){
			if (rtn){
				curr_context.remove();
			}
		},1000);
	});
	/***************************
	 * MANAGE RATES FORMS 
	 **************************/
	$("select[name='service_charge_type']").on('change', function(){
		$('#fixed_charge_container').hide();
		$('#daily_charge_container').hide();
		switch($(this).val()){
			case 'fixed_monthly_charge':
				$('#fixed_charge_container').show();
				break;
			case 'daily_charge':
				$('#daily_charge_container').show();
				break;
			default:
				break;
		}
	});
	$("select[name='rate_type']").on('change', function(){
		$('#flat_rate_container').hide();
		$('#tou_rate_container').hide();
		$('#tiered_rate_container').hide();
		switch($(this).val()){
			case 'time_of_use':
				$('#tou_rate_container').show();
				break;
			case 'flat_rate':
				$('#flat_rate_container').show();
				break;
			case 'tiered':
				$('#tiered_rate_container').show();
				break;
			default:
				break;
		}
	});
	$("select[name='demand']").on('change', function(){
		$('#demand_add_period').hide();
		switch($(this).val()){
			case 'yes':
				$('#demand_add_period').css('display', 'inline-block');
				break;
			case 'no':
				$(this).parent().find('.demand_period_row').each(function(){
					$(this).remove();
				});
				break;
			default:
				break;
		}
	});
	$(document).on('click', '#demand_add_period', function(){
		var context = $(this).parent();
		var new_demand = $('#demand_period_row').clone().appendTo(context).prop('id', "").addClass('demand_period_row');
		new_demand.insertBefore('#demand_add_period');
		$('.timepicker').datetimepicker({
            format: 'h A'
        });
	});
	$(document).on('click', '#usage_add_period', function(){
		var context = $(this).parent();
		var new_usage = $('#kwh_period_row').clone().appendTo(context).prop('id', "").addClass('kwh_period_row');
		new_usage.insertBefore('#usage_add_period');
		$('.timepicker').datetimepicker({
            format: 'h A'
        });
	});
	$(document).on('change', "select[name='max_demand']", function(){
		var context = $(this);
		if(context.val() == "no_max"){
			context.parent().parent().find('.demand_limit').hide();
		}
		else{
			context.parent().parent().find('.demand_limit').show();
		}
	});
	$(document).on('change', "select[name='max_kwh']", function(){
		var context = $(this);
		if(context.val() == "no_max"){
			context.parent().parent().find('.kwh_limit').hide();
		}
		else{
			context.parent().parent().find('.kwh_limit').show();
		}
	});
	$(document).on('click', '.delete_demand_period', function(){
		$(this).parent().parent().remove();
	});
	$(document).on('click', '.delete_usage_period', function(){
		$(this).parent().parent().remove();
	});
	$(document).on('change', '.adjustor_type', function(){
		var choice = $('option:selected', this).text();
		var context = $(this).parent().parent().parent();
		context.find('.adjust_amount_group').hide();
		if (choice != "None"){
			context.find('.adjustor_amount_label').text(choice);
			context.find('.adjust_amount_group').show();
		}
	});
	
	
	
	
	
	
	
	
	$(document).on('click', '#add_tier', function(e){
		e.preventDefault();
		rate_tier_count++;
		var container = $(this).parent();
		$('#tiered_row').find('.tier_label').html('Tier ' + rate_tier_count);
		container.append($('#tiered_row').clone().attr('id', 'tiered_row_' + rate_tier_count));
		$('#tiered_row_' + rate_tier_count).find('#rate_tier').attr('id', 'rate_tier' + rate_tier_count).attr('name', 'rate_tier' + rate_tier_count);
		$('#tiered_row_' + rate_tier_count).find('#tier_cost').attr('id', 'tier_cost' + rate_tier_count).attr('name', 'tier_cost' + rate_tier_count);
		if (rate_tier_count != 1){
			var temp = rate_tier_count-1;
			$("#tiered_row_" + temp).find('.remove_tier').remove();
		}
		return false;
	});
	$(document).on('click', '.remove_tier', function(){
		rate_tier_count--;
		var temp = rate_tier_count;
		var el = $(this);
		var context = $(this).parent().parent().remove();
		$("#tiered_row_" + temp).find('.col-md-1').append(el);
	});
	$(document).on('click', '#add_interval', function(e){
		e.preventDefault();
		rate_interval_count++;
		var container = $(this).parent();
		container.append($('#interval_row').clone().attr('id', 'interval_row_' + rate_interval_count));
		$('#interval_row_' + rate_interval_count).find('#interval_name').attr('id', 'interval_name' + rate_interval_count).attr('name', 'interval_name' + rate_interval_count);
		$('#interval_row_' + rate_interval_count).find('#rate_interval_start').attr('id', 'rate_interval_start' + rate_interval_count).attr('name', 'rate_interval_start' + rate_interval_count);
		$('#interval_row_' + rate_interval_count).find('#rate_interval_end').attr('id', 'rate_interval_end' + rate_interval_count).attr('name', 'rate_interval_end' + rate_interval_count);
		$('#interval_row_' + rate_interval_count).find('#interval_cost').attr('id', 'interval_cost' + rate_interval_count).attr('name', 'interval_cost' + rate_interval_count);
		if (rate_interval_count != 1){
			var temp = rate_interval_count-1;
			$("#interval_row_" + temp).find('.remove_interval').remove();
		}
		$('.timepicker').datetimepicker({
            format: 'h A'
        });
		return false;
	});
	$(document).on('click', '.remove_interval', function(){
		rate_interval_count--;
		var temp = rate_interval_count;
		var el = $(this);
		var context = $(this).parent().parent().remove();
		$("#interval_row_" + temp).find('.col-md-1').append(el);
	});
	$(document).on('change', ".interval_cost", function(){
		update_tou();
	});
	$(document).on('change', ".rate_interval_end", function(){
		update_tou();
	});
	$(document).on('change', ".rate_interval_start", function(){
		update_tou();
	});
		
	$(document).on('change', "[name='rate_tier']", function(){
		var index_arr = [];
		var context = $(this).parent().parent();
		var index = context.attr('id').split('_')[2];
		var val = $(this).val();
		var exists_flag = 0;
		for(var i = 1; i < rate_tier_count; i++){
			if (index_arr[i] == index){
				//update
				exists_flag = 1;
			}
		}
		if (exists_flag == 0){
			tiered_chart.data.datasets.push({label: val, data: val, backgroundColor: chart_colors[index-1]});
			var chart_height = $('#tiered_chart').height();
			$('#tiered_chart').height(chart_height + 75);
		}
  		tiered_chart.update();
	});
});

function update_tou(){
	var interval_arr = {
		touindex: 5,
		touname: "test",
		toucost: "cost",
		toudata: new Array()
	};
	var ints_arr = new Array();
	var go_flag = 0;
	var counter = 0;
	var index = 0;
	var name, cost = "";
	$("#intervals .interval_row").each(function(){
		tou_chart.data.datasets.pop();
	});
	
	$("#intervals .interval_row").each(function(){
		index = $(this).attr('id').split('_')[2];
		name = $(this).find("[name='interval_name" + index + "']").val();
		cost = $(this).find("[name='interval_cost" + index + "']").val();
		for (var j = 0; j < chart_hours.length; j++){
			if (chart_hours[j] == $(this).find("[name='rate_interval_start" + index + "']").val()){
				go_flag = 1;
			}
			if (chart_hours[j] == $(this).find("[name='rate_interval_end" + index + "']").val()){
				go_flag = 0;
			}
			if (go_flag){
				ints_arr[j] = cost*100;
			}
			else{
				ints_arr[j] = 0;
			}
		}
		/*if (go_flag){
			for (var j = 0; j < chart_hours.length; j++){
				if (chart_hours[j] == $(this).find("[name='rate_interval_end" + index + "']").val()){
					go_flag = 0;
				}
				if (go_flag){
					ints_arr[j] = cost*100;
				}
			}
		}*/
		console.log(ints_arr);
		interval_arr.touindex = index;
		interval_arr.touname = name;
		interval_arr.toucost = cost;
		interval_arr.toudata = ints_arr;
		
		tou_chart.data.datasets.push({label: interval_arr.touname, data: interval_arr.toudata, order: i, barThickness: 'flex', maxBarThickness: 100, barPercentage: .8, backgroundColor: chart_colors2[index-1]});
	});

	//tou_chart.data.datasets.pop();
	//tou_chart.data.datasets.pop();
	
	tou_chart.data.datasets.push({label: 'Solar Approximation', data: [0, 0, 0, 0, 0, 0, 2, 6, 12, 22, 35, 44, 50, 52, 50, 44, 35, 22, 12, 6, 2, 0], type: 'line'});
	
	tou_chart.update();
}
function ShallowCopy(o) {
  var copy = Object.create(o);
  for (prop in o) {
    if (o.hasOwnProperty(prop)) {
      copy[prop] = o[prop];
    }
  }
  return copy;
}
function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}