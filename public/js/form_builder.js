var rtn;
var grid;

$(document).ready(function(){
	
	var context;
	
	var form = $('#form_build');
	
	//Center the update heading
	var window_width = $(window).width();
	$('#update_notification').css('margin-left', window_width / 3);
	
	//FOR ADDING AND EDITING THE HEADING ELEMENT
	$('#heading').on('click', function(){
		var form_item_string = "<div class='grid-item form_item h'>";
		form_item_string += "<p class='form_heading'>This is a heading. Click the Edit Button to change the text.</p>";
		form_item_string += "<div class='edit_form_heading'><img src='http://" + public_domain + "/images/edit.png'/></div></div>";
		form.append(form_item_string);
		dragging();
	});
	
	$(document).on('click', '.edit_form_heading', function(){
		var context = $(this);
		var p_el = context.parent().find('.form_heading');
		var value = p_el.html();
		p_el.html("<input class='form_text_input' type='text' value='" + value + "' />");
		context.removeClass('edit_form_heading').addClass('save_form_heading');
		context.find('img').attr('src', "http://" + public_domain + "/images/save.png");
	});
	
	$(document).on('change', '.form_text_input', function(){
		$(this).attr('value', $(this).val());
	});
	
	$(document).on('click', '.save_form_heading', function(){
		var context = $(this);
		var p_el = context.parent().find('.form_heading');
		var value = p_el.find('.form_text_input').attr('value');
		p_el.html(value);
		context.removeClass('save_form_heading').addClass('edit_form_heading');
		context.find('img').attr('src', "http://" + public_domain + "/images/edit.png");
		save_form();
	});
	
	//FOR ADDING AND EDITING THE TEXT INPUT ELEMENT
	$('#text').on('click', function(){
		var form_item_string = "<div class='grid-item form_item ti'>";
		form_item_string += "<label for=''>Text Input Heading</label>";
		form_item_string += "<div class='edit_field_label'><img src='http://" + public_domain + "/images/edit.png'/></div><br />";
		form_item_string += "<input class='form_text_input' type='text' name='' placeholder='sample text input only'/></div>";
		form.append(form_item_string);
		dragging();
	});
	
	$(document).on('click', '.edit_field_label', function(){
		var context = $(this);
		var l_el = context.parent().find('label');
		var label = l_el.html();
		l_el.html("<input class='form_label_text' type='text' value='" + label + "' />");
		context.removeClass('edit_field_label').addClass('save_field_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/save.png");
	});
	
	$(document).on('change', '.form_label_text', function(){
		$(this).attr('value', $(this).val());
	});
	
	$(document).on('click', '.save_field_label', function(){
		var context = $(this);
		var l_el = context.parent().find('label');
		var label = l_el.find('.form_label_text').attr('value');
		l_el.html(label);
		context.removeClass('save_field_label').addClass('edit_field_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/edit.png");
		save_form();
	});
	
	//FOR ADDING AND EDITING THE TEXT AREA ELEMENT
	$('#textarea').on('click', function(){
		var form_item_string = "<div class='grid-item form_item ta'>";
		form_item_string += "<label for=''>Text Area Heading</label>";
		form_item_string += "<div class='edit_field_label'><img src='http://" + public_domain + "/images/edit.png'/></div><br />";
		form_item_string += "<textarea class='form_textarea_input' name='' placeholder='sample text input only'></textarea>";
		form_item_string += "<div class='text_area_controls'><div class='up_arrow'>";
		form_item_string += "<img src='http://" + public_domain + "/images/up.png'/></div><div class='down_arrow'>";
		form_item_string += "<img src='http://" + public_domain + "/images/down.png'/></div></div></div>";
		form.append(form_item_string);
		dragging();
	});
	
	$(document).on('click', '.up_arrow', function(){
		
		var context = $(this).parent().parent().find('textarea');
		if(context.height() < 220){
			context.css('height', context.height() + 25);
			console.log($(this).css('margin-bottom'));
			var new_margin = parseInt($(this).css('margin-bottom').slice(0,-2)) + 19;
			$(this).css('margin-bottom', new_margin + 'px');
		}
	});
	
	$(document).on('click', '.down_arrow', function(){
		var context = $(this).parent().parent().find('textarea');
		if (context.height() >= 55){
			var up_arrow = $(this).parent().find('.up_arrow');
			context.css('height', context.height() - 10);
			var new_margin = parseInt(up_arrow.css('margin-bottom').slice(0,-2)) - 16;
			up_arrow.css('margin-bottom', new_margin + 'px');
		}
	});
	
	//FOR ADDING AND EDITING THE CHECKBOX AREA ELEMENT
	$('#checkbox').on('click', function(){
		var form_item_string = "<div class='grid-item form_item cb'>";
		form_item_string += "<label for=''>Checkbox Area Heading</label>";
		form_item_string += "<div class='edit_field_label'><img src='http://" + public_domain + "/images/edit.png'/></div>";
		form_item_string += "<div class='checkbox_elements'></div>";
		form_item_string += "<div class='add_form_element checkbox'><img src='http://" + public_domain + "/images/plus.png'/></div>";
		form_item_string += "</div>";
		form.append(form_item_string);
		dragging();
	});
	
	$(document).on('click', '.add_form_element', function(){
		if ($(this).hasClass('checkbox')){
			checkbox_string = "<div class='checkbox_element'><input type='checkbox' name='' />";
			checkbox_string += "<span class='checkbox_label'>label</span>";
			checkbox_string += "<div class='edit_checkbox_label'><img src='http://" + public_domain + "/images/edit.png'/></div>";
			checkbox_string += "</div>";
			$(this).parent().find('.checkbox_elements').append(checkbox_string);
		}
		if ($(this).hasClass('dropdown')){
			context = $(this).parent();
			if (context.find('.form_text_input').val() != ""){
				var text = context.find('.form_text_input').val();
				var value = context.find('.form_text_input').val().toLowerCase().replace(" ", "_");
				context.find('select').append("<option value='" + value + "'>" + text + "</option>");
				save_form();
			}
		}
		if ($(this).hasClass('radio')){
			radio_string = "<div class='radio_element'><input type='radio' name='radio' />";
			radio_string += "<span class='radio_label'>label</span>";
			radio_string += "<div class='edit_radio_label'><img src='http://" + public_domain + "/images/edit.png'/></div>";
			radio_string += "</div>";
			$(this).parent().find('.radio_elements').append(radio_string);
		}
	});
	
	$(document).on('click', '.edit_checkbox_label', function(){
		var context = $(this);
		var l_el = context.parent().find('span');
		var label = l_el.html();
		l_el.html("<input class='checkbox_label_text' type='text' value='" + label + "' />");
		context.removeClass('edit_checkbox_label').addClass('save_checkbox_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/save.png");
	});
	
	$(document).on('change', '.checkbox_label_text', function(){
		$(this).attr('value', $(this).val());
	});
	
	$(document).on('click', '.save_checkbox_label', function(){
		var context = $(this);
		var l_el = context.parent().find('span');
		var label = l_el.find('.checkbox_label_text').attr('value');
		l_el.html(label);
		context.removeClass('save_checkbox_label').addClass('edit_checkbox_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/edit.png");
		save_form();
	});
	
	//FOR ADDING AND EDITING THE SELECT ELEMENT
	$('#dropdown').on('click', function(){
		var form_item_string = "<div class='grid-item form_item dd'>";
		form_item_string += "<label for=''>Dropdown Area Heading</label>";
		form_item_string += "<div class='edit_field_label'><img src='http://" + public_domain + "/images/edit.png'/></div>";
		form_item_string += "<p>Dropdown Items:</p>";
		form_item_string += "<input class='form_text_input' type='text' name='' placeholder='Enter new dropdown option here' />";
		form_item_string += "<div class='add_form_element dropdown'><img src='http://" + public_domain + "/images/plus.png'/></div>";
		form_item_string += "<select class='form-control' name=''></select></div>";
		form.append(form_item_string);
		dragging();
	});
	
	//FOR ADDING AND EDITING THE RADIO BUTTONS ELEMENT
	$('#radio').on('click', function(){
		var form_item_string = "<div class='grid-item form_item rb'>";
		form_item_string += "<label for=''>Radio Button Area Heading</label>";
		form_item_string += "<div class='edit_field_label'><img src='http://" + public_domain + "/images/edit.png'/></div>";
		form_item_string += "<div class='add_form_element radio'><img src='http://" + public_domain + "/images/plus.png'/></div>";
		form_item_string += "<div class='radio_elements'></div></div>";
		form.append(form_item_string);
		dragging();
	});
	
	$(document).on('click', '.edit_radio_label', function(){
		var context = $(this);
		var l_el = context.parent().find('span');
		var label = l_el.html();
		l_el.html("<input class='radio_label_text' type='text' value='" + label + "' />");
		context.removeClass('edit_radio_label').addClass('save_radio_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/save.png");
	});
	
	$(document).on('change', '.radio_label_text', function(){
		$(this).attr('value', $(this).val());
	});
	
	$(document).on('click', '.save_radio_label', function(){
		var context = $(this);
		var l_el = context.parent().find('span');
		var label = l_el.find('.radio_label_text').attr('value');
		l_el.html(label);
		context.removeClass('save_radio_label').addClass('edit_radio_label');
		context.find('img').attr('src', "http://" + public_domain + "/images/edit.png");
		save_form();
	});
	
});

function save_form(){
	
	var form = $('#form_build');
	form_data = {};
	var save_flag = 1;
	
	if ($('#form_name').val() == ''){
		$('#form_name_warning').show();
		save_flag = 0;
	}
	else{
		$('#form_name_warning').hide();
		form_data['form_name'] = $('#form_name').val();
	}
	
	if ($('#form_type').find(":selected").val() == "0"){
		$('#form_type_warning').show();
		save_flag = 0;
	}
	else{
		$('#form_type_warning').hide();
		form_data['form_type'] = $('#form_type').find(":selected").val();
	}
	
	if(save_flag == 1){
		form_data['fields'] = {};
		
		form.find('.form_item').each(function(index){
			form_data['fields'][index] = {};
			if($(this).hasClass('h')){
				form_data['fields'][index]['type'] = 'h';
				form_data['fields'][index]['content'] = $(this).find('.form_heading').html();
			}
			if ($(this).hasClass('ti')){
				form_data['fields'][index]['type'] = 'ti';
				form_data['fields'][index]['content'] = $(this).find('label').html();
			}
			if ($(this).hasClass('ta')){
				form_data['fields'][index]['type'] = 'ta';
				form_data['fields'][index]['content'] = $(this).find('label').html();
				form_data['fields'][index]['height'] = $(this).find('textarea').height();
			}
			if ($(this).hasClass('cb')){
				form_data['fields'][index]['type'] = 'cb';
				form_data['fields'][index]['content'] = $(this).find('label').html();
				form_data['fields'][index]['boxes'] = {};
				$(this).find('.checkbox_element').each(function(index2){
					form_data['fields'][index]['boxes'][index2] = $(this).find('.checkbox_label').html();
				});
			}
			if ($(this).hasClass('dd')){
				form_data['fields'][index]['type'] = 'dd';
				form_data['fields'][index]['content'] = $(this).find('label').html();
				form_data['fields'][index]['items'] = {};
				$(this).find('select').each(function(index2){
					form_data['fields'][index]['items'][index2] = $(this).find('option').html();
				});
			}
			if ($(this).hasClass('rb')){
				form_data['fields'][index]['type'] = 'rb';
				form_data['fields'][index]['content'] = $(this).find('label').html();
				form_data['fields'][index]['buttons'] = {};
				$(this).find('.radio_element').each(function(index2){
					form_data['fields'][index]['buttons'][index2] = $(this).find('.radio_label').html();
				});
			}
		});
		
		var parameters = { 'form_data' : form_data };
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/remove_vendor', 0);
		setTimeout(function(){
			if (rtn){
				$('#update_notification').css('display', 'inline-block');
				setTimeout(function(){
					$('#update_notification').fadeOut(500);
				}, 3000);
			}
		});
	}
	
	console.log(form_data);
}

//THIS HANDLES THE LOADING OF THE DASHBOARD LAYOUT OF MODULES
function dragging(){
	if (window.location.href == "http://" + project_domain + "/pages/form_builder"){
		localStorage.removeItem('dragPositions');
		//Save Dashboard Layout
		// get JSON-friendly data for items positions
		Packery.prototype.getShiftPositions = function( attrName ) {
			attrName = attrName || 'id';
			var _this = this;
			return this.items.map( function( item ) {
				return {
					attr: item.element.getAttribute( attrName ),
		      		x: item.rect.x / _this.packer.width
		    	}
		  	});
		};
		
		Packery.prototype.initShiftLayout = function( positions, attr ) {
			if ( !positions ) {
		    	// if no initial positions, run packery layout
		    	this.layout();
		    	return;
		  	}
		  	// parse string to JSON
		  	if ( typeof positions == 'string' ) {
		    	try {
		      		positions = JSON.parse( positions );
		    	} catch( error ) {
		      		console.error( 'JSON parse error: ' + error );
		      		this.layout();
		      		return;
		    	}
			}
			attr = attr || 'id'; // default to id attribute
		  	this._resetLayout();
		  	// set item order and horizontal position from saved positions
		  	this.items = positions.map( function( itemPosition ) {
		    	var selector = '[' + attr + '="' + itemPosition.attr  + '"]';
		    	var itemElem = this.element.querySelector( selector );
		    	var item = this.getItem( itemElem );
		    	item.rect.x = itemPosition.x * this.packer.width;
		    	return item;
		  	}, this );
		  	this.shiftLayout();
		};
		
		// get saved dragged positions
		//parameters = [];
		//go_ajax2(parameters, 'load_dashboard_layout', 0);
		setTimeout(function(){
			// init layout with saved positions
			var initPositions = localStorage.getItem('dragPositions');
			//var initPositions = rtn['msg'];
			$grid = $('.grid').packery({
				// options
			  	itemSelector: '.grid-item',
			  	columnWidth: 1,
			  	gutter: 10,
			  	percentPosition: true,
			});
			
			$grid.packery( 'initShiftLayout', initPositions, 'data-item-id' );
			
			// make draggable
			$grid.find('.grid-item').each( function( i, itemElem ) {
			  	var draggie = new Draggabilly( itemElem );
			  	$grid.packery( 'bindDraggabillyEvents', draggie );
			});
			
			// save drag positions on event
			$grid.on( 'dragItemPositioned', function() {
			  	// save drag positions
			  	var positions = $grid.packery( 'getShiftPositions', 'data-item-id' );
			  	//var parameters = { 'dashboard_layout' : JSON.stringify( positions ) };
			  	//go_ajax2(parameters, 'save_dashboard_layout', 0);
			  	localStorage.setItem( 'dragPositions', JSON.stringify( positions ) );
			});
		},500);
	}
}