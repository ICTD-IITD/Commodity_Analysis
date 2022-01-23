var COMMODITY_MAP = "";
var DEFAULT_COMMDITY = "Onion";
var SELECTED_COMMODITY = "Onion";
function getCommodityMap(){
	data = {};
	requestPostData("/home/get_commodity_map", {"data": data}).
	then(data=>{
		COMMODITY_MAP = data;
		sessionStorage.setItem("COMMODITY_MAP", JSON.stringify(COMMODITY_MAP));
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


// on page load set default_commdity





