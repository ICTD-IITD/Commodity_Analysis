function plotChart1(chart_id, date, value, avg, std, data_label, max_yaxis=undefined){
	var ctx = document.getElementById(chart_id).getContext('2d');


	mean_plus_std = avg.map(function (num, idx) {
  		return num + std[idx];
	});

	mean_minus_std = avg.map(function (num, idx) {
  		return num - std[idx];
	});


	price = value;
	mean = avg;

	s1 = {
		label: data_label,
		borderColor: "green",
		data: price,
		fill: false,
		pointRadius: 0,
		// borderWidth: 1,
	}

	s2 = {
		label: "Avg",
		borderColor: "grey",
		data: mean,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s3 = {
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',
		// fillBetweenSet: 1,
		// strokeColor: "rgba(255,0,0, 0.2)",
		// fillColor: "rgba(255,0,0, 0.2)"
	}

	s4 = {
		data: mean_plus_std,
		pointRadius: 0,
		fill: false,
	}

	


	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: [s1, s2, s3, s4],
		},
		options: {
	        scales: {
	            xAxes: [{
	                type: 'time',
	                time: {
	                	parser: 'YYYY-MM-DD',
	                    unit: 'day',
	                    day: 'MMM YY',
	                    displayFormats:{
	                    	day: 'MMM YY'
	                    }
	                },
	                ticks: {
	                	// max: 5,
	                	// step: 60,
	                	autoSkip: true,
        				maxTicksLimit: 12
	                }
	            }],
	            yAxes: [{
	            	ticks: {
	            		max: max_yaxis,
	            		min: 0,
	            	}
	            }]
	        },
	        tooltips: {
            	mode: 'point'
        	},
        	legend: {
           labels: {
               filter: function(legendItem, chartData) {
                if (legendItem.datasetIndex >= 2) {
                  return false;
                }
               return true;
               }
            }
        }

	    }
	});


}



function plot_1Yr_Retail_Mandi_Arrival(){
	
}

function plot_1Yr_Retail_Mandi(){

}

function plot_1Yr_Arrival(){

}







