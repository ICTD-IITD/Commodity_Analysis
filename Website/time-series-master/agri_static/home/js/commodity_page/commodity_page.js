


var selected_option = {}

jQuery(document).ready(function($) {
	setOption();
	plotAllCharts();

});


function setOption(){
	let commodity = $("#id_commodity_name").val();
	let mandi = $("#id_mandi_name").val().toUpperCase();
	let state = $("#id_state_name").val().toUpperCase();
	let date = $("#id_date").val();

	selected_option = {
		commodity,
		mandi,
		state,
		date
	}
}


function plotAllCharts(){
	
	plotForecastChart();
	plot1YrChart();
	plot3YrChart();
	plotVolatilityChart();
	plotMostVolatileChart();
	plotDispersionChart();
	plotMostDispersedChart();
	//add more
}


async function plotForecastChart(){
	data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}

	chart_data = await requestPostData("/agri_req/get_forecast", {"data": data})
	// console.log(chart_data);


	chart_id = "id_forecast_mandi";	
	opts = getForecastOpts(chart_data, chart_id, "mandi")
	drawChartForecast(opts)

	chart_id = "id_forecast_retail";	
	opts = getForecastOpts(chart_data, chart_id, "retail")
	drawChartForecast(opts)

	chart_id = "id_forecast_arrival";	
	opts = getForecastOpts(chart_data, chart_id, "arrival")
	drawChartForecast(opts)


}


function getForecastOpts(chart_data, chart_id, data_type){

	date = chart_data["date"];

	color = "green"
	if(data_type=="retail") color = "blue";
	if(data_type=="arrival") color = "purple";

	price_original = chart_data[`${data_type}_price_original`]
	price_forecast = chart_data[`${data_type}_price_forecast`]
	anomaly_dates = chart_data[`${data_type}_anomalous_date`]
	anomalous_data = chart_data[`${data_type}_anomalous_data`]
	data_label = capitalizeFirstLetter(data_type) + " Price"

	if(data_type== "arrival"){
		price_original = chart_data["arrival_original"]
		price_forecast = chart_data["arrival_forecast"]
		// anomaly_dates = []
		// anomalous_data = []
		data_label = capitalizeFirstLetter(data_type)
	}

	avg = chart_data[`${data_type}_avg`]
	std =  chart_data[`${data_type}_std`]

	opts = {
		chart_id,
		date,
		price_original,
		price_forecast,
		avg,
		std,
		anomaly_dates,
		anomalous_data,
		data_label,
		color
	}

	return opts

}




async function plot1YrChart(){
	data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}


	chart_data = await requestPostData("/agri_req/get_mandi_data_1_year", {"data": data})


	chart_id = "id_1yr_mandi";	
	opts = get1YrOpts(chart_data, chart_id, "mandi")
	drawChart1Yr(opts)

	chart_id = "id_1yr_retail";	
	opts = get1YrOpts(chart_data, chart_id, "retail")
	drawChart1Yr(opts)

	chart_id = "id_1yr_arrival";	
	opts = get1YrOpts(chart_data, chart_id, "arrival")
	drawChart1Yr(opts)


}


function get1YrOpts(chart_data, chart_id, data_type){

	date = chart_data["date"];

	color = "green"
	if(data_type=="retail") color = "blue";
	if(data_type=="arrival") color = "purple";

	original = chart_data[`${data_type}_price`]
	anomaly_dates = chart_data[`${data_type}_anomalous_date`]
	anomalous_data = chart_data[`${data_type}_anomalous_data`]
	data_label = capitalizeFirstLetter(data_type) + " Price"

	if(data_type== "arrival"){
		original = chart_data["arrival"]
		data_label = capitalizeFirstLetter(data_type)
	}

	avg = chart_data[`${data_type}_avg`]
	std =  chart_data[`${data_type}_std`]

	opts = {
		chart_id,
		date,
		original,
		avg,
		std,
		anomaly_dates,
		anomalous_data,
		data_label,
		color
	}


	return opts

}


function plot3YrChart(){
	
	plot3YrChartMandiVsArrival();
	plot3YrChartMandiVsRetail();

}

async function plot3YrChartMandiVsArrival(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}


	let chart_data = await requestPostData("/agri_req/get_arrival_vs_mandi_last_3yr", {"data": data})
	
	let mandi_price = chart_data["mandi_price"]
	let mandi_avg = chart_data["mandi_avg"]
	let mandi_std =  chart_data["mandi_std"]
	let date = chart_data["date"];
	let arrival = chart_data["arrival"];
	let chart_id = "id_3yr_mandi_arrival";	
	let mandi_anomalous_date = chart_data["mandi_anomalous_date"]
	let mandi_anomalous_data = chart_data["mandi_anomalous_data"]

	let arrival_anomalous_date = chart_data["arrival_anomalous_date"]
	let arrival_anomalous_data = chart_data["arrival_anomalous_data"]

	let color = "green"
	
	let opts = {
		chart_id,
		date,
		mandi_price,
		mandi_avg,
		mandi_std,
		mandi_anomalous_date,
		mandi_anomalous_data,
		arrival_anomalous_date,
		arrival_anomalous_data,
		arrival,
		color,
	}


	drawChartArrivalVsMandi(opts)


}

