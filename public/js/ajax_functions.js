var rtn;
var grid;

//FOR UPDATING ROLES PERMISSIONS IN ADMIN PANEL
$('.permission').on('click', function(e){
	var context = $(this);
	var box_id = context.attr('id');
	var permission = box_id.substring(0, box_id.indexOf('-'));
	var role = box_id.substring(box_id.indexOf('-')+1);
	if (context.is(':checked')){
		//Attach permission
		var parameters = { 'permission_id' : permission, 'role_id' : role, 'checked' : 1 };
	}
	else { 
		//Detach permission
		var parameters = { 'permission_id' : permission, 'role_id' : role, 'checked' : 0 };
	}
	go_ajax(parameters, 0);
	setTimeout(function(){ 
		if (rtn){
			$('.ajax_success').show();
			setTimeout(function(){ $('.ajax_success').fadeOut(); }, 3000);
		}
	},500);
});

//FOR UPDATING ROLES MODULES PERMISSIONS IN THE ADMIN PANEL
$('.module').on('click', function(e){
	var context = $(this);
	var box_id = context.attr('id');
	var module = box_id.substring(0, box_id.indexOf('-'));
	var role = box_id.substring(box_id.indexOf('-')+1);
	if (context.is(':checked')){
		//Attach module
		var parameters = { 'module_id' : module, 'role_id' : role, 'checked' : 1 };
	}
	else { 
		//Detach permission
		var parameters = { 'module_id' : module, 'role_id' : role, 'checked' : 0 };
	}
	go_ajax(parameters, 0);
	setTimeout(function(){ 
		if (rtn){
			$('.ajax_success').show();
			setTimeout(function(){ $('.ajax_success').fadeOut(); }, 3000);
		}
	},500);
});

//INSTALL DASHBOARD MODULE
$('#install_dmodule').on('click', function(){
	var dialog = new Messi(
	    'Are you sure you want to install this module?',
	    {
	        title: 'Install',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) { 
	        	if (val == 'Y'){
	        		var module_id = $('#select_dmodules option:selected').val();
	        		var module_name = $('#select_dmodules option:selected').html();
	        		var parameters = { 'module_id' : module_id, 'module_name' : module_name};
	        		go_ajax2(parameters, 'install_module', 0);
	        		setTimeout(function(){ 
						if (rtn){
							var dialog = new Messi(
							    'Module was successfully installed',
							    {
							        title: 'Install',
							        titleClass: 'anim info',
							        buttons: [
	            						{id: 0, label: 'Ok', val: 'Y', class: 'btn-info'}
	            					],
							        callback: function() {
							        	window.location.reload();
							        } 
								}
							);
						}	
					},500);
				}
			}
		}
	);
});

//REMOVE DASHBOARD MODULE
$('.remove_module').on('click', function(e){
	var module_id = $(this).attr('id');
	var module_name = $(this).attr('mod-name');
	e.preventDefault();
	var dialog = new Messi(
	    'Are you sure you want to remove this module?',
	    {
	        title: 'Remove Module',
	        titleClass: 'anim info',
	        buttons: [
	            {id: 0, label: 'Yes', val: 'Y', class: 'btn-danger'},
	            {id: 1, label: 'No', val: 'N', class: 'btn-info'}
	        ],
	        callback: function(val) { 
	        	if (val == 'Y'){
					var parameters = { 'module_id' : module_id, 'module_name' : module_name };
					go_ajax2(parameters, 'remove_module', 0);
					setTimeout(function(){ 
						if (rtn){
							var dialog = new Messi(
							    'Module was successfully removed',
							    {
							        title: 'Remove Module',
							        titleClass: 'anim info',
							        buttons: [
										{id: 0, label: 'Ok', val: 'Y', class: 'btn-info'}
									],
							        callback: function() {
							        	window.location.reload();
							        } 
								}
							);
						}	
					},500);
				}
			}
		}
	);
});

//THIS HANDLES THE LOADING OF THE DASHBOARD LAYOUT OF MODULES
if (window.location.href == "http://" + project_domain + "/pages/dashboard"){
	//localStorage.removeItem('dragPositions');
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
	parameters = [];
	go_ajax2(parameters, 'load_dashboard_layout', 0);
	setTimeout(function(){
		// init layout with saved positions
		var initPositions = rtn['msg'];//localStorage.getItem('dragPositions');
		$grid = $('.grid').packery({
			// options
		  	itemSelector: '.grid-item',
		  	columnWidth: 1,
		  	gutter: 20,
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
		  	var parameters = { 'dashboard_layout' : JSON.stringify( positions ) };
		  	go_ajax2(parameters, 'save_dashboard_layout', 0);
		  	//localStorage.setItem( 'dragPositions', JSON.stringify( positions ) );
		});
	},500);
}

//USE THESE FUNCTIONS TO MAKE AJAX CALLS
function go_ajax(parameters, e){
	if(e){
		e.preventDefault();
	}
	var url = $('#url').val();
	$.ajaxSetup({
		headers: {
	  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type : 'POST',
		url : url,
		data : parameters,
		dataType: 'json',
		error:function(data){ 
            rtn = data.responseJSON;
        },
		success : function(data){
			rtn = data;
		}
	});
};

function go_ajax2(parameters, url, e){
	
	if(e){
		e.preventDefault();
	}
	$.ajaxSetup({
		headers: {
	  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type : 'POST',
		url : url,
		data : parameters,
		dataType: 'json',
		error:function(data){ 
            rtn = data.responseJSON;
        },
		success : function(data){
			rtn = data;
		}
	});
};

function go_ajax_file(formData, url, e){
	if(e){
		e.preventDefault();
	}
	$.ajaxSetup({
		headers: {
	  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type : 'POST',
		processData: false,
    	contentType: false,
    	cache: false,
		url : url,
		data : formData,
		enctype: 'multipart/form-data',
		error:function(data){ 
            rtn = data.responseJSON;
        },
		success : function(data){
			rtn = data;
		}
	});
}

function api_request(parameters, url, e){
	if(e){
		e.preventDefault();
	}
	$.ajaxSetup({
		headers: {
	  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type : 'GET',
		url : url,
		data : parameters,
		dataType: 'json',
		error:function(data){ 
            rtn = data.responseJSON;
        },
		success : function(data){
			rtn = data;
		}
	});
};