commodity_img = {
	"POTATO": "POTATO.png",
	"ONION": "ONION.png",
	"TOMATO": "TOMATO.png",
	"RICE": "RICE.png",
	"SUGAR": "SUGAR.png",
	"MUSTARD OIL": "MUSTARD_OIL.png",
	"MASUR DAL": "MASUR_DAL.png", 
	"GREEN GRAM DAL (MOONG DAL)": "MOONG_DAL.png",
}





page_1st = true;

function getNewsFeed(){
	console.log("getNewsFeed")
	$("#id_news_list").empty();
	date = $("#id_news_feed_date").val();
	commodity = $("#id_news_feed_commoodity").val();
	// showNewsFeedByDate(date, commodity);
	showNonAnomalousAndArticleNewsFeedByDate(date, commodity)
	showAnomalousAndArticleNewsFeedByDate(date, commodity);
	showAnomalousAndNoArticleNewsFeedByDate(date, commodity);
	showVolatilityNewsFeedByDate(date, commodity);

	showMostAnomolousMandi(date, commodity)


	SELECTED_COMMODITY = capitalizeFirstLetter(commodity);

	if(SELECTED_COMMODITY == "All") showMostAnomolousCommodity(date);

	if(SELECTED_COMMODITY == "All") SELECTED_COMMODITY = "Onion";
	if(!page_1st){
		reSequence();
	}
	page_1st = false;
}


function setEvent(date, commodity="ALL"){
	$("#id_news_feed_date").val(date);
	$("#id_news_feed_commoodity").val(commodity);
	getNewsFeed();
}


///////////////////volatilty///////////////

function showVolatilityNewsFeedByDate(date, commodity){
	data = {
		date,
		commodity,
	}

	requestPostData("/agri_req/getVolatilityNewsFeedByDate", {"data": data})
	.then(data=> {
		
		news_data = data["news"];
		setVolatilityNewsFeedByDate(news_data);


	});
}


