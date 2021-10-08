var county = "";

$(document).ready(function(){
	
	var context;
	
	//Add a new contact to a portfolio
	$('#add_portfolio_contact').on('click', function(){
		$('#add_contact_form').slideDown( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//When the new contact form is submitted, show it again if there are validation issues
	$('#submit_contact_form').on('click', function(){
		sessionStorage.setItem("contact_form_ref",1);
	});
	
	//When the edit contact form is submitted, show it again if there are validation issues
	$('#submit_edit_contact_form').on('click', function(){
		sessionStorage.setItem("contact_edit_form_ref",1);
	});
	
	//When the new contact form is submitted, show it again if there are validation issues
	if(sessionStorage.getItem("contact_form_ref") == 1){
		if ($('.bg_success').length == 0){
			$('#add_contact_form').slideDown( "slow", function() {
	    		// Animation complete.
	  		});
  			sessionStorage.setItem("contact_form_ref",0);
  		}
	}
	
	//When the edit contact form is submitted, show it again if there are validation issues
	if(sessionStorage.getItem("contact_edit_form_ref") == 1){
		if ($('.bg_success').length == 0){
			$('#edit_contact_form').slideDown( "slow", function() {
	    		// Animation complete.
	  		});
  			sessionStorage.setItem("contact_edit_form_ref",0);
  		}
	}
	
	//If you click the edit contact button, pre-fill the form with the correct contact's information
	$(document).on('click', '.portfolio_edit_contact', function(){
		sessionStorage.setItem("contact_edit_form_ref",1);
		var contact_id = $(this).parent().attr('id');
		var first_name = $(this).parent().find('.contact_first_name').html();
		var middle_name = $(this).parent().find('.contact_middle_name').html();
		var last_name = $(this).parent().find('.contact_last_name').html();
		var title = $(this).parent().find('.portfolio_contact_title').html();
		var home_phone = $(this).parent().find('.e_home_phone span').html();
		var office_phone = $(this).parent().find('.e_work_phone span').html();
		var cell_phone = $(this).parent().find('.e_cell_phone span').html();
		var email1 = $(this).parent().find('.e_email1 a').html();
		var email2 = $(this).parent().find('.e_email2 a').html();
		
		//Clear the Form
		$('#edit_contact_form #first_name').val("");
		$('#edit_contact_form #middle_name').val("");
		$('#edit_contact_form #last_name').val("");
		$('#edit_contact_form #title').val("");
		$('#edit_contact_form #home_phone').val("");
		$('#edit_contact_form #work_phone').val("");
		$('#edit_contact_form #cell_phone').val("");
		$('#edit_contact_form #email1').val("");
		$('#edit_contact_form #email2').val("");
		
		$('#edit_contact_form form #contact_id').val(contact_id);
		var action = $('#edit_contact_form form').attr('action');
		$('#edit_contact_form form').attr('action', 'http://' + public_domain + '/pages/leads/update_portfolio_contact/' + contact_id);
		
		if (typeof first_name !== 'undefined'){
			$('#edit_contact_form #first_name').val(first_name);
		}
		if (typeof middle_name !== 'undefined'){
			$('#edit_contact_form #middle_name').val(middle_name);
		}
		if (typeof last_name !== 'undefined'){
			$('#edit_contact_form #last_name').val(last_name);
		}
		if (typeof title !== 'undefined'){
			$('#edit_contact_form #title').val(title.trim());
		}
		if (typeof home_phone !== 'undefined'){
			$('#edit_contact_form #home_phone').val(home_phone.replace(/\D/g,''));
		}
		if (typeof office_phone !== 'undefined'){
			$('#edit_contact_form #work_phone').val(office_phone.replace(/\D/g,''));
		}
		if (typeof cell_phone !== 'undefined'){
			$('#edit_contact_form #cell_phone').val(cell_phone.replace(/\D/g,''));
		}
		if (typeof email1 !== 'undefined'){
			$('#edit_contact_form #email1').val(email1);
		}
		if (typeof email2 !== 'undefined'){
			$('#edit_contact_form #email2').val(email2);
		}
		$('#edit_contact_form').slideDown( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//Close the edit contact form
	$('#cancel_edit_portfolio_contact').on('click', function(){
		$('#edit_contact_form').slideUp( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//Close the new contact form
	$('#cancel_add_portfolio_contact').on('click', function(){
		$('#add_contact_form').slideUp( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//Begin to show the address edit form
	$('#edit_project_address').on('click', function(){
		$('#edit_project_address_form').slideDown( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//Hide the address edit form
	$('#cancel_edit_project_address').on('click', function(){
		$('#edit_project_address_form').slideUp( "slow", function() {
    		// Animation complete.
  		});
	});
	
	//If the state of the address edit form is changed, find counties in the state and display the county select dropddown
	$('#state').on('change', function(){
		$('#project_address_form_part_apn').hide();
		$('#project_address_form_part_address').hide();
		if ($(this).find('option:selected').val() != 0){
			$('#project_address_form_part_county').hide();
			$('#county_loader').show();
			get_counties();
		}
	});
	
	//If the county of the address edit form is changed, show the address and parcel entry portions of the form
	$('#county').on('change', function(){
		if ($(this).find('option:selected').val() != 0){
			$('#project_address_form_part_apn').show();
			$('#project_address_form_part_address').show();
			county = $('#county').find('option:selected').val();
		}
		else{
			$('#project_address_form_part_apn').hide();
			$('#project_address_form_part_address').hide();
		}
	});
	
	//If the parcel is changed, we need to search the county APIs for auto data fill
	$('#apn').on('change', function(){
		if ($(this).val() != ''){
			//search_county_api($(this).val());
		}
	});
	
	//If the address is changed, we need to search the county APIs for auto data fill
	$('#address').on('change', function(){
		if ($(this).val() != ''){
			//search_county_api($(this).val());
		}
	});
	
	//If a new residential category is requested from the new Attribute Form in Settings - > Attributes, show the Category Text Input
	$('#category_res').on('change', function(){
		if ($(this).find('option:selected').val() == 'new'){
			$('#new_category_res').show();
		}
		else{
			$('#new_category_res').hide();
		}
	});
	
	//If a new commercial category is requested from the new Attribute Form in Settings - > Attributes, show the Category Text Input
	$('#category_com').on('change', function(){
		if ($(this).find('option:selected').val() == 'new'){
			$('#new_category_com').show();
		}
		else{
			$('#new_category_com').hide();
		}
	});
	
	//If a new utility category is requested from the new Attribute Form in Settings - > Attributes, show the Category Text Input
	$('#category_util').on('change', function(){
		if ($(this).find('option:selected').val() == 'new'){
			$('#new_category_util').show();
		}
		else{
			$('#new_category_util').hide();
		}
	});
	
	//ADD AN ATTRIBUTE ON THE ATTRIBUTE SETTINGS PAGE
	$('.add_project_attribute_button').on('click', function(e){
		e.preventDefault();
		var form = $(this).closest('form');
		form.find('.cat_error').hide();
		form.find('.new_cat_error').hide();
		form.find('.prop_error').hide();
		var category = form.find("[name='category']").find('option:selected').val();
		var attribute = form.find("[name='attribute']").val();
		var new_cat = "";
		var flag = 1;
		if (form.find("[name='new_category']").length){
			new_cat = form.find("[name='new_category']").val();
		}
		if (category == 0){
			form.find('.cat_error').show();
			flag = 0;
		}
		if (category == 'new'){
			if(new_cat == ''){
				form.find('.new_cat_error').show();
				flag = 0;
			}
		}
		if (attribute == ''){
			form.find('.prop_error').show();
			flag = 0;
		}
		if (flag == 1){
			var data = form.serialize();
			go_ajax2(data, 'save_project_attribute', 0);
			setTimeout(function(){
				if (rtn){
					window.location.reload();
				}
			},1000);
		}
	});
	
	//DELETE AN ATTRIBUTE ON THE ATTRIBUTE SETTINGS PAGE
	$(document).on('click', '#attributes_sections .attribute_display .delete_attribute', function(){
		var attribute_id = $(this).parent().attr('id');
		go_ajax2({id : attribute_id}, 'delete_project_attribute', 0);
		setTimeout(function(){
			if (rtn){
				window.location.reload();
			}
		},1000);
	});
	
	//Checkbox ADD OR REMOVE PROJECT ATTRIBUTE TO PROPOSAL/PROJECT
	$(document).on('change', '.attribute_display input', function(){
		var attribute_tag = $(this).parent().attr('id');
		var proposal_id = $(this).attr('id');
		if($(this).is(":checked")){
			go_ajax2({ project_id : proposal_id, tag : attribute_tag, value : 1 }, 'insert_project_meta', 0);
			setTimeout(function(){
				if (rtn){
				}
			},1000);
		}
		else{
			go_ajax2({ project_id : proposal_id, tag : attribute_tag }, 'remove_project_meta', 0);
			setTimeout(function(){
				if (rtn){
				}
			},1000);
		}
	});
});

function get_counties(){
	var state = $('#state option:selected').val();
	
	var parameters = {'state' : state};
	go_ajax2(parameters, 'get_counties', 0);
	setTimeout(function(){
		if (rtn){
			var counties = rtn['msg']['county'];
			$('#edit_project_address_form #county').html("<option value='0'>-- Select --</option>");
			for(var i = 0; i < counties.length; i++){
				$('#edit_project_address_form #county').append("<option value='" + counties[i] + "'>" + counties[i] + "</option>");
				$('#project_address_form_part_county').show();
				$('#county_loader').hide();
			}
		}
	},1000);
}

function search_county_api(address_data){
	switch(county){
		case 'Maricopa County' :
			alert('search maricopa api');
			break;
		default:
			break;
	}
}
