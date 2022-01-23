function initMonthRangeTab(){
	setOnChangeEventMonthRangeTab()
}

function plotVolatility(){
	commodity = $("#commodity_select_monthrange").val();

	date1 = $("#month1").datepicker('getDate');
	date2 = $("#month2").datepicker('getDate');

	if(commodity && date1 && date2){
		year1 = date1.getFullYear();
		month1 = date1.getMonth() + 1;

		year2 = date2.getFullYear();
		month2 = date2.getMonth() + 1;


		data = {
			commodity,
			year1,
			month1,
			year2,
			month2,
		}


		requestPostData("/getVolatilityMonthRange", {"data": data})
		.then(data=>{
			console.log("data recieved")
			// console.log(data)
			plot(data, commodity)
		})


	}else {
		console.log("Some input is not selected")
	}

	

}




function setOnChangeEventMonthRangeTab(){
	$("#commodity_select_monthrange").change(function(event) {
		// console.log(event)
		plotVolatility()
	});


	$("#month1").datepicker()
    .on("changeDate", function(e) {

    	// date = $(this).datepicker('getDate');
    	// $('#month2').datepicker('setStartDate', date);
    	// $('#month2').datepicker('update');
    	plotVolatility()


    	// console.log(e)
    });

    $("#month2").datepicker()
    .on("changeDate", function(e) {
    	// date = $(this).datepicker('getDate');
    	// $('#month1').datepicker('setEndDate', date);
    	// $('#month1').datepicker('update');
    	// console.log(e)
    	plotVolatility()
    });

}



function plot(volatility_data, commodity){
	console.log(volatility_data)
	x_retail = []
	y_retail = []

	x_wholesale = []
	y_wholsale = []

	// this loop can be optimzsed
	for(var i = 0; i < volatility_data["retail"].length; i++){
		curr = volatility_data["retail"][i]
		x_retail.push(curr["date"])
		y_retail.push(curr["value"])
	}

	// this loop can be optimzsed
	for(var i = 0; i < volatility_data["wholesale"].length; i++){
		curr = volatility_data["wholesale"][i]
		x_wholesale.push(curr["date"])
		y_wholsale.push(curr["value"])
	}

	tick0 = x_retail[0].localeCompare(x_wholesale[0]) == 1 ? x_retail[0] : x_wholesale[0]
	console.log(tick0)

	id = "volatility_plot";
	data  = [
		{
			x: x_retail,
			y: y_retail,
			type: 'scatter',
			mode: "lines+markers",
			name: "Retail Volatility",
		},
		{
			x: x_wholesale,
			y: y_wholsale,
			type: 'scatter',
			mode: "lines+markers",
			name: "Wholesale Volatility",
		}
	]
	var layout = {
		// width: '1000px',
		// height: '500px',
		title: `Price Volatility (${commodity})`, 
		showlegend: true,
		automargin: true,
		xaxis: {
			title: {
				text: "Months",
			},
			tickformat: '%b/%y',
			fixedrange: true,
			showticklabels: true,
			// tickmode: 'array',
			tickmode:'linear',
			// type: 'category',
			tick0: tick0,
			dtick: 31 * 24 * 60 * 60 * 1000,
		},
		yaxis: {
			title: {
				text: "Value",
			},
			fixedrange: true,
		},
	};


	var config = {
		displayModeBar: false
	};

	plt = Plotly.newPlot(id, data, layout, config);
	console.log(plt)
}

