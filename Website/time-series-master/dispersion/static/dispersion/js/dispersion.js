

$( document ).ready(function() {

	init();
	
});

function init(){
	setDatepicker();

	setOnChangeEvent();

}






function plotDispersion(){
	commodity = $("#commodity_select").val();

	date1 = $("#month1").datepicker('getDate');
	date2 = $("#month2").datepicker('getDate');

	console.log(commodity && date1 && date2)
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


		requestPostData("/getPriceDispersion", {"data": data})
		.then(data=>{
			console.log("data recieved")
			// console.log(data)
			plot(data, commodity)
		})


	}else {
		console.log("Some input is not selected")
	}

	

}





function setDatepicker() {
	$(".datepicker").datepicker( {
	    format: "mm-yyyy",
	    startView: "months",
	    autoclose: true,
	    minViewMode: "months",
	    endDate: "today",
	    maxDate: new Date(),
	    startDate: "01-2016"
	});
}


function setOnChangeEvent(){
	$("#commodity_select").change(function(event) {
		// console.log(event)
		plotDispersion()
	});


	$("#month1").datepicker()
    .on("changeDate", function(e) {

    	date = $(this).datepicker('getDate');
    	// $('#month2').datepicker('setStartDate', date);
    	// $('#month2').datepicker('update');
    	plotDispersion()


    	// console.log(e)
    });

    $("#month2").datepicker()
    .on("changeDate", function(e) {
    	date = $(this).datepicker('getDate');
    	// $('#month1').datepicker('setEndDate', date);
    	// $('#month1').datepicker('update');
    	// console.log(e)
    	plotDispersion()
    });

}



function plot(dispersion_data, commodity){
	console.log(dispersion_data)
	x_retail = []
	y_retail = []

	x_wholesale = []
	y_wholsale = []

	// this loop can be optimzsed
	for(var i = 0; i < dispersion_data["retail"].length; i++){
		curr = dispersion_data["retail"][i]
		x_retail.push(curr["date"])
		y_retail.push(curr["value"])
	}

	// this loop can be optimzsed
	for(var i = 0; i < dispersion_data["wholesale"].length; i++){
		curr = dispersion_data["wholesale"][i]
		x_wholesale.push(curr["date"])
		y_wholsale.push(curr["value"])
	}

	tick0 = x_retail[0].localeCompare(x_wholesale[0]) == 1 ? x_retail[0] : x_wholesale[0]
	console.log(tick0)

	id = "dipsersion_plot";
	data  = [
		{
			x: x_retail,
			y: y_retail,
			type: 'scatter',
			mode: "lines+markers",
			name: "Retail Dispersion",
		},
		{
			x: x_wholesale,
			y: y_wholsale,
			type: 'scatter',
			mode: "lines+markers",
			name: "Wholesale Dispersion",
		}
	]
	var layout = {
		// width: '1000px',
		// height: '500px',
		title: `Price Dispersion (${commodity})`, 
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


