$(document).ready(function(){
	
	var context;
	var contact_counter = 1;
	
	$('#add_sales_contact').on('click', function(e){
		e.preventDefault();
		$('#referring_contact_template').clone().appendTo('#referring_contacts_container').prop('id', 'referring_contact' + contact_counter);
		context = $('#referring_contact' + contact_counter);
		context.find('#cp_contact_name').prop('name', 'cp_contact_name' + contact_counter);
		context.find('#cp_contact_title').prop('name', 'cp_contact_title' + contact_counter);
		context.find('#cp_contact_email').prop('name', 'cp_contact_email' + contact_counter);
		context.find('#cp_contact_direct').prop('name', 'cp_contact_direct' + contact_counter);
		context.find('#cp_check_name').prop('name', 'cp_check_name' + contact_counter);
		context.find('#cp_check_id').prop('name', 'cp_check_id' + contact_counter);
		context.find('#cp_check_address').prop('name', 'cp_check_address' + contact_counter);
		context.find('#cp_check_attn').prop('name', 'cp_check_attn' + contact_counter);
		contact_counter = contact_counter + 1;
		$('#remove_sales_contact').show();
		return false;
	});
	$('#remove_sales_contact').on('click', function(e){
		e.preventDefault();
		var temp_counter = contact_counter - 1;
		$('#referring_contact' + temp_counter).remove();
		contact_counter = contact_counter - 1;
		if(contact_counter == 0){
			$('#remove_sales_contact').hide();
		}
		return false;
	});


});