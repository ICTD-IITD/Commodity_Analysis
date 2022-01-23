commodity_img={"POTATO":"POTATO.png","ONION":"ONION.png","TOMATO":"TOMATO.png","RICE":"RICE.png","SUGAR":"SUGAR.png","MUSTARD OIL":"MUSTARD_OIL.png","MASUR DAL":"MASUR_DAL.png","GREEN GRAM DAL (MOONG DAL)":"MOONG_DAL.png",}
$(document).ready(function(){today=new Date();$('.datepicker').datepicker({"format":"yyyy-mm-dd","maxDate":today,"defaultDate":new Date(2020,3,30),"selectMonths":true,"autoClose":true,});$('#id_news_feed_date').val("2020-3-30");getNewsFeed();});function getNewsFeed(){console.log("getNewsFeed")
date=$("#id_news_feed_date").val();commodity=$("#id_news_feed_commoodity").val();showNewsFeedByDate(date,commodity);showAnomalousAndArticleNewsFeedByDate(date,commodity);showAnomalousAndNoArticleNewsFeedByDate(date,commodity);showVolatilityNewsFeedByDate(date,commodity);}
function setEvent(date,commodity="ALL"){$("#id_news_feed_date").val(date);$("#id_news_feed_commoodity").val(commodity);getNewsFeed();}
function showVolatilityNewsFeedByDate(date,commodity){data={date,commodity,}
requestPostData("/agri_req/getVolatilityNewsFeedByDate",{"data":data}).then(data=>{news_data=data["news"];setVolatilityNewsFeedByDate(news_data);});}
function setVolatilityNewsFeedByDate(vol_news_data){var html=``;console.log(vol_news_data);for(var i=0;i<vol_news_data.length;i++){data=vol_news_data[i]
mandi_name=data["MANDINAME"];state_name=data["STATENAME"];commodity_name=data["COMMODITY"];date=data["DATE"];html+=`
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

		`}
$("#id_news_list").append(html);}
function requestVolatilityModal(commodity,date){data={commodity,date,}
requestPostData("/agri_req/getMostVolatileMandiByDate",{"data":data}).then(data=>{console.log(data);mandi_name=data["mandi_name"];state_name=data["state_name"];vol=data["vol"];plotMostVolatileModal("most_volatile_chart",mandi_name,state_name,vol);$("#volatileModal").modal('open');});}
function plotMostVolatileModal(chart_id,mandi_name,state_name,vol){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');var label=[]
var bgColor=[]
for(var i=0;i<Math.min(11,mandi_name.length);i++){if(state_name[i]==""){bgColor.push("orange")
label.push(mandi_name[i])}else{bgColor.push("#5383b0")
label.push(mandi_name[i]+" ("+state_name[i]+")")}}
s1={labels:label,datasets:[{backgroundColor:bgColor,data:vol}]}
var myHorizontalBar=new Chart(ctx,{type:'horizontalBar',data:s1,options:{title:{display:true,text:'10 Most Volatile Mandis'},legend:{display:false,},}});chart_dict[chart_id]=myHorizontalBar}
function showAnomalousAndArticleNewsFeedByDate(date,commodity){data={date,commodity,}
requestPostData("/agri_req/getAnomalousAndArticleNewsFeedByDate",{"data":data}).then(data=>{news_data=data["news"];setAnomalousAndArticleNewsFeedByDate(news_data);});}
function setAnomalousAndArticleNewsFeedByDate(news_data){var html=``;console.log(news_data);for(var i=0;i<news_data.length;i++){data=news_data[i]
commodity_name=data["COMMODITY"];published_date=data["PUBLISHEDDATE"];article_url=data["ARTICLEURL"];article_title=data["ARTICLETITLE"];center_name=data["CENTRENAME"];center_type=data["CENTERTYPE"];state_name=data["STATENAME"];mandi_name=data["MANDINAME"];start_date=data["STARTDATE"];html+=`
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
						<a href="/agri_req/landing_page/${commodity_name}" class="secondary-content" target="_blank">
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

		`}
$("#id_news_list").append(html);}
function showAnomalousAndNoArticleNewsFeedByDate(date,commodity){data={date,commodity,}
requestPostData("/agri_req/getAnomalousAndNoArticleNewsFeedByDate",{"data":data}).then(data=>{news_data=data["news"];setAnomalousAndNoArticleNewsByDate(news_data);});}
function setAnomalousAndNoArticleNewsByDate(news_data){var html=``;console.log(news_data);for(var i=0;i<news_data.length;i++){data=news_data[i]
commodity_name=data["COMMODITY"];center_name=data["CENTRENAME"];center_type=data["CENTERTYPE"];state_name=data["STATENAME"];mandi_name=data["MANDINAME"];start_date=data["STARTDATE"];html+=`
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
						<a href="/agri_req/landing_page/${commodity_name}" class="secondary-content" target="_blank">
							<i class="material-icons">launch</i>
						</a>
					</div>
				</div>
			</li>

		`}
$("#id_news_list").append(html);}
function showNewsFeedByDate(date,commodity){data={date,commodity}
console.log(data)
requestPostData("/agri_req/getNewsByDate",{"data":data}).then(data=>{console.log(data);news_data=data["news"];setNewsFeedByDate(news_data);});}
function setNewsFeedByDate(news_list){var html=``;$("#id_news_list").empty();for(var i=0;i<news_list.length;i++){data=news_list[i]
commodity_name=data["COMMODITY"];published_date=data["PUBLISHEDDATE"];article_url=data["ARTICLEURL"];article_title=data["ARTICLETITLE"];html+=`
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


		`}
$("#id_news_list").append(html);}