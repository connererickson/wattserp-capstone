(function() {

  	// Our element ids.
  	var options = {
    	video: '#video',
    	canvas: '#canvas',
    	clockInBtn: '#clock_in',
    	clockOutBtn: '#clock_out',
    	statusBtn: '#status',
		downloadBtn: '#download',
    	imageURLInput: '#image-url-input'
  	};
  
	var constraints = window.constraints = {
	  audio: false,
	  video: true
	};
	
  	// Our object that will hold all of the functions.
  	var App = {
  		
  		video: document.querySelector(options.video),
  		canvas: document.querySelector(options.canvas),
    	ctx: canvas.getContext('2d'),
    	clockInBtn: document.querySelector(options.clockInBtn),
    	clockOutBtn: document.querySelector(options.clockOutBtn),
    	statusBtn: document.querySelector(options.statusBtn),
    	localMediaStream: null,
    	dataURL: null,
    	imageURL: null,
    	imageURLInput: document.querySelector(options.imageURLInput),
  		
  		initialize: function() {
    		var that = this;
    		window.URL = window.URL || window.webkitURL;
    		
    		navigator.mediaDevices.getUserMedia(constraints).
    		then(this.handleSuccess).catch(this.handleError);
    		
    		this.clockInBtn.onclick = function () {
    		  $('#clock_in').hide();
    		  $('#clock_out').hide();
    		  $('#status').hide();
	          that.clockIn();
	        };
	        this.clockOutBtn.onclick = function () {
	          $('#clock_in').hide();
    		  $('#clock_out').hide();
    		  $('#status').hide();
	          that.clockOut();
	        };
	        this.statusBtn.onclick = function () {
    		  $('#status').hide();
    		  $('#clock_in').hide();
    		  $('#clock_out').hide();
	          that.status();
	        };
			this.downloadBtn.onclick = function () {
				that.download();
			}
		},
		handleSuccess: function (stream) {
  			var videoTracks = stream.getVideoTracks();
			console.log('Got stream with constraints:', constraints);
			console.log('Using video device: ' + videoTracks[0].label);
			stream.oninactive = function() {
				console.log('Stream inactive');
			};
			window.stream = stream; // make variable available to browser console
			video.srcObject = stream;
			localMediaStream = stream;
		},
		handleError: function(error) {
  			if (error.name === 'ConstraintNotSatisfiedError') {
    			this.errorMsg('The resolution ' + constraints.video.width.exact + 'x' +
        		constraints.video.width.exact + ' px is not supported by your device.');
  			} else if (error.name === 'PermissionDeniedError') {
    			this.errorMsg('Permissions have not been granted to use your camera and ' +
      			'microphone, you need to allow the page access to your devices in ' +
      			'order for the demo to work.');
  			}
  			//this.errorMsg('getUserMedia error: ' + error.name, error);
		},
		errorMsg: function(msg, error) {
  			console.error(msg);
  			if (typeof error !== 'undefined') {
    			console.error(error);
  			}
		},
		clockOut: function() {
			var that = this;
	      	// Check if has stream.
	      	if (localMediaStream) {
	        	// Draw whatever is in the video element on to the canvas.
	        	that.ctx.drawImage(video, 0, 0, 280, 210);
	        	// Create a data url from the canvas image.
	        	dataURL = canvas.toDataURL('image/png');
	        	// Call our method to save the data url to an image.
	        	that.saveDataUrlToImage(0);
	       	}
		},
	    clockIn: function () {
	    	var that = this;
	      	// Check if has stream.
	      	if (localMediaStream) {
	        	// Draw whatever is in the video element on to the canvas.
	        	that.ctx.drawImage(video, 0, 0, 280, 210);
	        	// Create a data url from the canvas image.
	       		dataURL = canvas.toDataURL('image/png');
	        	// Call our method to save the data url to an image.
	        	that.saveDataUrlToImage(1);
	       	}
	    },
		status: function() {
      		$.ajax({
			    type: "POST",
			    url: "app/get_current_punch.php",
			    data: { emp_id: $("input[name='emp_id']").val() },
			    success: function(response){
			    	if (response.status_code === 800){
		         		$('#punch_result').html("<label>"+response.data+"</label>");
		          	}
		          	if (response.status_code === 900){
		         		$('#punch_result').html("<label>"+response.data+"</label>");
		          	}
		          	$('#clock_in').show();
    		  		$('#clock_out').show();
    		  		$('#status').show();
			    },
			    error: function(xhr, textStatus, errorThrown) {
          			// Some error occured.
          			console.log('Error: ', xhr);
          			console.log('Error: ', text_status);
          			console.log('Error: ', errorThrown);
          			imageURLInput.value = 'An error occured.';
        		}
			});
		},
		download: function() {
			var that = this;
			var options = {
				url: '../../app/download_csv.php'
			};
		},
    	saveDataUrlToImage: function (type) {
      		var that = this;
      		var options = {
        		url: '../../app/process_punch.php'
      		};

      		// Only place where we need jQuery to make an ajax request
      		// to our server to convert the dataURL to a PNG image,
      		// and return the url of the converted image.
      		that.imageURLInput.value = 'Fetching url ...';
      		$.ajax({
        		url: options.url,
        		type: 'POST',
        		//dataType: 'json',
        		data: { 'type': type, 'data_url': dataURL, 'emp_id':  $("input[name='emp_id']").val(), 'note': $("input[name='note']").val() },
        		complete: function(xhr, textStatus) {
        			// Request complete.
					console.log("request complete");
        		},
        		// Request was successful.
        		success: function(response, textStatus, xhr) {
          			console.log('Response: ', response);
		          	if (response.status_code === 700 || response.status_code === 600){
		         		$('#punch_result').html("<label>"+response.data+"</label>");
		          	}
		          	if (response.status_code === 800){
		         		$('#punch_result').html("<label>ALREADY PUNCHED IN!</label>");
		          	}
		          	if (response.status_code === 900){
		         		$('#punch_result').html("<label>ALREADY PUNCHED OUT!</label>");
		          	}
          			// Conversion successful.
          			if (response.status_code === 200) {
            			imageURL = response.data.image_url;
            			// Paste the PNG image url into the input field.
            			that.imageURLInput.value = imageURL;
						that.imageURLInput.removeAttribute('disabled');
						if (type == 0){
							$('#punch_result').html("<label id='punch_good'>PUNCH OUT RECORDED!</label>");
						}
						if (type == 1){
							$('#punch_result').html("<label id='punch_good'>PUNCH IN RECORDED!</label>");
						}
          			}
          			$('#clock_in').show();
    		  		$('#clock_out').show();
    		  		$('#status').show();
        		},
        		error: function(xhr, textStatus, errorThrown) {
          			// Some error occured.
          			console.log('Error: ', errorThrown);
          			that.imageURLInput.value = 'An error occured.';
        		}
      		});

			/*var parameters = {'emp_id' : $("input[name='emp_id']").val()};
			//'in_datetime' : price, 'in_img' : curr_part_id, 'in_note' : today};
			// go_ajax2(parameters, 'http://' + project_domain + '/pages/inventory/manage/edit_vendor_price', 0);
			go_ajax2(parameters, 'http://' + project_domain + '/process_clock_in', 0);
			setTimeout(function(){
				if (rtn){
					var dialog_phrase = "Image has been uploaded";
					var dialog = new Messi(
						dialog_phrase,
						{
							title: 'Upload timeclock image',
							titleClass: 'anim success',
							buttons: [
								{id: 1, label: 'Ok', val: 'O', class: 'btn-success'}
							]
						}
					);

					//Close the modal
					//$('#EditPriceModal').modal('toggle');
				}
			},500);*/
    	}
  	};

  	// Initialize our application.
  	App.initialize();

  	// Expose to window object for testing purposes.
  	window.App = App;
	
})();