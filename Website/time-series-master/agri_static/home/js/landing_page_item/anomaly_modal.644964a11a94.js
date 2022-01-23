function showAnomalyModal(info, chart_type){
	// chart_type = forecast, 1yr, mandi_retail, mandi_arrival

	// setAnomaly modal
	setAnomalyModal(info, chart_type)
	$('#id_anomaly_modal').modal('open');


}

async function setAnomalyModal(info, chart_type){
	start_date = info["STARTDATE"];
	end_date = info["ENDDATE"];
	mandi_name = info["MANDINAME"];
	state_name = info["STATENAME"];
	max_min_ratio = info["MAXMINRATIO"];
	same_month = info["SameMonth"];
	last_month = info["lastMonth"];
	last_year = info["lastYear"];
	data_type = info["data_type"];

	mandi_retail_text = data_type=="mandi" ? "Mandi" : "Retail Center"
	$("#id_anomaly_modal_mandi_retail_text").html(mandi_retail_text);
	$("#id_anomaly_modal_mandi_name").html(mandi_name);
	$("#id_anomaly_modal_state_name").html(state_name);
	$("#id_anomaly_modal_start_date").html(start_date);
	$("#id_anomaly_modal_end_date").html(end_date);

	commodity_name = $("#id_news_feed_commoodity").val();

	//request for chart data
	data = {
		commodity_name,
		mandi_name,
		state_name,
		start_date,
		end_date,
	}

	chart_data = await requestPostData("/agri_req/get_forecast", {"data": data});

	date = chart_data["date"];

	price_original = chart_data[`${data_type}_price_original`]
	price_forecast = chart_data[`${data_type}_price_forecast`]
	avg = chart_data[`${data_type}_avg`]
	std =  chart_data[`${data_type}_std`]
	anomalous_date = chart_data[`${data_type}_anomalous_date`]
	anomalous_data = chart_data[`${data_type}_anomalous_data`]

	chart_id = 'id_anomaly_modal_chart';
	data_label = capitalizeFirstLetter(data_type) + " Price"

	opts = {
		chart_id,
		date,
		price_original,
		price_forecast,
		avg,
		std,
		anomalous_date,
		anomalous_data,
		data_label,
		chart_type
	}

	plotChartAnomalyModal(opts);






}

function plotChartAnomalyModal({
	chart_id,
	date,
	price_original,
	price_forecast,
	avg,
	std,
	anomalous_date,
	anomalous_data,
	data_label,
	chart_type
}){


	redraw(chart_id);
	var ctx = document.getElementById(chart_id).getContext('2d');
	anomaly= []

	for(var i = 0; i < date.length; i++){
		if(anomalous_date.includes(date[i])){
			anomaly.push(price_forecast[i])
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


	price = price_original;
	mean = avg;


	s0 = {
		data: [],
		hidden: true,
	}

	if(chart_type == "forecast"){
		s0 = {
			label: "Forecast",
			borderColor: "Red",
			data: price_forecast,
			// borderDash: [3,3],
			fill: false,
			pointRadius: 0,
			backgroundColor: "Red",
			pointStyle: 'rect',
		}

	}

	

	s1 = {
		label: data_label,
		borderColor: color,
		data: price,
		fill: false,
		pointRadius: 0,
		pointStyle: 'line',
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
		label: "Anomaly",
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

	datasets = []
	if(data_label=="Arrival"){
		datasets = [s0, s1]
	}else{
		datasets = [s0, s1, s2, s3, s4, s5]
	}

	var myChart = new Chart( ctx, {
		type: 'line',
		responsive: true,
		data: {
			labels: date,
			datasets: datasets,
		},
		options: {
			annotation: {
				annotations: [{
					drawTime: "beforeDatasetsDraw",
					type: "box",
					xScaleID: "x-axis-0",
					yScaleID: "y-axis-0",
					xMin: "2020-08-30",
					xMax: "2020-10-12",
					yMin: 500,
					yMax: 4000,
					backgroundColor: "rgba(46, 204, 113,0.3)",
					borderColor: "rgb(101, 33, 171)",
					borderWidth: 1,
				}],
			},
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
						autoSkip: true,
						maxTicksLimit: 6
					}
				}],
	            // yAxes: [{
	            // 	ticks: {
	            // 		min: 0,
	            // 		maxTicksLimit: 6,

	            // 	}
	            // }]
	        },

	        legend: {
	        	labels: {
	        		filter: function(legendItem, chartData) {
	        			if (legendItem.datasetIndex == 0 && chart_type!="forecast") return false;
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

}
