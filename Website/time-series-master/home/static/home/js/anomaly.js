function plotChartAnomaly(){

	date = {}
	color="green"
	

	requestPostData("/agri_req/getAnomalyData", {"data": data})
	.then(data=>{
		console.log(data);
		date = data["date"];
		// date = date.map(Date)

		mandi_price = data["mandi_price"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]
		same_month = data["same_month"]
		last_month = data["last_month"]
		last_year = data["last_year"]

		same_month = same_month.map(function (num, idx) {
  			if(num == "None") return num;
  			else return mandi_price[idx];
		});
		last_month = last_month.map(function (num, idx) {
  			if(num == "None") return num;
  			else return mandi_price[idx];
		});
		last_year = last_year.map(function (num, idx) {
  			if(num == "None") return num;
  			else return mandi_price[idx];
		});


		plotChartAnomaly1("id_anomaly", date, mandi_price, mandi_avg,mandi_std,same_month,last_month,last_year, "Mandi Price", max_y_1yr[SELECTED_COMMODITY], color);

	})
}


function plotChartAnomaly1(chart_id, date, value, avg, std,same_month,last_month,last_year, data_label, max_yaxis=0.5, color="green"){
	redraw(chart_id);
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
		type: "line",
		label: data_label,
		borderColor: color,
		data: price,
		fill: false,
		pointRadius: 0,
		// borderWidth: 1,
	}

	s2 = {
		type: "line",
		label: "Avg",
		borderColor: color,
		data: mean,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s3 = {
		type: "line",
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',


	}

	s4 = {
		type: "line",
		data: mean_plus_std,
		pointRadius: 0,
		fill: false,
	}

	s5 = {
		label: "Same month",
		data: same_month,
		type: 'scatter',
		backgroundColor: 'red',
  		pointRadius: 8,
  		pointHoverRadius: 8,
  		pointHoverBackgroundColor: 'red',
	}


	s6 = {
		label: "Last month",
		data: last_month,
		type: 'scatter',
		backgroundColor: 'blue',
  		pointRadius: 8,
  		pointHoverRadius: 8,
  		pointHoverBackgroundColor: 'blue',
	}

	s7 = {
		label: "Last year",
		data: last_year,
		type: 'scatter',
		backgroundColor: 'orange',
  		pointRadius: 8,
  		pointHoverRadius: 8,
  		pointHoverBackgroundColor: 'orange',
	}

	// s6 = {

	// }

	// s7 = {

	// }



	datasets = []
	if(data_label=="Arrival"){
		datasets = [s1]
	}else{
		datasets = [s1, s2, s3, s4, s5, s6, s7]
	}

	var myChart = new Chart( ctx, {
		// type: 'line',
		data: {
			labels: date,
			datasets: datasets,
		},
		options: {
			scaleShowVerticalLines: false,
			responsive: true,
    maintainAspectRatio: false,
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
        				maxTicksLimit: 12,
        				fontSize: 18
	                },
	                tickOptions: {showGridline:false}
	             //    gridLines: {
              //   		display:false
            		// }
	            }],
	            yAxes: [{
	            	ticks: {
	            		max: max_yaxis,
	            		min: 0,
	            		fontSize: 18
	            	},
	            	tickOptions: {showGridline:false}
	            	// gridLines: {
              //   		display:false
            		// }
	            }]
	        },
	        tooltips: {
            	mode: 'point'
        	},
        	legend: {
           labels: {
           	"fontSize": 18,
               filter: function(legendItem, chartData) {
                if (legendItem.datasetIndex >= 2 && legendItem.datasetIndex <= 3) {
                  return false;
                }
               return true;
               }
            }
        }

	    }
	});

	chart_dict[chart_id] = myChart;


}
plotChartAnomaly()

$("#id_anomaly_modal").modal('open');