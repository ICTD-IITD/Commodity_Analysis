jQuery(document).ready(function($) {
	$(".dropdown-trigger").dropdown();
	$('select').formSelect();
	$('.modal').modal();


    // plotChartParent();
    // plotDispersion();
    // plotMostVolatile();

    InitializeSequence();

});


chart_dict = {}




function plotChartParent(){
	commodity_name = "Onion";
	mandi_name = "LASALGAON";
	state_name = "MAHARASHTRA";

	data = {
		commodity_name,
		mandi_name,
		state_name
	}
	chart_id = ["chart11", "chart12" ,"chart13"]

	plotChart(data, chart_id, "green")
	plotChartArrivalVsMandi(data, "arrival_vs_mandi_chart11", "green");
	plotChartMandiVsRetail(data, "mandi_vs_retail_chart11", "green");
	plotChartVolatilityMandiRetail(data, ["vol_mandi_chart11", "vol_retail_chart11"], "green");

	mandi_name = "BANGALORE";
	state_name = "KARNATAKA";

	data = {
		commodity_name,
		mandi_name,
		state_name
	}
	chart_id = ["chart21", "chart22" ,"chart23"]

	plotChart(data, chart_id, "blue")
	plotChartArrivalVsMandi(data, "arrival_vs_mandi_chart12", "blue");
	plotChartMandiVsRetail(data, "mandi_vs_retail_chart12", "blue")
	plotChartVolatilityMandiRetail(data, ["vol_mandi_chart12", "vol_retail_chart12"], "blue");

	mandi_name = "AZADPUR";
	state_name = "NCT OF DELHI";

	data = {
		commodity_name,
		mandi_name,
		state_name
	}
	chart_id = ["chart31", "chart32" ,"chart33"]

	plotChart(data, chart_id, "Purple")
	plotChartArrivalVsMandi(data, "arrival_vs_mandi_chart13", "Purple");
	plotChartMandiVsRetail(data, "mandi_vs_retail_chart13", "Purple")
	plotChartVolatilityMandiRetail(data, ["vol_mandi_chart13", "vol_retail_chart13"], "Purple");




}

function plotChart(data, chart_id, color){
	

	requestPostData("/agri_req/get_mandi_data_1_year", {"data": data})
	.then(data=>{
		// console.log(data);
		date = data["date"];
		// date = date.map(Date)

		mandi_price = data["mandi_price"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]

		mandi_anomalous_date = data["mandi_anomalous_date"]
		mandi_anomalous_data = data["mandi_anomalous_data"]

		plotChart1(chart_id[0], date, mandi_price, mandi_avg,mandi_std, mandi_anomalous_date, mandi_anomalous_data, "Mandi Price", max_y_1yr[SELECTED_COMMODITY], color);

		retail_price = data["retail_price"]
		retail_avg = data["retail_avg"]
		retail_std =  data["retail_std"]

		retail_anomalous_date = data["retail_anomalous_date"]
		retail_anomalous_data = data["retail_anomalous_data"]

		plotChart1(chart_id[1], date, retail_price, retail_avg,retail_std, retail_anomalous_date, retail_anomalous_data, "Retail Price", max_y_1yr[SELECTED_COMMODITY], color);

		arrival = data["arrival"]
		arrival_avg = data["arrival_avg"]
		arrival_std =  data["arrival_std"]

		plotChart1(chart_id[2], date, arrival, arrival_avg,arrival_std, [], [], "Arrival", max_y_arrival_1yr[SELECTED_COMMODITY], color);

	})
}


