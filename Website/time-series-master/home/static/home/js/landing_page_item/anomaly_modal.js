function showAnomalyModal(info, chart_type){
	// chart_type = forecast, 1yr, mandi_retail, mandi_arrival

	// setAnomaly modal
	setAnomalyModal(info, chart_type)
	$('#id_anomaly_modal').modal('open');


}

function setAnomalyModal(info, chart_type){
	setAnomalyChartModal(info, chart_type);
	setAnomalyNewsModal(info, chart_type)
}

async function setAnomalyChartModal(info, chart_type){
	start_date = info["STARTDATE"];
	end_date = info["ENDDATE"];
	mandi_name = info["MANDINAME"];
	state_name = info["STATENAME"];
	max_min_ratio = info?.["MAXMINRATIO"];
	same_month = info?.["SameMonth"];
	last_month = info?.["lastMonth"];
	last_year = info?.["lastYear"];
	data_type = info?.["data_type"];
	commodity_name = info["commodity"].toUpperCase();

	mandi_retail_text = data_type=="mandi" ? "Mandi" : "Retail Center";
	if(data_type == "arrival") mandi_retail_text = "Mandi"

	$("#id_anomaly_modal_mandi_retail_text").html(mandi_retail_text);
	$("#id_anomaly_modal_mandi_name").html(mandi_name);
	$("#id_anomaly_modal_state_name").html(state_name);
	$("#id_anomaly_modal_start_date").html(start_date);
	$("#id_anomaly_modal_end_date").html(end_date);

	// set anomaly status text
	console.log(info);

	$("#id_same_month_anomaly_text_modal").hide();
	$("#id_last_month_anomaly_text_modal").hide();
	$("#id_last_yr_anomaly_text_modal").hide();
	$("#id_anomaly_classifer_text_modal").hide();
	


	curr_date = new Date(end_date);

	curr_mm = moment(curr_date).format('MMM');
	curr_mmmm = moment(curr_date).format('MMMM');
	last_mm = moment(curr_date).subtract(1, "month").format('MMM');
	last_yy = moment(curr_date).subtract(1, "month").format('YY');

	curr_yy = moment(curr_date).format('YY');
	last_yyyy = moment(curr_date).subtract(1, "year").format('YYYY');

	if(same_month == "Anomaly"){
		$("#id_same_month_anomaly_text_modal").show();
		
		$("#id_same_month_month").text(curr_mm);
		$("#id_same_month_year").text(curr_yy)
	}
	if(last_month == "Anomaly"){
		$("#id_last_month_anomaly_text_modal").show();

		$("#id_last_month_month").text(last_mm);
		$("#id_last_month_year").text(last_yy)

	}
	if(last_year == "Anomaly"){
		$("#id_last_yr_anomaly_text_modal").show();

		$("#id_last_yr_month").text(curr_mmmm)
	}


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

	data_label = capitalizeFirstLetter(data_type) + " Price"

	if(data_type != "arrival"){
		price_original = chart_data[`${data_type}_price_original`]
		price_forecast = chart_data[`${data_type}_price_forecast`]
	}
	if(data_type == "arrival"){
		price_original = chart_data[`arrival_original`]
		price_forecast = chart_data[`arrival_forecast`]
		data_label = "Arrival";
	}


	avg = chart_data[`${data_type}_avg`]
	std =  chart_data[`${data_type}_std`]
	anomalous_date = chart_data[`${data_type}_anomalous_date`]
	anomalous_data = chart_data[`${data_type}_anomalous_data`]

	chart_id = 'id_anomaly_modal_chart';


	
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



async function setAnomalyNewsModal(info, chart_type){
	let date = info["ENDDATE"];
	let commodity = info["commodity"].toUpperCase();
	let data = {
		date,
		commodity,
	}
	let news1= await requestPostData("/agri_req/getAnomalousAndArticleNewsFeedByDate", {"data": data});
	let news2= await requestPostData("/agri_req/getNonAnomalousAndArticleNewsFeedByDate", {"data": data});
	news1 = news1['news'];
	news2 = news2['news'];

	let news_data = [...news1, ...news2];

	let html = ``;
	$("#id_modal_news_list").html('');
	for(var i = 0; i < news_data.length; i++){
		let data = news_data[i]

		let published_date = data["PUBLISHEDDATE"];
		let article_url = data["ARTICLEURL"];
		let article_title = data["ARTICLETITLE"];
		let commodity = data["COMMODITY"];


		html += `<li class="collection-item">
					<div class="row" style="margin-bottom: 0px">

						<div class="col s8">
							<span style="font-size: 13px">${published_date}</span>
						</div>

						<div class="col s3">
							<a href="${article_url}" class="secondary-content" target="_blank">
								<i class="material-icons" style="font-size: 16px">launch</i>
							</a>
						</div>
						<div class="col s12">
							<span class="">${article_title}</span>
						</div>

					</div>
				</li>`
	}

	$("#id_modal_news_list").append(html);



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
