$(document).ready(function(){
	
	var context;
	
	//Hide or show the create employee form as long as an unassigned user is selected
	$('[name=unassigned_users]').on('change', function(){
		context = $(this);
		if(context.val() != 'select'){
			$('#create_employee_row').show();
			$('#user_id').val(context.find(":selected").val());
		}
		else{
			$('#create_employee_row').hide();
		}
	});
	if(document.referrer == 'http://' + public_domain + '/pages/employees/create'){
		$('#create_employee_row').show();
		var user_id = $('#user_id').val();
		$("select[name=unassigned_users] option[value=" + user_id + "]").attr('selected', 'selected');
		$('select[name=unassigned_users]').val(user_id);
	}
	if(document.referrer == 'http://' + public_domain + '/pages/sales_team/create'){
		$('#create_employee_row').show();
		var user_id = $('#user_id').val();
		$("select[name=unassigned_users] option[value=" + user_id + "]").attr('selected', 'selected');
		$('select[name=unassigned_users]').val(user_id);
	}
});