function plotChart1(chart_id, date, value, avg, std, anomaly_dates, anomaly_data, data_label, max_yaxis=0.5, color="green"){
	redraw(chart_id);
	var ctx = document.getElementById(chart_id).getContext('2d');

	anomaly= []
	for(var i = 0; i < date.length; i++){
		if(anomaly_dates.includes(date[i])){
			anomaly.push(value[i])
		}else{
			anomaly.push(null)
		}
	}



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
		borderColor: color,
		data: price,
		fill: false,
		pointRadius: 0,
		backgroundColor: color,
		pointStyle: 'rect',
		// borderWidth: 1,
	}

	s2 = {
		label: "Avg",
		borderColor: color,
		data: mean,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
		// pointStyle: 'rect',
	}

	s3 = {
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',


	}

	s4 = {
		data: mean_plus_std,
		pointRadius: 0,
		fill: false,
	}

	s5 = {
		label:  "Anomaly",
		data: anomaly,
		fill: false,
		pointRadius: 10,
		type: 'bubble',
		radius: 10,
		hoverRadius: 2,
		backgroundColor: color,
		hoverBackgroundColor: color,
		pointStyle: 'circle',

	}

	s6 = {
		data: anomaly_data,
		hidden: true,
	}

	datasets = []
	if(data_label=="Arrival"){
		datasets = [s1]
	}else{
		datasets = [s1, s2, s3, s4, s5, s6]
	}

	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: datasets,
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
	            		maxTicksLimit: 6,
	            	}
	            }]
	        },
	        tooltips: {
	        	mode: 'point'
	        },
	        legend: {
	        	labels: {
	        		filter: function(legendItem, chartData) {
	        			if (legendItem.datasetIndex == 1) return false;
	        			if (legendItem.datasetIndex == 4) return true;
	        			if (legendItem.datasetIndex >= 2) {
	        				return false;
	        			}
	        			return true;
	        		},
	        		usePointStyle: true,
	        	}
	        }

	    }
	});

	chart_dict[chart_id] = myChart;

	document.getElementById(chart_id).onclick = function (evt) {
		chart_id = $(this)[0].id;
		data_type = $(this)[0].dataset.type; // mandi/retail/arrival

		myChart = chart_dict[chart_id];

        var activePoints = myChart.getElementsAtEventForMode(evt, 'point', myChart.options); 
        // filer array, keep which have _datasetIndex=5
        active_point = activePoints.filter(p=>{
        	if(p._datasetIndex == 4) return true;
        	return false;
        })?.[0];

        if(!active_point) return;

        console.log(active_point)

        var x = myChart.data.labels[active_point._index];
        var y = myChart.data.datasets[active_point._datasetIndex].data[active_point._index];
        console.log(x, y);

        //extract information from x (date), active_point._datasetIndex =6
        info = myChart.data.datasets[5].data[0][x];
        info = {
        	...info,
        	data_type,
        }

        showAnomalyModal(info)
        console.log(info, data_type)
    };



}



function drawchart() {
	var ctx = document.getElementById('chart11').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						min: 0,
						max: 1200,
						maxTicksLimit: 6,
					}
				}],

			}
		}
	});

}




function plotChartForecast(data, chart_id, color){
	

	requestPostData("/agri_req/get_forecast", {"data": data})
	.then(data=>{
		// console.log(data);
		date = data["date"];
		// date = date.map(Date)

		mandi_price_original = data["mandi_price_original"]
		mandi_price_forecast = data["mandi_price_forecast"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]
		mandi_anomalous_date = data["mandi_anomalous_date"]
		mandi_anomalous_data = data["mandi_anomalous_data"]
		

		plotChartForecast1(chart_id[0], date, mandi_price_original, mandi_price_forecast,   mandi_avg,mandi_std, mandi_anomalous_date, mandi_anomalous_data, "Mandi Price", max_y_forecast[SELECTED_COMMODITY], color);

		retail_price_original = data["retail_price_original"]
		retail_price_forecast = data["retail_price_forecast"]
		retail_avg = data["retail_avg"]
		retail_std =  data["retail_std"]
		retail_anomalous_date = data["retail_anomalous_date"]
		retail_anomalous_data = data["retail_anomalous_data"]

		plotChartForecast1(chart_id[1], date, retail_price_original, retail_price_forecast, retail_avg,retail_std, retail_anomalous_date, retail_anomalous_data, "Retail Price", max_y_forecast[SELECTED_COMMODITY], color);

		arrival_original = data["arrival_original"]
		arrival_forecast = data["arrival_forecast"]
		arrival_avg = data["arrival_avg"]
		arrival_std =  data["arrival_std"]

		plotChartForecast1(chart_id[2], date, arrival_original, arrival_forecast,  arrival_avg,arrival_std, [], [], "Arrival", max_y_forecast[SELECTED_COMMODITY], color);

	})
}


