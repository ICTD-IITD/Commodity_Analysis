var COMMODITY_MAP = "";
var DEFAULT_COMMDITY = "Onion";
var SELECTED_COMMODITY = "Onion";
function getCommodityMap(){
	data = {};

	return new Promise((resolve, reject) => {
		requestPostData("/agri_req/get_commodity_map", {"data": data}).
		then(data=>{
			COMMODITY_MAP = data;
			sessionStorage.setItem("COMMODITY_MAP", JSON.stringify(COMMODITY_MAP));
			resolve()
		});
	});
}




function getDefaultMandis(commodity){
	state_mandis = COMMODITY_MAP["default_select"][commodity];
	return state_mandis;
}


function getStateMandis(commodity){
	state_mandis = COMMODITY_MAP["state_mandi"][commodity];
	return state_mandis;
}

function getMandisByState(state, commodity){
	mandis = COMMODITY_MAP["state_mandi"][commodity][state];
	return mandis;
}

function getStatesByCommodity(commodity){
	state_mandis = COMMODITY_MAP["state_mandi"][commodity];
	return Object.keys(state_mandis);
}

function getCommdity(){
	state_mandis = COMMODITY_MAP["state_mandi"];
	return Object.keys(state_mandis);
}


// ---------------------

function loadSelect(select_id, template_string, default_val=null){
	// console.log(select_id);
	$("#" + select_id).formSelect().empty();
	$("#" + select_id).formSelect().append(template_string);
	$("#" + select_id).formSelect();

	if(default_val){
		setSelectVal(select_id, default_val);
	}

	// trigger change event

	$("#" + select_id).trigger("change");
}

function setSelectVal(select_id, val){
	$("#" + select_id).val(val);
	$("#" + select_id).formSelect();
}

function getSelectVal(select_id){
	return $("#" + select_id).val();
}

// on page load set default_commdity

function setCommdotiySelect(){
	id  = id_select_commodity;
	commdity_list = getCommdity();

	var innerHtml = ``;
	for(commodity of commdity_list){
		if(commodity == DEFAULT_COMMDITY){
			innerHtml += `<option value="${commodity}" selected> ${commodity}</option>`;
		}else{
			innerHtml += `<option value="${commodity}"> ${commodity}</option>`;
		}
		
	}

	$("#" + id_select_commodity).on('change', function() {
		SELECTED_COMMODITY = $(this).val();
		reSequence()

	});

	loadSelect(id, innerHtml);

}



// set default state mandi
function setStateMandiSelect(){
	states =  getStatesByCommodity(SELECTED_COMMODITY);


	var innerHtml = ``;
	for(state of states){
		innerHtml += `<option value="${state}"> ${state}</option>`;
	}

	default_state_mandi = getDefaultMandis(SELECTED_COMMODITY);

	state1 = default_state_mandi[0]["state"]
	state2 = default_state_mandi[1]["state"]
	state3 = default_state_mandi[2]["state"]


	mandi1 = default_state_mandi[0]["mandi"]
	mandi2 = default_state_mandi[1]["mandi"]
	mandi3 = default_state_mandi[2]["mandi"]




	// ---- forecast
	loadSelect(id_select_state1_forecast, innerHtml, state1);
	loadSelect(id_select_state2_forecast, innerHtml, state2);
	loadSelect(id_select_state3_forecast, innerHtml, state3);

	setMandiSelect(id_select_state1_forecast, id_select_mandi1_forecast, mandi1);
	setMandiSelect(id_select_state2_forecast, id_select_mandi2_forecast, mandi2);
	setMandiSelect(id_select_state3_forecast, id_select_mandi3_forecast, mandi3);
	// -----



	loadSelect(id_select_state1_1yr, innerHtml, state1);
	loadSelect(id_select_state2_1yr, innerHtml, state2);
	loadSelect(id_select_state3_1yr, innerHtml, state3);

	setMandiSelect(id_select_state1_1yr, id_select_mandi1_1yr, mandi1);
	setMandiSelect(id_select_state2_1yr, id_select_mandi2_1yr, mandi2);
	setMandiSelect(id_select_state3_1yr, id_select_mandi3_1yr, mandi3);


	// ------
	loadSelect(id_select_state1_arrival_mandi, innerHtml, state1);
	loadSelect(id_select_state2_arrival_mandi, innerHtml, state2);
	loadSelect(id_select_state3_arrival_mandi, innerHtml, state3);

	setMandiSelect(id_select_state1_arrival_mandi, id_select_mandi1_arrival_mandi, mandi1);
	setMandiSelect(id_select_state2_arrival_mandi, id_select_mandi2_arrival_mandi, mandi2);
	setMandiSelect(id_select_state3_arrival_mandi, id_select_mandi3_arrival_mandi, mandi3);


	//------
	loadSelect(id_select_state1_mandi_retail, innerHtml, state1);
	loadSelect(id_select_state2_mandi_retail, innerHtml, state2);
	loadSelect(id_select_state3_mandi_retail, innerHtml, state3);

	setMandiSelect(id_select_state1_mandi_retail, id_select_mandi1_mandi_retail, mandi1);
	setMandiSelect(id_select_state2_mandi_retail, id_select_mandi2_mandi_retail, mandi2);
	setMandiSelect(id_select_state3_mandi_retail, id_select_mandi3_mandi_retail, mandi3);

	// ----
	loadSelect(id_select_state1_volatility, innerHtml, state1);
	loadSelect(id_select_state2_volatility, innerHtml, state2);
	loadSelect(id_select_state3_volatility, innerHtml, state3);

	setMandiSelect(id_select_state1_volatility, id_select_mandi1_volatility, mandi1);
	setMandiSelect(id_select_state2_volatility, id_select_mandi2_volatility, mandi2);
	setMandiSelect(id_select_state3_volatility, id_select_mandi3_volatility, mandi3);





	//todo add more

}

