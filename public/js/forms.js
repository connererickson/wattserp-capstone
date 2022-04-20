$(document).ready(function(){

    var selected_form_id;
    var selected_form_name;
    var user_id;

    $('.schedule_forms_button').on('click', function() {
        selected_form_id = $(this).attr('form_id');
        selected_form_name = $(this).attr('form_name');
        $('#schedule_forms_modal').modal('show');
    });

    $('.user-select').on('click', function() {
        user_id = $(this).attr('user_id');
        var user_name = $(this).html();
        $('#dropdownMenuButton1').html(user_name);
    });

    $('#submit_form_notification').on('click', function() {
        var parameters = {'form_id' : selected_form_id, 'form_name' : selected_form_name, 'user_id' : user_id};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/safety/forms/form_notification', 0);
		setTimeout(function(){
			if (rtn){
				var dialog_phrase = "User notified";
				var dialog = new Messi(
					dialog_phrase,
					{
						title: 'Form notification',
						titleClass: 'anim success',
						buttons: [
							{id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
						]
					}
				);
                $('#dropdownMenuButton1').html("Select a user");
                $('#schedule_forms_modal').modal('hide');
			}
		},500);
    });

});