function setVolatilityNewsFeedByDate(vol_news_data){
	var html = ``;
	console.log(vol_news_data);
	for(var i = 0; i < vol_news_data.length; i++){
		data = vol_news_data[i]

		mandi_name = data["MANDINAME"];
		state_name = data["STATENAME"];
		commodity_name = data["COMMODITY"];
		date = data["DATE"];


		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span class="news_title"> <span class="news_mandi_name">${mandi_name}</span> (${state_name})  is the most <span class="news_kw">volatile</span> mandis for ${commodity_name} </span>
					</div>

					<div class="col s2">
						<button class="launch_button secondary-content" onclick="requestVolatilityModal('${commodity_name}', '${date}')">
							<i class="material-icons">launch</i>
						</button>
					</div>

				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

	// console.log(html);
}

function requestVolatilityModal(commodity, date){
	// set content volatility modal;
	// date = $("#id_news_feed_date").val();
	data = {
		commodity,
		date,
	}

	requestPostData("/agri_req/getMostVolatileMandiByDate", {"data": data})
	.then(data=> {
		console.log(data);
		mandi_name = data["mandi_name"];
		state_name = data["state_name"];
		vol = data["vol"];

		// plot
		plotMostVolatileModal("most_volatile_chart_news_feed_modal", mandi_name, state_name, vol);

		$("#volatileModal").modal('open');

	});
}



function plotMostVolatileModal(chart_id, mandi_name, state_name, vol){
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
			scales: {
				xAxes: [{
					ticks:{
						min: 0.05,
					}
				}],
			},
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



///////////////////volatilty end///////////////





///////////////////Anomalous + Article///////////////
function showAnomalousAndArticleNewsFeedByDate(date, commodity){
	data = {
		date,
		commodity,
	}
	requestPostData("/agri_req/getAnomalousAndArticleNewsFeedByDate", {"data": data})
	.then(data=> {
		
		news_data = data["news"];
		setAnomalousAndArticleNewsFeedByDate(news_data);


	});
}
function setAnomalousAndArticleNewsFeedByDate(news_data){
	var html = ``;
	console.log(news_data);
	for(var i = 0; i < news_data.length; i++){
		data = news_data[i]

		commodity_name = data["COMMODITY"];
		published_date = data["PUBLISHEDDATE"];
		article_url = data["ARTICLEURL"];
		article_title = data["ARTICLETITLE"];
		center_name = data["CENTRENAME"];
		center_type = data["CENTERTYPE"]; // MANDI/RETAIL 
		state_name = data["STATENAME"];
		mandi_name = data["MANDINAME"];
		start_date = data["STARTDATE"];

		page_url = `/agri_req/get_commodity_page/${commodity_name}/${mandi_name}/${state_name}/${published_date}`


		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span>${start_date}</span>
						<br>
						<span class="news_title">Price <span class="news_kw">anomaly</span> likely in ${commodity_name} at  <span class="news_mandi_name">${capitalizeFirstLetter(center_name)}</span> ${center_type.toLowerCase()} </span>
						<br>
					</div>

					<div class="col s2">
						<a href="${page_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>

					<div class="col s12">
						<br>
							<ul>
								<li class="rel_news_list">
									<span class="rel_news_title">${article_title}</span>
									<a href="${article_url}" class="" target="_blank">
										<i class="material-icons" style="font-size: 15px">launch</i>
									</a>
								</li>
							</ul>
					</div>
				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

}


///////////////////end Anomalous + Article //////////////






///////////////////Anomalous + No Article///////////////

function showAnomalousAndNoArticleNewsFeedByDate(date, commodity){
	data = {
		date,
		commodity,
	}

	requestPostData("/agri_req/getAnomalousAndNoArticleNewsFeedByDate", {"data": data})
	.then(data=> {
		
		news_data = data["news"];
		setAnomalousAndNoArticleNewsByDate(news_data);


	});
}

function setAnomalousAndNoArticleNewsByDate(news_data){
	var html = ``;
	console.log(news_data);
	for(var i = 0; i < news_data.length; i++){
		data = news_data[i]

		commodity_name = data["COMMODITY"];
		center_name = data["CENTRENAME"];
		center_type = data["CENTERTYPE"]; // MANDI/RETAIL 
		state_name = data["STATENAME"];
		mandi_name = data["MANDINAME"];
		start_date = data["STARTDATE"];
		end_date = data["ENDDATE"];
		

		page_url = `/agri_req/get_commodity_page/${commodity_name}/${mandi_name}/${state_name}/${end_date}`


		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span>${start_date}</span>
						<br>
						<span class="news_title">Price <span class="news_kw">anomaly</span> likely in ${commodity_name} at  <span class="news_mandi_name">${capitalizeFirstLetter(center_name)}</span> ${center_type.toLowerCase()} </span>
					</div>

					<div class="col s2">
						<a href="${page_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>
				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

}

///////////////////end Anomalous + no Article //////////////



///////////////////Non Anomalous +  Article //////////////

async function showNonAnomalousAndArticleNewsFeedByDate(date, commodity){
	data = {
		date,
		commodity,
	}

	let news_data = await requestPostData("/agri_req/getNonAnomalousAndArticleNewsFeedByDate", {"data": data});
	news_data = news_data["news"];

	setNonAnomalousAndArticleNewsByDate(news_data);

}

function setNonAnomalousAndArticleNewsByDate(news_data){
	var html = ``;
	console.log(news_data);
	for(var i = 0; i < news_data.length; i++){
		data = news_data[i]

		commodity_name = data["COMMODITY"];
		published_date = data["PUBLISHEDDATE"]
		article_url = data["ARTICLEURL"]
		article_title = data["ARTICLETITLE"]


		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span>${published_date}</span>
						<br>
						<span class="news_title">${article_title}</span>
					</div>

					<div class="col s2">
						<a href="${article_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>
				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

}


///////////////////END Non Anomalous +  Article //////////////






///////////////////// Show most anomoulus mandi\\\\\\\\\\\\\\

async function showMostAnomolousMandi(date, commodity){
	if(commodity == "ALL") return;
	data = {
		date,
		commodity,
	}

	let response = await requestPostData("/agri_req/getMostAnomolousMandi", {"data": data});
	anomaly_data = response["anomaly_data"]

	setMostAnomolousMandi(anomaly_data);

}


function setMostAnomolousMandi(anomaly_data){

	var html = ``;
	for(var i = 0; i < anomaly_data.length; i++){
		data = anomaly_data[i]

		commodity_name = data["COMMODITY"];
		mandi_name = data["MANDINAME"];
		state_name = data["STATENAME"];
		date = data["DATE"];

		page_url = `/agri_req/get_commodity_page/${commodity_name}/${mandi_name}/${state_name}/${date}`



		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span class="news_title"> <span class="news_mandi_name">${mandi_name}</span> (${state_name})  is the most <span class="news_kw">Anomalous</span> mandis for ${commodity_name} </span>
					</div>
					<div class="col s2">
						<a href="${page_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>

					
				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

}




///////////////////// END most anomoulus mandi\\\\\\\\\\\\\\



///////////////////// Show most anomoulus commodity\\\\\\\\\\\\\\

async function showMostAnomolousCommodity(date){
	data = {
		date,
	}

	let response = await requestPostData("/agri_req/getAnomolousCommodity", {"data": data});
	anomaly_data = response["anomaly_data"]

	setMostAnomolousCommodity(anomaly_data);

}


function setMostAnomolousCommodity(anomaly_data){

	var html = ``;
	for(var i = 0; i < anomaly_data.length; i++){
		data = anomaly_data[i]

		commodity_name = data["COMMODITY"].toUpperCase();
		date = data["DATE"];

		let mandi_state = COMMODITY_MAP["default_select"]?.[commodity_name]?.[0]
		mandi_name = mandi_state?.["mandi"]
		state_name = mandi_state?.["state"]

		page_url = `/agri_req/get_commodity_page/${commodity_name}/${mandi_name}/${state_name}/${date}`



		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span class="news_title"> <span class="news_mandi_name">${commodity_name}</span> is the most <span class="news_kw">Anomalous</span> Commodity</span>
					</div>
					<div class="col s2">
						<a href="${page_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>

					
				</div>
			</li>

		`
	}

	$("#id_news_list").append(html);

}




///////////////////// END most anomoulus commodity\\\\\\\\\\\\\\








function showNewsFeedByDate(date, commodity){

	data = {
		date,
		commodity	
	}

	console.log(data)

	requestPostData("/agri_req/getNewsByDate", {"data": data})
	.then(data=> {
		console.log(data);
		
		news_data = data["news"];
		setNewsFeedByDate(news_data);


	});
}


function setNewsFeedByDate(news_list){
	var html = ``;
	// $("#id_news_list").empty();

	// if(news_list.length == 0){
	// 	$("#id_news_list").append(`<span>No news found</span>`)
	// }

	for(var i = 0; i < news_list.length; i++){
		data = news_list[i]

		commodity_name = data["COMMODITY"];

		published_date = data["PUBLISHEDDATE"];
		article_url = data["ARTICLEURL"];
		article_title = data["ARTICLETITLE"];



		html += `
			<li class="collection-item">
				<div class="row" style="margin-bottom: 0px">
					<div class="col s2">
						<span style="float: left;"> <img class="responsive-img" style="height: 40px" src="/agri_static/home/img/${commodity_img[commodity_name]}" alt=""></span>
					</div>
					<div class="col s8">
						<span>${published_date}</span>
						<br>
						<span class="news_title">${article_title}</span>
						
					</div>

					<div class="col s2">
						<a href="${article_url}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>
				</div>
			</li>


		`

	}
	$("#id_news_list").append(html);

}

