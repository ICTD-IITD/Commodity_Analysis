
function requestAnomalousChart(chart_id, state_name, mandi_name, commodity_name){
	data = {
		commodity_name,
		mandi_name,
		state_name
	}

	requestPostData("/agri_req/get_forecasted_mandi_1_month", {"data": data})
	.then(data=> {
		mandi_price = data["mandi_price_forecast"]
		date = data["date"];


		console.log(data);

		plotAnomolusChart(chart_id, date, mandi_price);

	});

}


function plotAnomolusChart(chart_id, date, mandi_price){
	var ctx = document.getElementById(chart_id).getContext('2d');
	s1 = {
		borderColor: "red",
		data: mandi_price,
		fill: false,
		pointRadius: 0,
	};

	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: date,
			datasets: [s1],
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
        				maxTicksLimit: 3,
        				maxRotation: 0,
          				minRotation: 0
	                }
	            }],
	            yAxes: [{
	            	ticks: {
	            		// max: 8000,
	            		min: 0,
	            	}
	            }
	            ]
	        },
	        tooltips: {
            	mode: 'point'
        	},
        	legend: {
         	display: false
        },

	    }
	});
}


// requestAnomalousChart("onion_forecast", "MAHARASHTRA", "LASALGAON", "onion");
// requestAnomalousChart("potato_forecast", "UTTAR PRADESH", "FAIZABAD", "POTATO");
// requestAnomalousChart("tomato_forecast", "KARNATAKA", "SRINIVASAPUR", "TOMATO");
// requestAnomalousChart("suger_forecast", "UTTAR PRADESH", "LAKHIMPUR", "SUGAR");
// requestAnomalousChart("masurdal_forecast", "WEST BENGAL", "SILIGURI", "MASUR DAL");
// requestAnomalousChart("moongdal_forecast", "ANDHRA PRADESH", "HYDERABAD", "Green Gram Dal (Moong Dal)");
// requestAnomalousChart("mustardoil_forecast", "UTTAR PRADESH", "CHHIBRAMAU(KANNUJ)", "Mustard Oil");
// requestAnomalousChart("rice_forecast", "UTTAR PRADESH", "AGRA", "rice");


