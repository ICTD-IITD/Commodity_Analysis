selected_opts = {}

jQuery(document).ready(function($) {
	setSelectedOpts();
	getAnomalousNormalMandi(commodity);
});

function setSelectedOpts(){
	selected_opts["commodity"] = $("#id_commodity_name").val();
	selected_opts["date"] = $("#id_date").val();
}




function getAnomalousNormalMandi(commodity_name){
	data = {
		commodity_name: selected_opts["commodity"],
		date: selected_opts["date"],
	}

	requestPostData("/agri_req/get_anomolous_normal", {"data": data})
	.then(data=> {
		normal = data["normal"]
		anomalous = data["anomalous"];


		console.log(normal, anomalous);

		plotMandis(commodity_name, anomalous, anomlous_flag = true);
		plotMandis(commodity_name, normal, anomlous_flag = false);





	});
}



function plotMandis(commodity_name, mandi_list, anomlous_flag){

	for (var i = mandi_list.length - 1; i >= 0; i--) {
		mandi_name = mandi_list[i]["MANDINAME"];
		state_name = mandi_list[i]["STATENAME"];
		chart_id = mandi_name;
		last_month_rule = mandi_list[i]["lastMonth"]
		last_year_rule = mandi_list[i]["lastYear"]


		html = `
			<div class="col s12 l4 m6">
				<div class="card center-align" style="border-radius: 20px; padding: 10px;">
					<span class="card-title">${mandi_name}</span>
					<br>
					<span class="">${state_name}</span>

					<div class="card-content">

						<canvas id="${chart_id}" width="" height="">
						</canvas>

					</div>
					




				</div>
			</div>
		`
		if(anomlous_flag){
			$(".anomolous_section").append(html);
		}else{
			$(".normal_section").append(html);
		}

		// <p><b>Rules</b></p>
		// 			<p><b>Last Month: </b>${last_month_rule}</p>
		// 			<p><b>Last Year: </b>${last_year_rule}</p>


		// 			<a> See news </a>
		

		requestMandiChart(chart_id, state_name, mandi_name, commodity_name)
	}
}



function requestMandiChart(chart_id, state_name, mandi_name, commodity_name){
	data = {
		commodity_name,
		mandi_name,
		state_name,
		// date
	}

	requestPostData("/agri_req/get_forecasted_mandi_1_month", {"data": data})
	.then(data=> {
		mandi_price = data["mandi_price_forecast"]
		date = data["date"];


		console.log(data);

		plotMandiChart(chart_id, date, mandi_price);

	});

}



function plotMandiChart(chart_id, date, mandi_price){
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
	                	autoSkip: true,
        				maxTicksLimit: 3,
        				maxRotation: 0,
          				minRotation: 0
	                }
	            }],
	            yAxes: [{
	            	ticks: {
	            		// min: 0,
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



// plotMandis(commodity, true);
// plotMandis(commodity, false);