function plotChartForecast1(chart_id, date, value_original, value_forecast,  avg, std,anomaly_dates, anomaly_data, data_label, max_yaxis=0.5, color="green"){
	redraw(chart_id);
	var ctx = document.getElementById(chart_id).getContext('2d');

	
	anomaly= []
	// console.log(date, anomaly_dates)

	for(var i = 0; i < date.length; i++){
		if(anomaly_dates.includes(date[i])){
			anomaly.push(value_forecast[i])
		}else{
			anomaly.push(null)
		}
	}





	mean_plus_std = avg.map(function (num, idx) {
		return num + std[idx];
	});

	mean_minus_std = avg.map(function (num, idx) {
		return num - std[idx];
	});


	price = value_original;
	mean = avg;

	s0 = {
		label: "Forecast",
		borderColor: "Red",
		data: value_forecast,
		// borderDash: [3,3],
		fill: false,
		pointRadius: 0,
		backgroundColor: "Red",
		pointStyle: 'rect',
	}

	s1 = {
		label: data_label,
		borderColor: color,
		data: price,
		fill: false,
		pointRadius: 0,
		// borderWidth: 1,
		backgroundColor: color,
		pointStyle: 'rect',
	}

	s2 = {
		label: "Avg",
		borderColor: color,
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


	}

	s4 = {
		data: mean_plus_std,
		pointRadius: 0,
		fill: false,
	}

	s5 = {
		label:  "Anomaly",
		data: anomaly,
		fill: false,
		pointRadius: 10,
		type: 'bubble',
		radius: 10,
		hoverRadius: 2,
		backgroundColor: 'red',
		hoverBackgroundColor: 'red',
		pointStyle: 'circle',

	}

	s6 = {
		data: anomaly_data,
		hidden: true,
	}

	
	// console.log("%cs5", "color:orange",anomaly_dates, data_label, chart_id);
	// console.log("%cs5", "color:blue",s5);

	datasets = []
	if(data_label=="Arrival"){
		datasets = [s0, s1]
	}else{
		datasets = [s0, s1, s2, s3, s4, s5, s6]
	}

	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: datasets,
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
	            		// autoSkip: true,
	            		maxTicksLimit: 6,

	            	}
	            }]
	        },
	        // tooltips: {
	        // 	mode: 'point',
	        // 	bodyFontSize: 20,
	        // 	displayColors: false,
	        // 	callbacks: {
	        // 		label: function(t, d){
	        // 			return ["Anomaly according to dame sont fds, madsf, fsajk pred, js", "sts", "fds gsa", "dfgfds", "rgefds"]
	        // 		},


	        // 	},
	        // },
	        legend: {
	        	labels: {
	        		filter: function(legendItem, chartData) {
	        			if (legendItem.datasetIndex == 5) return true;
	        			if (legendItem.datasetIndex >= 2) {
	        				return false;
	        			}
	        			return true;
	        		},
	        		usePointStyle: true,
	        	}
	        }

	    }
	});

	chart_dict[chart_id] = myChart;

	document.getElementById(chart_id).onclick = function (evt) {
		chart_id = $(this)[0].id;
		data_type = $(this)[0].dataset.type; // mandi/retail/arrival

		myChart = chart_dict[chart_id];

        var activePoints = myChart.getElementsAtEventForMode(evt, 'point', myChart.options); 
        // filer array, keep which have _datasetIndex=5
        active_point = activePoints.filter(p=>{
        	if(p._datasetIndex == 5) return true;
        	return false;
        })?.[0];

        if(!active_point) return;

        console.log(active_point)

        var x = myChart.data.labels[active_point._index];
        var y = myChart.data.datasets[active_point._datasetIndex].data[active_point._index];
        console.log(x, y);

        //extract information from x (date), active_point._datasetIndex =6
        info = myChart.data.datasets[6].data[0][x];
        info = {
        	...info,
        	data_type,
        }

        showAnomalyModal(info, "forecast")
        console.log(info, data_type)
    };




}