async function plot3YrChartMandiVsRetail(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}

	let chart_data = await requestPostData("/agri_req/get_mandi_vs_retail_last_3yr", {"data": data})
	
	let date = chart_data["date"];
	
	let mandi_price = chart_data["mandi_price"]
	let mandi_avg = chart_data["mandi_avg"]
	let mandi_std =  chart_data["mandi_std"]

	let retail_price = chart_data["retail_price"]
	let retail_avg = chart_data["retail_avg"]
	let retail_std =  chart_data["retail_std"]

	let mandi_anomalous_date = chart_data["mandi_anomalous_date"]
	let mandi_anomalous_data = chart_data["mandi_anomalous_data"]

	let retail_anomalous_date = chart_data["retail_anomalous_date"]
	let retail_anomalous_data = chart_data["retail_anomalous_data"]

	let chart_id = "id_3yr_mandi_retail";
	let color = "green"	

	let opts = {
		chart_id,
		date,
		mandi_price,
		mandi_avg,
		mandi_std,
		retail_price,
		mandi_anomalous_date,
		mandi_anomalous_data,
		retail_anomalous_date,
		retail_anomalous_data,
		retail_avg,
		retail_std,
		color,
	}

	drawChartMandiVsRetail(opts)

}



async function plotVolatilityChart(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}

	let chart_data = await requestPostData("/agri_req/get_volatility_last_3yr", {"data": data})

	let mandi_vol = chart_data["mandi_vol"]
	let mandi_avg = chart_data["mandi_avg"]
	let mandi_std =  chart_data["mandi_std"]

	let retail_vol = chart_data["retail_vol"]
	let retail_avg = chart_data["retail_avg"]
	let retail_std =  chart_data["retail_std"]

	let mandi_anomalous_date = chart_data["mandi_anomalous_date"]
	let mandi_anomalous_data = chart_data["mandi_anomalous_data"]

	let retail_anomalous_date = chart_data["retail_anomalous_date"]
	let retail_anomalous_data = chart_data["retail_anomalous_data"]

	let date = chart_data["date"];


	// mandi
	let opts = {
		chart_id: "id_volatility_mandi",
		date,
		vol: mandi_vol,
		avg: mandi_avg,
		std: mandi_std,
		data_label: "Mandi Volatility",
		color: "green",
		anomalous_date: mandi_anomalous_date,
		anomalous_data: mandi_anomalous_data,
	}

	drawChartVolatility(opts)


	//retail
	opts = {
		chart_id: "id_volatility_retail",
		date,
		vol: retail_vol,
		avg: retail_avg,
		std: retail_std,
		data_label: "Retail Volatility",
		color: "blue",
		anomalous_date: retail_anomalous_date,
		anomalous_data: retail_anomalous_data,
	}

	drawChartVolatility(opts)

}


async function plotMostVolatileChart(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"commodity" : selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}

	let chart_data = await requestPostData("/agri_req/getMostVolatileMandiByDate", {"data": data})


	let mandi_name = chart_data["mandi_name"];
	let state_name = chart_data["state_name"];
	let vol = chart_data["vol"];

	let opts = {
		chart_id: "id_most_volatile_mandi",
		mandi_name,
		state_name,
		vol,
	}

	drawChartMostVolatile(opts)

}




async function plotDispersionChart(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
		"mandi_name": selected_option.mandi,
		"state_name": selected_option.state,
	}

	let chart_data = await requestPostData("/agri_req/get_dispersion_last_3yr", {"data": data})



	let mandi_disp = chart_data["mandi_disp"]
	let mandi_avg = chart_data["mandi_avg"]
	let mandi_std =  chart_data["mandi_std"]

	let retail_disp = chart_data["retail_disp"]
	let retail_avg = chart_data["retail_avg"]
	let retail_std =  chart_data["retail_std"]

	let date = chart_data["date"];


	// mandi
	let opts = {
		chart_id: "id_dispersion_mandi",
		date,
		dispersion: mandi_disp,
		avg: mandi_avg,
		std: mandi_std,
		data_label: "Mandi Dispersion",
		color: "green",
	}

	drawChartDispersion(opts)


	//retail
	opts = {
		chart_id: "id_dispersion_retail",
		date,
		dispersion: retail_disp,
		avg: retail_avg,
		std: retail_std,
		data_label: "Retail Dispersion",
		color: "blue",
	}

	drawChartDispersion(opts)


	plotDispersionAnomalyChart();

}


async function plotDispersionAnomalyChart(){
	let data = {
		"date": selected_option.date,
		"commodity_name": selected_option.commodity,
	}

	let chart_data = await requestPostData("/agri_req/get_dispersion_last_3yr_anomaly", {"data": data})


	// plot mandi anomaly
	let mandi_anomalous_date = chart_data["mandi_anomalous_date"]
	let mandi_anomalous_data = chart_data["mandi_anomalous_data"]

	// mandi
	let opts = {
		chart_id: "id_dispersion_mandi",
		anomalous_date: mandi_anomalous_date,
		anomalous_data: mandi_anomalous_data,
		color: "green",
	}

	drawChartDispersionAnomaly(opts)


	// plot retail anomaly
	let retail_anomalous_date = chart_data["retail_anomalous_date"]
	let retail_anomalous_data = chart_data["retail_anomalous_data"]

	// retail
	opts = {
		chart_id: "id_dispersion_retail",
		anomalous_date: retail_anomalous_date,
		anomalous_data: retail_anomalous_data,
		color: "blue",
	}

	drawChartDispersionAnomaly(opts)
}


async function plotMostDispersedChart(){
	let data = {
		"date": selected_option.date,
	}

	let chart_data = await requestPostData("/agri_req/get_most_dispersed_commodity", {"data": data})


	let commodities = chart_data["commodity"];
	let dispersion = chart_data["dispersion"];


	let opts = {
		chart_id: "id_most_dispersed_commodity",
		commodities,
		dispersion
	}

	drawChartMostDispersed(opts)

}