function setMandiSelect(state_select_id, mandi_select_id, default_val=null){
	// console.log("state select id", state_select_id)
	state = getSelectVal(state_select_id);
	mandis = getMandisByState(state, SELECTED_COMMODITY);

	var innerHtml = ``;
	for(mandi of mandis){
		innerHtml += `<option value="${mandi}"> ${mandi}</option>`;
	}

	loadSelect(mandi_select_id, innerHtml, default_val);

}


function setOnchange(){


	$(`#id_select_state1_forecast`).on('change', function() {
			setMandiSelect(`id_select_state1_forecast`, `id_select_mandi1_forecast`)
	});
	$(`#id_select_mandi1_forecast`).on('change', function() {
		state_name = getSelectVal(`id_select_state1_forecast`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 1
		requestPlotChart_forecast(state_name, mandi_name, commodity_name, chart_column)
		
	});




	$(`#id_select_state1_1yr`).on('change', function() {
			setMandiSelect(`id_select_state1_1yr`, `id_select_mandi1_1yr`)
	});


	// Mandi change=>plot new plots
	$(`#id_select_mandi1_1yr`).on('change', function() {
		state_name = getSelectVal(`id_select_state1_1yr`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 1
		requestPlotChart_1yr(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state1_arrival_mandi`).on('change', function() {
			setMandiSelect(`id_select_state1_arrival_mandi`, `id_select_mandi1_arrival_mandi`)
	});

	$(`#id_select_mandi1_arrival_mandi`).on('change', function() {
		state_name = getSelectVal(`id_select_state1_arrival_mandi`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 1
		requestPlotChart_arrival_vs_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state1_mandi_retail`).on('change', function() {
			setMandiSelect(`id_select_state1_mandi_retail`, `id_select_mandi1_mandi_retail`)
	});

	$(`#id_select_mandi1_mandi_retail`).on('change', function() {
		state_name = getSelectVal(`id_select_state1_mandi_retail`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 1
		requestPlotChart_mandi_vs_retail(state_name, mandi_name, commodity_name, chart_column)
		
	});

	//---
	$(`#id_select_state1_volatility`).on('change', function() {
			setMandiSelect(`id_select_state1_volatility`, `id_select_mandi1_volatility`)
	});

	$(`#id_select_mandi1_volatility`).on('change', function() {
		state_name = getSelectVal(`id_select_state1_volatility`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 1
		requestPlotChart_volatility_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});


	// =======
	$(`#id_select_state2_forecast`).on('change', function() {
			setMandiSelect(`id_select_state2_forecast`, `id_select_mandi2_forecast`)
	});
	$(`#id_select_mandi2_forecast`).on('change', function() {
		state_name = getSelectVal(`id_select_state2_forecast`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 2
		requestPlotChart_forecast(state_name, mandi_name, commodity_name, chart_column)
		
	});



	$(`#id_select_state2_1yr`).on('change', function() {
			setMandiSelect(`id_select_state2_1yr`, `id_select_mandi2_1yr`)
	});


	// Mandi change=>plot new plots
	$(`#id_select_mandi2_1yr`).on('change', function() {
		state_name = getSelectVal(`id_select_state2_1yr`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 2
		requestPlotChart_1yr(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state2_arrival_mandi`).on('change', function() {
			setMandiSelect(`id_select_state2_arrival_mandi`, `id_select_mandi2_arrival_mandi`)
	});

	$(`#id_select_mandi2_arrival_mandi`).on('change', function() {
		state_name = getSelectVal(`id_select_state2_arrival_mandi`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 2
		requestPlotChart_arrival_vs_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state2_mandi_retail`).on('change', function() {
			setMandiSelect(`id_select_state2_mandi_retail`, `id_select_mandi2_mandi_retail`)
	});

	$(`#id_select_mandi2_mandi_retail`).on('change', function() {
		state_name = getSelectVal(`id_select_state2_mandi_retail`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 2
		requestPlotChart_mandi_vs_retail(state_name, mandi_name, commodity_name, chart_column)
		
	});

	//---
	$(`#id_select_state2_volatility`).on('change', function() {
			setMandiSelect(`id_select_state2_volatility`, `id_select_mandi2_volatility`)
	});

	$(`#id_select_mandi2_volatility`).on('change', function() {
		state_name = getSelectVal(`id_select_state2_volatility`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 2
		requestPlotChart_volatility_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// =======
	$(`#id_select_state3_forecast`).on('change', function() {
			setMandiSelect(`id_select_state3_forecast`, `id_select_mandi3_forecast`)
	});
	$(`#id_select_mandi3_forecast`).on('change', function() {
		state_name = getSelectVal(`id_select_state3_forecast`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column = 3
		requestPlotChart_forecast(state_name, mandi_name, commodity_name, chart_column)
		
	});



	$(`#id_select_state3_1yr`).on('change', function() {
			setMandiSelect(`id_select_state3_1yr`, `id_select_mandi3_1yr`)
	});


	// Mandi change=>plot new plots
	$(`#id_select_mandi3_1yr`).on('change', function() {
		state_name = getSelectVal(`id_select_state3_1yr`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column  = 3
		requestPlotChart_1yr(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state3_arrival_mandi`).on('change', function() {
			setMandiSelect(`id_select_state3_arrival_mandi`, `id_select_mandi3_arrival_mandi`)
	});

	$(`#id_select_mandi3_arrival_mandi`).on('change', function() {
		state_name = getSelectVal(`id_select_state3_arrival_mandi`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column  = 3
		requestPlotChart_arrival_vs_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});

	// ------
	$(`#id_select_state3_mandi_retail`).on('change', function() {
			setMandiSelect(`id_select_state3_mandi_retail`, `id_select_mandi3_mandi_retail`)
	});

	$(`#id_select_mandi3_mandi_retail`).on('change', function() {
		state_name = getSelectVal(`id_select_state3_mandi_retail`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column  = 3
		requestPlotChart_mandi_vs_retail(state_name, mandi_name, commodity_name, chart_column)
		
	});

	//---
	$(`#id_select_state3_volatility`).on('change', function() {
			setMandiSelect(`id_select_state3_volatility`, `id_select_mandi3_volatility`)
	});

	$(`#id_select_mandi3_volatility`).on('change', function() {
		state_name = getSelectVal(`id_select_state3_volatility`);
		mandi_name = $(this).val();
		commodity_name = SELECTED_COMMODITY
		chart_column  = 3
		requestPlotChart_volatility_mandi(state_name, mandi_name, commodity_name, chart_column)
		
	});

}


function InitializeSequence(){
	getCommodityMap()
	.then(data=>{
		setCommdotiySelect();
		setOnchange();
		setStateMandiSelect();

		plotDispersion();
    	plotMostVolatile();
		

	});	
}

function reSequence(){
	setStateMandiSelect();

	plotDispersion();
    plotMostVolatile();
}