function plotChartArrivalVsMandi(data, chart_id, color){
	requestPostData("/agri_req/get_arrival_vs_mandi_last_3yr", {"data": data})
	.then(data=> {
		// console.log(data);
		mandi_price = data["mandi_price"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]

		date = data["date"];

		arrival = data["arrival"];

		plotChartArrivalVsMandi1(chart_id, date, mandi_price, mandi_avg, mandi_std, arrival, max_y_arrival_mandi[SELECTED_COMMODITY], color);


	});

}

function plotChartArrivalVsMandi1(chart_id, date, mandi_price, mandi_avg, mandi_std, arrival, max_yaxis=undefined, color="green"){
	redraw(chart_id)
	var ctx = document.getElementById(chart_id).getContext('2d');


	mean_plus_std = mandi_avg.map(function (num, idx) {
		return num + mandi_std[idx];
	});

	mean_minus_std = mandi_avg.map(function (num, idx) {
		return num - mandi_std[idx];
	});

	s1 = {
		label: "Mandi Price",
		borderColor: color,
		data: mandi_price,
		fill: false,
		pointRadius: 0,
		yAxisID: "axis_1",
		backgroundColor: color,
		pointStyle: 'rect',
	}

	s2 = {
		label: "Arrival",
		data: arrival,
		pointRadius: 0,
		fill: false,
		borderColor: "red",
		yAxisID: "axis_2",
		backgroundColor: "red",
		pointStyle: 'rect',
	}

	s3 = {
		label: "Price Avg",
		borderColor: color,
		data: mandi_avg,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
		yAxisID: "axis_1"
	}

	s4 = {
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',
		yAxisID: "axis_1"


	}

	s5 = {
		data: mean_plus_std,
		pointRadius: 0,
		fill: false,
		yAxisID: "axis_1"
	}

	
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: [s1, s2, s3, s4, s5],
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
	            	id: "axis_1",
	            	position: "left",
	            	ticks: {
	            		max: 8000,
	            		min: 0,
	            		maxTicksLimit: 6,
	            	}
	            },
	            {
	            	id: "axis_2",
	            	position: "right",
	            	ticks: {
	            		max: 8000,
	            		min: 0,
	            		maxTicksLimit: 6,
	            	}
	            }
	            ]
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
	        		},
	        		usePointStyle: true,
	        	},
	        	
	        }

	    }
	});

	chart_dict[chart_id] = myChart;



}





function plotChartMandiVsRetail(data, chart_id, color){
	requestPostData("/agri_req/get_mandi_vs_retail_last_3yr", {"data": data})
	.then(data=> {
		// console.log(data);
		mandi_price = data["mandi_price"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]

		retail_price = data["retail_price"]
		retail_avg = data["retail_avg"]
		retail_std =  data["retail_std"]

		date = data["date"];


		plotChartMandiVsRetail1(chart_id, date, mandi_price, mandi_avg, mandi_std, retail_price, retail_avg, retail_std, max_y_mandi_retail[SELECTED_COMMODITY], color);


	});

}

