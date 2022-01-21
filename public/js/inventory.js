var curr_part_id;
var cropperBox;

$(document).ready(function(){
	
	var context;
	
	//show/hide administrate repository panes
	$('#administrate_functions_list .sidebar_function a').on('click', function(){

		$('#administrate_repository .administrate_function_container').each(function(){
			$(this).hide();
		});
		switch($(this).attr('id')){
			case 'organizations_button':
				$('#administrate_repository #organizations').show();
				break;
			case 'kitting_button':
				$('#administrate_repository #kitting').show();
				break;
			case 'types_button':
				$('#administrate_repository #types_tags').show();
				break;
			case 'units_colors_button':
				$('#administrate_repository #units_colors').show();
				break;
			default:
				break;
		}
	});
	
	//Move preview pane with scrolling
	$(window).scroll(function() {
    	if ($(window).scrollTop() > 150){
    		$("#repository_preview_pane").css({
    			"top": ($(window).scrollTop()-0) + "px"
  			});
  		}
  		if ($(window).scrollTop() == 0){
    		$("#repository_preview_pane").css({
    			"top": 150 + "px"
  			});
  		}
	});
	
	//Show the edit part image button on image hover
	$('#part_image_container').on('mouseover', function(){
		if ($('#part_id').html() != ""){
			$('#part_image_modal').show();
		}
	});
	$('#part_image_container').on('mouseout', function(){
		$('#part_image_modal').hide();
	});
	
	//Call to load the full parts list without filters
	if ($('#repository_list').length){
		get_parts_list(0, "", "");
	}
	
	//Call to load the parts list as filters are changed
	$("[name='filter'], [name='sort'], [name='search_repo']").on('change', function(){
		var filter = $("[name='filter']").find('option:selected').val();
		var sort = $("[name='sort']").find('option:selected').val();
		var search = $("[name='search_repo']").val();
		get_parts_list(filter, sort, search);
	});
	
	//AJAX call to get parts list based on parameters
	function get_parts_list(filter, sort_by, search){
		$('#repository_list').html("<div id='loader'><img src='http://" + public_domain + "/images/loading.gif' alt='' /></div>");
		//Get repository list
		var parameters = {'filter' : filter, 'sort_by' : sort_by, 'search' : search};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/parts_list', 0);
		setTimeout(function(){
			if (rtn){
				$('#repository_list').html(rtn);
				
				//Parts List Pagination
				//$('#repository_list table').paginate({ limit: 50 });
				$('#repository_list table').DataTable({
					"searching": false,
					"pageLength": 50,
					"dom": '<"top"lp<"clear">>rt<"bottom"iflp<"clear">>'
				});
				$('.dataTables_length').addClass('bs-select');
			}
		},1000);
	}
	
	//Print Barcode Function
	$(document).on('click', '#barcode_print_button', function(e){
		var barcode = $('#part_barcode').html();
		newwin=window.open('','printwin','left=0,top=0,width=300,height=200');
		newwin.document.write('<HTML>\n<HEAD>\n');
		newwin.document.write('<TITLE>Print Page</TITLE>\n');
		newwin.document.write('<script>\n');
		newwin.document.write('function chkstate(){\n');
		newwin.document.write('if(document.readyState=="complete"){\n');
		newwin.document.write('window.close()\n');
		newwin.document.write('}\n');
		newwin.document.write('else{\n');
		newwin.document.write('setTimeout("chkstate()",2000)\n');
		newwin.document.write('}\n');
		newwin.document.write('}\n');
		newwin.document.write('function print_win(){\n');
		newwin.document.write('window.print();\n');
		newwin.document.write('chkstate();\n');
		newwin.document.write('}\n');
		newwin.document.write('<\/script>\n');
		newwin.document.write('<style>\n');
		newwin.document.write('img{ height: 100px; }\n');
		newwin.document.write('<\/style>\n');
		newwin.document.write('</HEAD>\n');
		newwin.document.write('<BODY onload="print_win()">\n');
		newwin.document.write(barcode);
		newwin.document.write('</BODY>\n');
		newwin.document.write('</HTML>\n');
		newwin.document.close();
	});
	
	//CLICK SKU BRINGS UP PART IN PART PREVIEW PANE
	$(document).on('click', '.sku_btn', function(e){
		e.preventDefault();
		var sku = $(this).attr('id');
		var parameters = {'sku' : sku};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/get_part', 0);
		setTimeout(function(){
			if (rtn){
				if (typeof cropperBox != "undefined") {
					cropperBox.destroy();
				}
				var part = rtn['part'];
				var tags = rtn['tags'];
				var vendors = rtn['vendors'];
				$('#part_number').html(part[0]['part_no']);
				$('#part_sku').html(part[0]['sku']);
				$('#part_id').html(part[0]['id']);
				curr_part_id = part[0]['id'];
				$('#part_manufacturer').html(part[0]['internal_nickname'] + " (" + part[0]['company_name'] + ")");
				$('#part_description').html(part[0]['description']);
				$('#part_type').html(part[0]['type']);
				$('#part_pricing_unit').html(capitalizeFirstLetter(part[0]['pricing_unit']));
				$('#part_pricing_alternate_display').html(capitalizeFirstLetter(part[0]['alternate_pricing']));
				$('#part_stocking_unit').html(capitalizeFirstLetter(part[0]['stocking_unit']));
				$('#part_stocking_alternate_display').html(capitalizeFirstLetter(part[0]['alternate_stocking']));
				$('#edit_part_button').attr('href', 'http://' + public_domain + '/index.php/pages/repository/manage/edit_part/' + part[0]['id']);
				
				if(part[0]['image'] != null && part[0]['image'] != ""){
					
					$('#part_image').attr('src', 'http://' + public_domain + '/storage/allorgs/repository/' + part[0]['image']);
				}
				else{
					$('#part_image').attr('src', 'http://' + public_domain + '/images/materials.png');
				}
				if(part[0]['barcode_image'] != null && part[0]['barcode_image'] != ""){
					$('#part_barcode_image').attr('src', 'http://' + public_domain + '/storage/allorgs/part_barcodes/' + part[0]['barcode_image']);
				}
				else{
					$('#part_barcode_image').attr('src', 'http://' + public_domain + '/images/barcode_placeholder.png');
				}
				if(part[0]['color'] != null && part[0]['color'] != ""){
					$('#part_color').html("<div class='part_color_cube' style='background-color: " + part[0]['color_code'] + "'></div>");
				}
				else{
					$('#part_color').html("N/A");
				}
				if(part[0]['length'] != null && part[0]['length'] != ""){
					$('#part_length').html(part[0]['length'] + " " + part[0]['length_unit']);
				}
				else{
					$('#part_length').html("N/A");
				}
				if(part[0]['width'] != null && part[0]['width'] != ""){
					$('#part_width').html(part[0]['width'] + " " + part[0]['width_unit']);
				}
				else{
					$('#part_width').html("N/A");
				}
				if(part[0]['height'] != null && part[0]['height'] != ""){
					$('#part_height').html(part[0]['height'] + " " + part[0]['height_unit']);
				}
				else{
					$('#part_height').html("N/A");
				}
				if(part[0]['weight'] != null && part[0]['weight'] != ""){
					$('#part_weight').html(part[0]['weight']);
				}
				else{
					$('#part_weight').html("N/A");
				}
				if(part[0]['volts'] != null && part[0]['volts'] != ""){
					$('#part_volts').html(part[0]['volts']);
				}
				else{
					$('#part_volts').html("N/A");
				}
				if(part[0]['amps'] != null && part[0]['amps'] != ""){
					$('#part_amps').html(part[0]['amps']);
				}
				else{
					$('#part_amps').html("N/A");
				}
				if(part[0]['watts'] != null && part[0]['watts'] != ""){
					$('#part_watts').html(part[0]['watts']);
				}
				else{
					$('#part_watts').html("N/A");
				}
				if(part[0]['location'] != null && part[0]['location'] != ""){
					$('#part_location').html(part[0]['location']);
				}
				else{
					$('#part_location').html("N/A");
				}
				if ($('#inventory_index').length){
					if(part[0]['stock'] != null && part[0]['stock'] != ""){
						$('#part_stock').html(part[0]['stock'] + " " + part[0]['stocking_unit']);
					}
					else{
						$('#part_stock').html("N/A");
					}
				}
				$('#part_tags_container').html("");
				for(var i = 0; i < tags.length; i++){
					p = part[0]['tags'];
					color = "";
					Object.keys(p).forEach(function(key) {
						if (key == tags[i]['id']){
							color = "selected";
						}
					});
					if ($('#inventory_index').length  == 0){
						$('#part_tags_container').append("<div class='repo_tag " + color + "' id='" + tags[i]['id'] + "' style='margin-right: 3px;'><a class='repo_tag_a' href='#'>" + tags[i]['tag'] + "</a></div>");
					}
					else{
						if (color == "selected"){
							$('#part_tags_container').append("<div class='repo_tag selected' id='" + tags[i]['id'] + "' style='margin-right: 3px;'><a class='repo_tag_a' href='#'>" + tags[i]['tag'] + "</a></div>");
						}
					}
				}
				$('#vendors_table').html("");
				for(var i = 0; i < vendors.length; i++){
					$('#vendors_table').append("<tr id='" + vendors[i]['id'] + "'><td class='vendor_name'>" + vendors[i]['company_name'] + "</td><td class='vendor_price'>$ " + vendors[i]['vendor_price'] + " " + part[0]['alternate_pricing'] + "</td></tr>");
					if ($('#inventory_index').length == 0){
						$('#vendors_table #' + vendors[i]['id']).append("<td><a href='' class='delete_icon delete_vendor_from_part'><img src='http://" + public_domain + "/images/delete.png'/></a></td>");
					}
				}
				
				if ($('#inventory_index').length == 0){
					//Attach image cropper to image cropping div
					var eyeCandy = $('#cropContainerEyecandy');
		
					var croppedOptions = {
						modal:true,
						loaderHtml:'<img class="loader" src="http://' + public_domain + '/images/loading2.gif" >',
				        uploadUrl: 'http://' + project_domain + '/pages/repository/manage/upload_part_image',
				        cropUrl: 'http://' + project_domain + '/pages/repository/manage/crop_part_image',
				        cropData:{
				            'width' : eyeCandy.width(),
				            'height': eyeCandy.height(),
				            "part_id": curr_part_id
				        },
				        onAfterImgCrop:	function(){ 
				        	var base = 'http://' + public_domain + '/storage/allorgs/repository/';
				        	var cropped_image = /[^/]*$/.exec($('#cropContainerEyecandy .croppedImg').attr('src'))[0];
				        	$('#repository_list #part' + curr_part_id + ' .repository_thumbnail').attr('src', base + cropped_image);
				        	$('#part_image').attr('src', base + cropped_image);
				        	$('#cropContainerEyecandy .cropControlRemoveCroppedImage').trigger('click');
				        	cropperBox.reset();
				        }
				    };
				    cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);
				  }
				if ($('#inventory_index').length == 0){
					$('#edit_part_button').show();
					$('#add_vendor_button').show();
					$('#barcode_print_button').show();
				}
				else{
					$('#update_stock_button').show();
				}
				$('#document_list').html("No Documents");
				load_part_documentation(curr_part_id);
				
			}
		},500);
		return false;
	});
	
	//Upload Documents for Part
	$('#document_upload').on('click', function(e){
		e.preventDefault();
		if ($('#part_number').html() != ""){
			var part_id = $('#repository_preview_pane #part_id').html();
			var fd = new FormData($("#fileinfo")[0]);
			fd.append("part_id", part_id);
	        go_ajax_file(fd, 'http://' + project_domain + '/pages/repository/upload_document', 0);
			setTimeout(function(){
				if (rtn){}
			},500);
			setTimeout(function(){
				load_part_documentation(part_id);
			},2000);
		}
	});
	

	//Remove Vendor For Part
	$(document).on('click', '.delete_vendor_from_part', function(e){
		e.preventDefault();
		var vendor_id = $(this).parent().parent().attr('id');
		var part_id = $('#part_id').html();
		var parameters = {'vendor_id' : vendor_id, 'part_id' : part_id};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/remove_vendor', 0);
		setTimeout(function(){
			if (rtn){
				var dialog_phrase = "Vendor has been removed";
				var dialog = new Messi(
				    dialog_phrase,
				    {
				        title: 'Remove Vendor',
				        titleClass: 'anim success',
				        buttons: [
				            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
				        ],
				        callback: function(val) {
				        	if (val == 'O'){
								$('#vendors_table #' + vendor_id).remove();
							}
						}
				    }
				);
			}
		},500);
		return false;
	});
	
	//Enable Tags for Part
	$(document).on('click', '#part_tags_container .repo_tag_a', function(){
		
		if ($('#inventory_index').length == 0){
			var on_tags = {};
			var context = $(this);
			var part_id = $('#part_id').html();
			
			if (context.parent().hasClass('selected')){
				context.parent().removeClass('selected');
				context.css('background-color', '#777777');
			}
			else{
				context.parent().addClass('selected');
				context.css('background-color', '#0F75BC');
			}
			
			$('#part_tags_container .repo_tag').each(function(){
				if ($(this).hasClass('selected')){
					var this_id = $(this).attr('id');
					var this_tagname = $(this).find('.repo_tag_a').html();
					//console.log(this_id + " " + this_tagname);
					on_tags[this_id] = this_tagname;
				}
			});
			
			//Hide the tags area and show a loader
			var tags_area_height = $('#part_tags_container').height();
			$('#part_tags_container').hide();
			$('#loader_frame').height(tags_area_height);
			$('#loader_frame').show();
			
			var parameters = {'part_id' : part_id, 'selected_tags' : on_tags};
			go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/update_tags', 0);
			setTimeout(function(){
				if (rtn){
					$('#loader_frame').hide();
					$('#part_tags_container').show();
				}
			},500);
		}
	});
	
	//Add Supplier Button
	$('#add_vendor_button').on('click', function(){
		var vendor_id = $('#vendor_select option:selected').val();
		var vendor_name = $('#vendor_select option:selected').text();
		var vendor_price = $('#vendor_price').val();
		var part_id = $('#part_id').html();
		var part_alternate_display = $('#part_alternate_display').html();
		if ( vendor_id != 0 ){
			if ( vendor_price != "" ){
				if ( validateDecimal(vendor_price) ){
					var parameters = {'vendor_id' : vendor_id, 'part_id' : part_id, 'vendor_price' : vendor_price};
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/add_vendor', 0);
					setTimeout(function(){
						if (rtn){
							if (rtn == 1){
								var dialog_phrase = "Vendor has been added.";
								$('#vendors_table').append("<tr id='" + vendor_id + "'><td class='vendor_name'>" + vendor_name + "</td><td class='vendor_price'>$ " + parseFloat(vendor_price).toFixed(2) + " " + part_alternate_display + "</td>");
							}
							if (rtn == 2){
								var dialog_phrase = "Vendor exists. Pricing has been updated";
								$('#vendors_table').find('#' + vendor_id).find('.vendor_price').html("$" + parseFloat(vendor_price).toFixed(2) + " " + part_alternate_display);
							}
							var dialog = new Messi(
							    dialog_phrase,
							    {
							        title: 'Add Vendor',
							        titleClass: 'anim success',
							        buttons: [
							            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
							        ]
							    }
							);
						}
					},500);
				}
				else{
					var dialog = new Messi(
					    'Vendor price must be a decimal or integer.',
					    {
					        title: 'Vendor Price',
					        titleClass: 'anim alert',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-alert'}
					        ]
					    }
					);
				} 
			}
			else{
				var dialog = new Messi(
				    'Please enter a vendor price.',
				    {
				        title: 'Vendor Price',
				        titleClass: 'anim alert',
				        buttons: [
				            {id: 1, label: 'Ok', val: 'O', class: 'btn-alert'}
				        ]
				    }
				);
			}
		}
		else{
			var dialog = new Messi(
			    'Please select a Vendor.',
			    {
			        title: 'Vendor',
			        titleClass: 'anim alert',
			        buttons: [
			            {id: 1, label: 'Ok', val: 'O', class: 'btn-alert'}
			        ]
			    }
			);
		}
	});

	//Add Supplier Button
	$('#update_stock_button').on('click', function(e){
		e.preventDefault();
		var part_id = $('#part_id').html();
		var new_stock = $('#update_stock').val();
		if (validateWholeNumber(new_stock)){
			var parameters = {'part_id' : part_id, 'new_stock' : new_stock};
			go_ajax2(parameters, 'http://' + project_domain + '/pages/inventory/manage/update_stock', 0);
			setTimeout(function(){
				if (rtn == 1){
					var dialog = new Messi(
					    "Stock has been updated",
					    {
					        title: 'Update Stock',
					        titleClass: 'anim success',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
					        ]
					    }
					);
					$('#part_stock').html(new_stock + " " + $('#part_pricing_unit').html());
					$('#update_stock').val("");
				}
				if (rtn == 0){
					var dialog = new Messi(
					    "Stock was not changed",
					    {
					        title: 'Update Stock',
					        titleClass: 'anim info',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-info'}
					        ]
					    }
					);
					$('#update_stock').val("");
				}
				
			},500);
		}
		else{
			var dialog = new Messi(
			    'Stock must be a whole number.',
			    {
			        title: 'Update Stock',
			        titleClass: 'anim alert',
			        buttons: [
			            {id: 1, label: 'Ok', val: 'O', class: 'btn-alert'}
			        ]
			    }
			);
		}
		return false;
	});
	
	//Do not allow the custom input of sku when creating a new part
	$('#sku').keyup(function() {
		$('#sku').val("");
	});
	
	//GENERATE SKU
	$('#generate_sku').on ('click', function(){
		var type = $('[name = "parent_type"]').val();
		var sku_text = $('#sku');
		var parameters = {'type' : type};
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/manage/generate_sku', 0);
		setTimeout(function(){ 
			if (rtn){
				sku_text.val(rtn);
				$("input[id='barcode_image_text']").val(rtn + ".png");
				$('#barcode_image_container').html("<img class='barcode_image' src='http://" + public_domain + "/storage/allorgs/temp_barcodes/" + rtn + ".png'  alt='' />");
			}
		},500);
	});
	
	$('#submit_new_part_form, #submit_edit_part_form').on('click', function(e){
		$('#manufacturer_error').html("");
		$('#part_type_error').html("");
		$('#length_error').html("");
		$('#width_error').html("");
		$('#height_error').html("");
		var flag = 1;
		if($("[name='manufacturer'] option:selected").val() == "0"){
			$('#manufacturer_error').html('Please select a manufacturer');
			flag = 0;
		}
		if($("[name='parent_type'] option:selected").val() == "0"){
			$('#part_type_error').html('Please select a part type');
			flag = 0;
		}
		if ($('#length').val() != ""){
			if($("[name='length_unit'] option:selected").val() == "0"){
				$('#length_error').html('Please select a length unit');
				flag = 0;
			}
			if (!$.isNumeric($('#length').val())) {
				$('#length_error').html('Please enter a valid whole or decimal number');
			    flag = 0;
			}
		}
		if ($('#width').val() != ""){
			if($("[name='width_unit'] option:selected").val() == "0"){
				$('#width_error').html('Please select a width unit');
				flag = 0;
			}
			if (!$.isNumeric($('#width').val())) {
				$('#width_error').html('Please enter a valid whole or decimal number');
			    flag = 0;
			}
		}
		if ($('#height').val() != ""){
			if($("[name='height_unit'] option:selected").val() == "0"){
				$('#height_error').html('Please select a height unit');
				flag = 0;
			}
			if (!$.isNumeric($('#height').val())) {
				$('#height_error').html('Please enter a valid whole or decimal number');
			    flag = 0;
			}
		}
		if($("[name='pricing_unit'] option:selected").val() == "0"){
			$('#unit_error').html('Please select a pricing unit');
			flag = 0;
		}
		if($("[name='stocking_unit'] option:selected").val() == "0"){
			$('#unit_error').html('Please select a stocking unit');
			flag = 0;
		}
		if (flag == 0){
			e.preventDefault();
			return false;
		}
	});
	
	//Show Loading during parts import
	$('#import_file_list').on('click', function(){
		$(this).hide();
		$('#import_parts_headings .crm_btn2').hide();
		$('#part_import_loading_bar').show();
	});
	
	//CREATE NEW UNIT FORM
	$('#new_unit_submit').on('click', function(e){
		
		$('#new_unit_name_error').html("");
		$('#new_unit_alt_error').html("");
		$('#new_unit_mark_error').html("");
		
		var go_flag = 1;
		
		if(!$.trim($('#create_unit_form #unit').val()).length){
			go_flag = 0;
			$('#new_unit_name_error').html("Please enter a name for the new unit");
		}
		if(!$.trim($('#create_unit_form #alternate_display').val()).length){
			go_flag = 0;
			$('#new_unit_alt_error').html("Please enter a display name for the new unit");
		}
		if(!$.trim($('#create_unit_form #unit_mark').val()).length){
			go_flag = 0;
			$('#new_unit_mark_error').html("Please enter a mark for the new unit");
		}
		if(go_flag == 1){
			var unit = $('#create_unit_form #unit').val();
			var alt = $('#create_unit_form #alternate_display').val();
			var mark = $('#create_unit_form #unit_mark').val();
			
			var parameters = { 'unit' : unit, 'alternate_display' : alt, 'unit_mark' : mark };
			
			go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/create_unit', 0);
			setTimeout(function(){ 
				if (rtn[0]){
					var dialog = new Messi(
					    'New unit has been created.',
					    {
					        title: 'New Unit',
					        titleClass: 'anim success',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
					        ],
					        callback: function(val) {
					        	if (val == 'O'){
					        		var to_append = "<tr>";
					        		to_append += "<td>" + unit + "</td>";
					        		to_append += "<td>" + alt + "</td>";
					        		to_append += "<td>" + mark + "</td>";
					        		to_append += "<td><span id='delete" + rtn[1] + "'>";
					        		to_append += "<img class='action_icon delete_icon delete_unit' alt='' src='http://" + public_domain + "/images/delete.png'/>";
					        		to_append += "</span></td></tr>";
									$('#units tbody').append(to_append);
									$('#unit').val("");
									$('#alternate_display').val("");
									$('#unit_mark').val("");
								}
							}
						}
					);
				}
			},500);
		}
	});
	
	//DELETE UNIT
	$(document).on('click', '#units .delete_unit', function(e){
		
		var context = $(this).parent();
		var unit_id = context.attr('id').substring(6);
	
		var parameters = { 'unit_id' : unit_id };
					
		var dialog = new Messi(
	    'Are you sure you want to delete this unit? Parts of this unit will continue to be of this unit until changed.',
	    {
	        title: 'Delete Unit',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) {
	        	if (val == 'Y'){
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/delete_unit', 0);
					setTimeout(function(){ 
						if (rtn){
							context.parent().parent().remove();
						}
					},500);
				}
			}
		});
	});
	
	//CREATE NEW COLOR FORM
	$('#new_color_submit').on('click', function(e){
		
		$('#new_color_name_error').html("");
		$('#new_color_code_error').html("");
		
		var go_flag = 1;
		
		if(!$.trim($('#create_color_form #color').val()).length){
			go_flag = 0;
			$('#new_color_name_error').html("Please enter a name for the new color");
		}
		if(!$.trim($('#create_color_form #color_code').val()).length){
			go_flag = 0;
			$('#new_color_code_error').html("Please select a color using the color picker");
		}
		if(go_flag == 1){
			var color_name = $('#create_color_form #color').val();
			var color_code = $('#create_color_form #color_code').val();
			
			var parameters = { 'color_name' : color_name, 'color_code' : color_code };
			
			go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/create_color', 0);
			setTimeout(function(){ 
				if (rtn[0]){
					var dialog = new Messi(
					    'New color has been created.',
					    {
					        title: 'New Color',
					        titleClass: 'anim success',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
					        ],
					        callback: function(val) {
					        	if (val == 'O'){
									var to_append = "<tr>";
					        		to_append += "<td>" + color_name + "</td>";
					        		to_append += "<td><span class='color_box' style='background-color:" + color_code + "'</span></td>";
					        		to_append += "<td><span id='delete" + rtn[1] + "'>";
					        		to_append += "<img class='action_icon delete_icon delete_color' alt='' src='http://" + public_domain + "/images/delete.png'/>";
					        		to_append += "</span></td></tr>";
									$('#colors tbody').append(to_append);
									$('#color').val("");
									$('#color_code').val("");
									$('#create_color_form .pcr-button').css('background', 'rgba(255, 255, 255, 1)');
								}
							}
						}
					);
				}
			},500);
		}
	});
	
	//DELETE COLOR FORM
	$(document).on('click', '#colors .delete_color', function(e){
		
		var context = $(this).parent();
		var color_id = context.attr('id').substring(6);
	
		var parameters = { 'color_id' : color_id };
					
		var dialog = new Messi(
	    'Are you sure you want to delete this color? Parts of this color will continue to be of this color until changed.',
	    {
	        title: 'Delete Color',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) {
	        	if (val == 'Y'){
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/delete_color', 0);
					setTimeout(function(){ 
						if (rtn){
							context.parent().parent().remove();
						}
					},500);
				}
			}
		});
	});
	
	//Attach the color picker to the Color picker
	if ($('.color_pickr').length){
		const pickr = new Pickr({
		    // Selector or element which will be replaced with the actual color-picker.
		    // Can be a HTMLElement.
		    el: '.color_pickr',
		    // Using the 'el' Element as button, won't replace it with the pickr-button.
		    // If true, appendToBody will also be automatically true.
		    useAsButton: false,
		    // Start state. If true 'disabled' will be added to the button's classlist.
		    disabled: false,
		    // If set to false it would directly apply the selected color on the button and preview.
		    comparison: true,
		    // Default color
		    default: 'fff',
		    // Default color representation.
		    // Valid options are `HEX`, `RGBA`, `HSVA`, `HSLA` and `CMYK`.
		    defaultRepresentation: 'HEX',
		    // Option to keep the color picker always visible. You can still hide / show it via
		    // 'pickr.hide()' and 'pickr.show()'. The save button keeps his functionality, so if
		    // you click it, it will fire the onSave event.
		    showAlways: false,
		    // Close pickr with this specific key.
		    // Default is 'Escape'. Can be the event key or code.
		    closeWithKey: 'Escape',
		    // Defines the position of the color-picker. Available options are
		    // top, left and middle relativ to the picker button.
		    // If clipping occurs, the color picker will automatically choose his position.
		    position: 'middle',
		    // Enables the ability to change numbers in an input field with the scroll-wheel.
		    // To use it set the cursor on a position where a number is and scroll, use ctrl to make steps of five
		    adjustableNumbers: false,
		    // Show or hide specific components.
		    // By default only the palette (and the save button) is visible.
		    components: {
		        preview: true, // Left side color comparison
		        opacity: false, // Opacity slider
		        hue: true,     // Hue slider
		        // Bottom interaction bar, theoretically you could use 'true' as propery.
		        // But this would also hide the save-button.
		        interaction: {
		            hex: true,  // hex option  (hexadecimal representation of the rgba value)
		            rgba: false, // rgba option (red green blue and alpha)
		            hsla: false, // hsla option (hue saturation lightness and alpha)
		            hsva: false, // hsva option (hue saturation value and alpha)
		            cmyk: false, // cmyk option (cyan mangenta yellow key )
		            input: true, // input / output element
		            clear: false, // Button which provides the ability to select no color,
		            save: true   // Save button
		        },
		    },
		
		    // Button strings, brings the possibility to use a language other than English.
		    strings: {
		       save: 'Save',  // Default for save button
		       clear: 'Clear' // Default for clear button
		    }
		});
		
		//Save color chosen to hidden color text field
		pickr.on('save', function(args){
			var hex_array = args.toHEX();
			var hex_value = "#" + hex_array[0] + hex_array[1] + hex_array[2];
			$('#color_code').val(hex_value);
		});
	}
	
	//CHECK OR UNCHECK THE FILTER OPTION ON REPOSITORY/INVENTORY TYPES
	$('.repository_type_filter_checkbox').on('click', function(e){
		var context = $(this);
		var box_id = context.attr('id');
		
		if (context.is(':checked')){
			//Attach permission
			var parameters = { 'type_id' : box_id, 'checked' : 1 };
		}
		else { 
			//Detach permission
			var parameters = { 'type_id' : box_id, 'checked' : 0 };
		}
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/update_type_filter', 0);
		setTimeout(function(){ 
			if (rtn){
				$('#modal_dialog_update_background').show();
				$('#modal_dialog_content').html('<p>Type Filter has been udpated!</p>');
				$('#modal_dialog_update_box').show();
			}
		},500);
	});
	
	//CREATE NEW TYPE FORM
	$('#new_type_submit').on('click', function(e){
		
		if(!$.trim($('#create_type_form #type').val()).length){
			$('#new_type_error').html("Please enter a name for the new type");
		}
		else{
			var type = $('#create_type_form #type').val();
			
			var is_filter = ($('#create_type_form #filter').is(':checked') ? 1 : 0);
			var parameters = { 'type_type' : type, 'is_filter' : is_filter };
			
			go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/create_type', 0);
			setTimeout(function(){ 
				if (rtn[0]){
					var dialog = new Messi(
					    'New type has been created.',
					    {
					        title: 'New Type',
					        titleClass: 'anim success',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
					        ],
					        callback: function(val) {
					        	if (val == 'O'){
					        		var to_append = "<div class='col-md-6 type_container'>";
					        		to_append += "<span class='type_name'>" + rtn[1] + "</span>";
					        		to_append += "<span>Filter: </span>";
					        		to_append += "<input name='checkbox" + rtn[2] + "' class='form-control repository_type_filter_checkbox crm_checkbox' id='" + rtn[2] + "' type='checkbox'";
					        		if (rtn[3] == "1"){
					        			to_append += " checked='checked' ";
					        		}
					        		to_append += " value='" + rtn[2] + "'>";
					        		to_append += "<span id='delete" + rtn[2] + "'><img class='action_icon delete_icon' alt='' src='http://" + public_domain + "/images/delete.png'></span>";
					        		to_append += "</div>";
									$('#types').append(to_append);
									$('#type').val("");
									$('#filter').prop('checked', false);
								}
							}
						}
					);
				}
			},500);
		}
	});
	
	//DELETE TYPE (HIDE TYPE)
	$(document).on('click', '#types .delete_icon', function(e){
		
		var context = $(this).parent();
		var type_id = context.attr('id').substring(6);
	
		var parameters = { 'type_id' : type_id };
					
		var dialog = new Messi(
	    'Are you sure you want to delete this type? Parts of this type will continue to be of this type until changed.',
	    {
	        title: 'Delete Type',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) {
	        	if (val == 'Y'){
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/delete_type', 0);
					setTimeout(function(){ 
						if (rtn){
							context.parent().remove();
						}
					},500);
				}
			}
		});
	});
	
	//CREATE NEW TAG FORM
	$('#new_tag_submit').on('click', function(e){
		
		if(!$.trim($('#create_tag_form #tag').val()).length){
			$('#new_tag_error').html("Please enter a name for the new tag");
		}
		else{
			var tag = $('#create_tag_form #tag').val();
			
			var parameters = { 'tag' : tag };
			
			go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/create_tag', 0);
			setTimeout(function(){ 
				if (rtn[0]){
					var dialog = new Messi(
					    'New tag has been created.',
					    {
					        title: 'New Tag',
					        titleClass: 'anim success',
					        buttons: [
					            {id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
					        ],
					        callback: function(val) {
					        	if (val == 'O'){
									var to_append = "<div class='repo_tag draggable' id='" + rtn[1] + "' style='position: relative; touch-action: none;'>";
									to_append += "<a class='repo_tag_a' href='#'>" + rtn[2] + "</a></div>";
									$('#tags .tags_container').append(to_append);
									const draggableElems = document.querySelectorAll('.draggable');
									const targets = document.querySelectorAll('.target');
									for (var i = 0, l = draggableElems.length; i < l; i++) {
										const a = new Draggie(draggableElems[i], targets);
										a.init();
									}
								}
							}
						}
					);
				}
			},500);
		}
	});
	
	//CLICK TAG
	$(document).on('click', '#tags .repo_tag_a', function(e){
		
		e.preventDefault();
		
		var context = $(this);
		var has_selected = 0;
		
		if (context.parent().hasClass('selected')){
			context.parent().removeClass('selected');
			context.css('background-color', '#777777');
		}
		else{
			context.parent().addClass('selected');
			context.css('background-color', '#0F75BC');
			$('#tags .delete_selected_tags').show();
		}
		
		$('.repo_tag').each(function(){
			if ($(this).hasClass('selected')){
				$('#tags #delete_selected_tags').show();
				has_selected = 1;
			}
		});
		if (has_selected == 0){
			$('#tags #delete_selected_tags').hide();
		}
		
		$('.tagtype_container').each(function(){
			var has_selected2 = 0;
			var context2 = $(this);
			context2.find('.repo_tag').each(function(){
				if ($(this).hasClass('selected')){
					context2.find('.remove_tag_from_type').show();
					has_selected2 = 1;
				}
			});
			if (has_selected2 == 0){
				context2.find('.remove_tag_from_type').hide();
			}
		});
		
		return false;
	});
	
	//MOVE TAG
	$(document).on('click', '#move_tag', function(e){
		var context = $(this).parent().parent().parent();
		var moving = context.attr('id');
		var from = context.attr('from');
		var to = context.attr('to');
		var parameters = { 'tag_id' : moving, 'from_type' : from, 'to_type' : to };
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/move_tag', 0);
		setTimeout(function(){ 
			if (rtn[0]){
				var tag_name = $('#tags #' + rtn[1] + ' .repo_tag_a').html();
				var to_append = "<div class='repo_tag draggable' id='" + rtn[1] + "' style='position: relative; touch-action: none;'>";
				to_append += "<a class='repo_tag_a' href='#'>" + tag_name + "</a></div>";
				$('#tags #type' + from + ' #' + rtn[1]).remove();
				$('#tags .tagtype_container .selected').hide();
				$('#tags #delete_selected_tags').hide();
				$('#tags #action_menu').remove();
				$('#tags .target').each(function(){
					$(this).removeClass('hovering');
				});
				$(to_append).insertBefore('#tags #type' + to + ' .target');
				$('#tags #type' + from + ' .remove_tag_from_type').hide();
				const draggableElems = document.querySelectorAll('.draggable');
				const targets = document.querySelectorAll('.target');
				for (var i = 0, l = draggableElems.length; i < l; i++) {
					const a = new Draggie(draggableElems[i], targets);
					a.init();
				}
			}
		},500);
	});
	
	//COPY TAG
	$(document).on('click', '#copy_tag', function(e){
		var context = $(this).parent().parent().parent();
		var moving = context.attr('id');
		var from = context.attr('from');
		var to = context.attr('to');
		var parameters = { 'tag_id' : moving, 'from_type' : from, 'to_type' : to };
		go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/copy_tag', 0);
		setTimeout(function(){ 
			if (rtn[0]){
				var tag_name = $('#tags #' + rtn[1] + ' .repo_tag_a').html();
				var to_append = "<div class='repo_tag draggable' id='" + rtn[1] + "' style='position: relative; touch-action: none;'>";
				to_append += "<a class='repo_tag_a' href='#'>" + tag_name + "</a></div>";
				$('#tags #type' + from + ' #' + rtn[1]).removeClass('selected');
				$('#tags .tagtype_container .selected').hide();
				$('#tags #delete_selected_tags').hide();
				$('#tags #action_menu').remove();
				$('#tags .target').each(function(){
					$(this).removeClass('hovering');
				});
				$(to_append).insertBefore('#tags #type' + to + ' .target');
				$('#tags #type' + from + ' .remove_tag_from_type').hide();
				const draggableElems = document.querySelectorAll('.draggable');
				const targets = document.querySelectorAll('.target');
				for (var i = 0, l = draggableElems.length; i < l; i++) {
					const a = new Draggie(draggableElems[i], targets);
					a.init();
					a._resetElementPosition();
				}
			}
		},500);
	});
	
	//REMOVE TAGS FROM TYPE
	$('.remove_tag_from_type').on('click', function(e){
		
		e.preventDefault();
		var context = $(this);
		var type = context.parent().find('.target').attr('id');
		var tag_ids = [];
		context.parent().children('.repo_tag').each(function(){
			if ($(this).hasClass('selected')){
				tag_ids.push($(this).attr('id'));
			}
		});
		var parameters = { 'type_id' : type, 'tags' : tag_ids };
		var dialog = new Messi(
	    'Are you sure you want to remove selected tags from this type? Any unused tags will appear in the Tag Bank.',
	    {
	        title: 'Remove Tags',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) {
	        	if (val == 'Y'){
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/remove_tags', 0);
					setTimeout(function(){ 
						if (rtn){
							for (var i = 0; i < tag_ids.length; i++){
								$('#tags #type' + type + ' #' + tag_ids[i]).remove();
								$('#tags #delete_selected_tags').hide();
								$('#tags #type' + type + ' .remove_tag_from_type').hide();
							}
						}
					},500);
				}
			}
		});
		
		return false;
	});
	
	//DELETE SELECTED TAGS
	$('#delete_selected_tags').on('click', function(e){
		
		e.preventDefault();
		
		var tag_ids = [];
		$('#tags').find('.repo_tag').each(function(){
			if ($(this).hasClass('selected')){
				tag_ids.push($(this).attr('id'));
			}
		});
		var parameters = { 'tags' : tag_ids };
		var dialog = new Messi(
	    'Are you sure you want to delete all selected tags? They will be removed from all repository types, as well as from all repository and inventory parts.',
	    {
	        title: 'Delete Tags',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) {
	        	if (val == 'Y'){
					go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/administrate/delete_tags', 0);
					setTimeout(function(){ 
						if (rtn){
							var url = 'http://' + project_domain + '/pages/repository/administrate?area=menu_item&item=3';
							window.location.href = url;
						}
					},500);
				}
			}
		});
		return false;
	});
});
function load_part_documentation(part_id){
	var parameters = { 'part_id' : part_id };
	go_ajax2(parameters, 'http://' + project_domain + '/pages/repository/get_documents', 0);
	setTimeout(function(){
		if (rtn){
			if (rtn.length){
				$('#document_list').html("");
			}
			for (var i = 0; i < rtn.length; i++){
				$('#document_list').append("<a href='http://" + public_domain + "/storage/allorgs/part_documents/" + part_id + "_" + rtn[i] + "' target='_blank'>" + rtn[i] + "</a><br />");
			}
		}
	},500);
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function validateDecimal(value){
	var RE = /^\d*\.?\d*$/;
    if(RE.test(value)){
    	return true;
    }else{
        return false;
    }
}
function validateWholeNumber(value){
	var RE = /^\d+$/;
	if (RE.test(value)){
		return true;
	}else{
		return false;
	}
}
