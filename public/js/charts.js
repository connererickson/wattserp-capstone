var tou_chart;
var tiered_chart;
var ctx1, ctx2;
$(document).ready(function(){
	if ($('#tou_chart').length){
		ctx1 = $('#tou_chart')[0].getContext('2d');
		tou_chart = new Chart(ctx1, {
		    // The type of chart we want to create
		    type: 'bar',
		
		    // The data for our dataset
		    data: {
		        datasets: [
		        	{
           				label: 'Solar Approximation',
            			data: [0, 0, 0, 0, 0, 0, 2, 6, 12, 22, 35, 44, 50, 52, 50, 44, 35, 22, 12, 6, 2, 0, 0, 0],
            			type: 'line'
            		},
            	],
            	labels: ['12 AM', '1 AM', '2 AM', '3 AM', '4 AM', '5 AM', '6 AM', '7 AM', '8 AM', '9 AM', '10 AM', '11 AM', '12 PM', '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM']
		    },
		    
		    // Configuration options go here
		    options: {
		    	scales: {
    				xAxes: [{
    					offset: true,
    					display: true,
    					gridLines: {
			                offsetGridLines: true
			           },
			            stacked: true
    				}],
    				yAxes: [{ 
    					display: true,
    					ticks: {
                    		beginAtZero: true
                		}
    				}]
  				},
  				maintainAspectRatio: false,
  				responsive: true,
  				legend: {
            		display: true,
		    	},
		    	animation: {
			    	onComplete: function () {
		    		}
		    	}
		    }
		});
	}
	if ($('#tiered_chart').length){
		ctx2 = $('#tiered_chart')[0].getContext('2d');
		tiered_chart = new Chart(ctx2, {
		    // The type of chart we want to create
		    type: 'bar',
		
		    // The data for our dataset
		    data: {
		        labels: [],
		        datasets: [{}]
		    },
		
		    // Configuration options go here
		    options: {
		    	scales: {
    				xAxes: [{ display: false, stacked: true }],
    				yAxes: [{ display: false, stacked: true }]
  				},
  				maintainAspectRatio: false,
  				responsive: true,
  				legend: {
            		display: false,
		    	},
		    	animation: {
			    	onComplete: function () {
			        	var ctx2 = this.chart.ctx2;
			        	/*ctx2.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
			        	ctx2.textAlign = 'left';
			        	ctx2.textBaseline = 'bottom';*/
			
			          	this.data.datasets.forEach(function (dataset) {
			            	for (var i = 0; i < dataset.data.length; i++) {
			              		var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
			                  	left = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._xScale.left;
			              		ctx2.fillStyle = '#444'; // label color
			              		var label = dataset.label;
			              		ctx2.fillText(label, left + 90, model.y + 40);
			            	}
          				});               
		    		}
		    	}
		    }
		});
	}
});