function plotChartMandiVsRetail1(chart_id, date, mandi_price, mandi_avg, mandi_std, retail_price, retail_avg, retail_std, max_yaxis=undefined, color="green"){
	redraw(chart_id)
	var ctx = document.getElementById(chart_id).getContext('2d');


	mean_plus_std_mandi = mandi_avg.map(function (num, idx) {
		return num + mandi_std[idx];
	});

	mean_minus_std_mandi = mandi_avg.map(function (num, idx) {
		return num - mandi_std[idx];
	});

	mean_plus_std_retail = retail_avg.map(function (num, idx) {
		return num + retail_std[idx];
	});

	mean_minus_std_retail = retail_avg.map(function (num, idx) {
		return num - retail_std[idx];
	});


	s1 = {
		label: "Mandi Price",
		borderColor: color,
		data: mandi_price,
		fill: false,
		pointRadius: 0,
		backgroundColor: color,
		pointStyle: 'rect'
	}

	s2 = {
		label: "Retail Price",
		data: retail_price,
		pointRadius: 0,
		fill: false,
		borderColor: "red",
		backgroundColor: "red",
		pointStyle: 'rect'
	}

	s3 = {
		label: "Mandi Avg",
		borderColor: color,
		data: mandi_avg,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s4 = {
		data: mean_minus_std_mandi,
		pointRadius: 0,
		fill: '+1',
	}

	s5 = {
		data: mean_plus_std_mandi,
		pointRadius: 0,
		fill: false,
	}

	s6 = {
		label: "Retail Avg",
		borderColor: 'red',
		data: retail_avg,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s7 = {
		data: mean_minus_std_retail,
		pointRadius: 0,
		fill: '+1',
	}

	s8 = {
		data: mean_plus_std_retail,
		pointRadius: 0,
		fill: false,
	}

	

	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: [s1, s2, s3, s4, s5, s6, s7, s8],
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
	            		maxTicksLimit: 6,
	            	}
	            }
	            ]
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
	        		},
	        		usePointStyle: true,
	        	}
	        }

	    }
	});

	chart_dict[chart_id] = myChart;
}


function plotChartVolatilityMandiRetail(data, chart_ids, color){
	requestPostData("/agri_req/get_volatility_last_3yr", {"data": data})
	.then(data=> {
		// console.log(data);
		mandi_vol = data["mandi_vol"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]

		retail_vol = data["retail_vol"]
		retail_avg = data["retail_avg"]
		retail_std =  data["retail_std"]

		date = data["date"];
		

		plotChartVolatilityMandiRetail1(chart_ids[0], date, mandi_vol, mandi_avg, mandi_std, "Mandi Volatility", undefined, color);
		plotChartVolatilityMandiRetail1(chart_ids[1], date, retail_vol, retail_avg, retail_std, "Retail Volatility" , undefined, color);


	});

}


function plotChartVolatilityMandiRetail1(chart_id, date, vol, avg, std, data_label, max_yaxis, color){
	redraw(chart_id)
	var ctx = document.getElementById(chart_id).getContext('2d');


	mean_plus_std = avg.map(function (num, idx) {
		return num + std[idx];
	});

	mean_minus_std = avg.map(function (num, idx) {
		return num - std[idx];
	});




	s1 = {
		label: data_label,
		borderColor: color,
		data: vol,
		fill: false,
		pointRadius: 0,
		backgroundColor: color,
		pointStyle: 'rect'

	}



	s2 = {
		label: "Avg",
		borderColor: color,
		data: avg,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s3 = {
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',
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
	            		beginAtZero: false,
	            		max: max_yaxis,
	            		maxTicksLimit: 6,
	            		// min: 0,
	            	}
	            }
	            ]
	        },
	        tooltips: {
	        	mode: 'point'
	        },
	        legend: {
	        	labels: {
	        		filter: function(legendItem, chartData) {
	        			if (legendItem.datasetIndex >= 1) {
	        				return false;
	        			}
	        			return true;
	        		},
	        		usePointStyle: true,
	        	}
	        }

	    }
	});

	chart_dict[chart_id] = myChart;

}



function plotDispersion(){
	chart_ids = ['dispersion_mandi_chart', 'dispersion_retail_chart']
	date = $("#id_news_feed_date").val();

	data = {
		commodity_name: SELECTED_COMMODITY,
		date,
	}

	requestPostData("/agri_req/get_dispersion_last_3yr", {"data": data})
	.then(data=> {
		console.log(data);
		mandi_disp = data["mandi_disp"]
		mandi_avg = data["mandi_avg"]
		mandi_std =  data["mandi_std"]

		retail_disp = data["retail_disp"]
		retail_avg = data["retail_avg"]
		retail_std =  data["retail_std"]

		date = data["date"];


		plotDispersion1(chart_ids[0], date, mandi_disp, mandi_avg, mandi_std, "Mandi Dispersion", undefined, "green");
		plotDispersion1(chart_ids[1], date, retail_disp, retail_avg, retail_std, "Retail Dispersion" , undefined, "red");


	});



}
function plotDispersion1(chart_id, date, disp, avg, std, data_label, max_yaxis, color){
	redraw(chart_id)
	var ctx = document.getElementById(chart_id).getContext('2d');


	mean_plus_std = avg.map(function (num, idx) {
		return num + std[idx];
	});

	mean_minus_std = avg.map(function (num, idx) {
		return num - std[idx];
	});




	s1 = {
		label: data_label,
		borderColor: color,
		data: disp,
		fill: false,
		pointRadius: 0,
		backgroundColor: color,
		pointStyle: 'rect'
	}



	s2 = {
		label: "Avg",
		borderColor: color,
		data: avg,
		borderDash: [5,5],
		// borderWidth: 1,
		fill: false,
		pointRadius: 0,
	}

	s3 = {
		data: mean_minus_std,
		pointRadius: 0,
		fill: '+1',
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
	            		beginAtZero: false,
	            		max: 0.07,
	            		maxTicksLimit: 6,
	            		// min: 0,
	            	}
	            }
	            ]
	        },
	        tooltips: {
	        	mode: 'point'
	        },
	        legend: {
	        	labels: {
	        		filter: function(legendItem, chartData) {
	        			if (legendItem.datasetIndex >= 1) {
	        				return false;
	        			}
	        			return true;
	        		},
	        		usePointStyle: true
	        	}
	        }

	    }
	});

	chart_dict[chart_id] = myChart;

}


function plotMostVolatile(){
	date = $("#id_news_feed_date").val();
	data = {
		"commodity_name": SELECTED_COMMODITY,
		date,
	}
	requestPostData("/agri_req/get_most_volatile_mandi", {"data": data})
	.then(data=> {
		console.log(data);
		mandi_name = data["mandi_name"];
		state_name = data["state_name"];
		vol = data["vol"];

		plotMostVolatile1("most_volatile_chart", mandi_name, state_name, vol);






	});

}


function plotMostVolatile1(chart_id, mandi_name, state_name, vol){
	redraw(chart_id)
	var ctx = document.getElementById(chart_id).getContext('2d');


	var label = []


	var bgColor = []
	for(var i = 0; i < Math.min(11, mandi_name.length); i++){
		if(state_name[i] == ""){
			bgColor.push("orange")
			label.push(mandi_name[i])
		}else{
			bgColor.push("#5383b0")
			label.push(mandi_name[i] + " (" + state_name[i] + ")")
		}
	}




	s1 = {
		labels: label,
		datasets: [{
			backgroundColor: bgColor,
			data: vol
		}]
		
	}
	var myHorizontalBar = new Chart(ctx, {
		type: 'horizontalBar',
		data: s1,
		options: {
			title: {
				display: true,
				text: '10 Most Volatile Mandis'
			},
			legend: {
				display: false,
			},
		}
	});

	chart_dict[chart_id] = myHorizontalBar


}



function redraw(chart_id){
	// console.log("chart_id")
	// console.log(chart_id)
	// console.log(chart_id in chart_dict)
	if(chart_id in chart_dict){
		// console.log("redraw inside")
		chart_dict[chart_id].destroy();
	}
}
