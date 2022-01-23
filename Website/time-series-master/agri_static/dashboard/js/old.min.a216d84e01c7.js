$(document).ready(function(){setCSRF();setScrollButton();setPotatoChart();setOnionChart();setHistory();});function setScrollButton(){$(window).scroll(function(){if($(this).scrollTop()>50){$('#back-to-top').fadeIn();}else{$('#back-to-top').fadeOut();}});$('#back-to-top').click(function(){$('body,html').animate({scrollTop:0},400);return false;});}
function setPotatoChart(){plotChart(type=1,id="plot_mandi_potato_lucknow_1",item="potato",mandi="lucknow",source="mandi",title="Recent 30 days potato price",185,2500);plotChart(type=1,id="plot_mandi_potato_kolkata_1",item="potato",mandi="kolkata",source="mandi",title="Recent 30 days potato price",185,2500);plotChart(type=2,id="plot_mandi_potato_lucknow_2",item="potato",mandi="lucknow",source="mandi",title="Last 1 year potato price",185,2500);plotChart(type=2,id="plot_mandi_potato_kolkata_2",item="potato",mandi="kolkata",source="mandi",title="Last 1 year potato price",185,2500);plotChart(type=3,id="plot_mandi_potato_lucknow_3",item="potato",mandi="lucknow",source="mandi",title="Full potato price",185,2500);plotChart(type=3,id="plot_mandi_potato_kolkata_3",item="potato",mandi="kolkata",source="mandi",title="Full potato price",185,2500);plotChart(type=1,id="plot_retail_potato_lucknow_1",item="potato",mandi="lucknow",source="retail",title="Recent 30 days potato price",400,3100);plotChart(type=1,id="plot_retail_potato_kolkata_1",item="potato",mandi="kolkata",source="retail",title="Recent 30 days potato price",400,3100);plotChart(type=2,id="plot_retail_potato_lucknow_2",item="potato",mandi="lucknow",source="retail",title="Last 1 year potato price",400,3100);plotChart(type=2,id="plot_retail_potato_kolkata_2",item="potato",mandi="kolkata",source="retail",title="Last 1 year potato price",400,3100);plotChart(type=3,id="plot_retail_potato_lucknow_3",item="potato",mandi="lucknow",source="retail",title="Full potato price",400,3100);plotChart(type=3,id="plot_retail_potato_kolkata_3",item="potato",mandi="kolkata",source="retail",title="Full potato price",400,3100);}
function setOnionChart(){plotChart(type=1,id="plot_mandi_onion_mumbai_1",item="onion",mandi="mumbai",source="mandi",title="Recent 30 days onion price",min_y=101,max_y=12000);plotChart(type=1,id="plot_mandi_onion_bangalore_1",item="onion",mandi="bangalore",source="mandi",title="Recent 30 days onion price",min_y=101,max_y=12000);plotChart(type=1,id="plot_mandi_onion_delhi_1",item="onion",mandi="delhi",source="mandi",title="Recent 30 days onion price",min_y=101,max_y=12000);plotChart(type=2,id="plot_mandi_onion_mumbai_2",item="onion",mandi="mumbai",source="mandi",title="Last 1 year onion price",min_y=101,max_y=12000);plotChart(type=2,id="plot_mandi_onion_bangalore_2",item="onion",mandi="bangalore",source="mandi",title="Last 1 year onion price",min_y=101,max_y=12000);plotChart(type=2,id="plot_mandi_onion_delhi_2",item="onion",mandi="delhi",source="mandi",title="Last 1 year onion price",min_y=101,max_y=12000);plotChart(type=3,id="plot_mandi_onion_mumbai_3",item="onion",mandi="mumbai",source="mandi",title="Full onion price",min_y=101,max_y=12000);plotChart(type=3,id="plot_mandi_onion_bangalore_3",item="onion",mandi="bangalore",source="mandi",title="Full onion price",min_y=101,max_y=12000);plotChart(type=3,id="plot_mandi_onion_delhi_3",item="onion",mandi="delhi",source="mandi",title="Full onion price",min_y=101,max_y=12000);plotChart(type=1,id="plot_retail_onion_mumbai_1",item="onion",mandi="mumbai",source="retail",title="Recent 30 days onion price",400,15000);plotChart(type=1,id="plot_retail_onion_bangalore_1",item="onion",mandi="bangalore",source="retail",title="Recent 30 days onion price",400,15000);plotChart(type=1,id="plot_retail_onion_delhi_1",item="onion",mandi="delhi",source="retail",title="Recent 30 days onion price",400,15000);plotChart(type=2,id="plot_retail_onion_mumbai_2",item="onion",mandi="mumbai",source="retail",title="Last 1 year onion price",400,15000);plotChart(type=2,id="plot_retail_onion_bangalore_2",item="onion",mandi="bangalore",source="retail",title="Last 1 year onion price",400,15000);plotChart(type=2,id="plot_retail_onion_delhi_2",item="onion",mandi="delhi",source="retail",title="Last 1 year onion price",400,15000);plotChart(type=3,id="plot_retail_onion_mumbai_3",item="onion",mandi="mumbai",source="retail",title="Full onion price",400,15000);plotChart(type=3,id="plot_retail_onion_bangalore_3",item="onion",mandi="bangalore",source="retail",title="Full onion price",400,15000);plotChart(type=3,id="plot_retail_onion_delhi_3",item="onion",mandi="delhi",source="retail",title="Full onion price",400,15000);}
function plotChart(type=1,id="",item="",mandi="",source="",title="",min_y,max_y){var data_to_send={type,item,mandi,source,};requestPostData("/dashboard/getDashBoardData",{data:data_to_send}).then(data=>{console.log("data recieved")
console.log(data)
x=[]
y=[]
if(type==1){past=data["past"]
pred=data["pred"]
past_orig_x=past[0][0]
past_orig_y=past[0][1]
past_miss_x=past[1][0]
past_miss_y=past[1][1]
pred_x=pred[0]
pred_y=pred[1]
x.push(past_orig_x,past_miss_x,pred_x)
y.push(past_orig_y,past_miss_y,pred_y)}
else{orig=data["orig"]
miss=data["miss"]
orig_x=orig[0]
orig_y=orig[1]
miss_x=miss[0]
miss_y=miss[1]
x.push(orig_x,miss_x)
y.push(orig_y,miss_y)}
anamolies=null
plotTimeSeries(id,x,y,type,item,title,source,min_y,max_y);})}
function plotTimeSeries(id,x,y,type,item,title,source,min_y,max_y){y_title="Price in ₹ per 100 kg";measure="price";if(source=="arrival"){y_title="Tonnes";measure="arrival"}
var data={}
if(type==1){data=[{x:x[0],y:y[0],type:'scatter',mode:"lines+markers",line:{},name:`${item} ${measure} past original`,connectgaps:false},{x:x[1],y:y[1],type:'scatter',mode:'lines+markers',line:{'color':"red",'dash':'dot'},name:`${item} ${measure} past missing`,connectgaps:false},{x:x[2],y:y[2],type:'dashed',name:`${item} ${measure} predicted`,connectgaps:false,mode:'lines',line:{dash:'dot',width:4,color:"yellow"}},]}else{data=[{x:x[0],y:y[0],type:'scatter',mode:"lines",line:{width:4,},name:`original`,connectgaps:false},{x:x[1],y:y[1],type:'scatter',mode:"lines",line:{color:"red",width:2,},name:`missing`,connectgaps:false},];}
var layout={width:'1000px',height:'500px',title:title,showlegend:true,automargin:true,xaxis:{title:{text:"Date",},fixedrange:true,},yaxis:{title:{text:y_title,},range:[min_y,max_y],fixedrange:true,},};var config={displayModeBar:false};plt=Plotly.newPlot(id,data,layout,config);console.log(plt)}
function requestPostData(url,data){data={...data,_token:csrf_token}
return new Promise((resolve,reject)=>{$.ajax({url:url,type:'POST',async:false,contentType:'application/json',data:JSON.stringify(data),dataType:"json",processData:false,success:function(data,textStatus,jQxhr){var data=data["data"]
resolve(data)},error:function(jqXhr,textStatus,errorThrown){console.log(errorThrown)
reject(errorThrown)},});})}
function setHistory(){anomaly_type=$("#onion_anomaly_type").val()
item="onion"
onion_history_select="#onion_history_select"
plot_id="onion_history_plot"
setHistorySelect(item,anomaly_type,onion_history_select,plot_id)
$("#onion_anomaly_type").change(function(event){item="onion"
anomaly_type=$("#onion_anomaly_type").val()
plot_id="onion_history_plot"
setHistorySelect(item,anomaly_type,onion_history_select,plot_id)});$(onion_history_select).change(function(event){item="onion"
anomaly_type=$("#onion_anomaly_type").val()
plot_id="onion_history_plot"
anomaly_id=$(onion_history_select).val()
plot_title=item+" "+anomaly_type+" price anomaly";setPlotHistory(item,anomaly_type,anomaly_id,plot_id,plot_title)});anomaly_type=$("#potato_anomaly_type").val()
item="potato"
potato_history_select="#potato_history_select"
plot_id="potato_history_plot"
setHistorySelect(item,anomaly_type,potato_history_select,plot_id)
$("#potato_anomaly_type").change(function(event){item="potato"
anomaly_type=$("#potato_anomaly_type").val()
plot_id="potato_history_plot"
setHistorySelect(item,anomaly_type,potato_history_select,plot_id)});$(potato_history_select).change(function(event){item="potato"
anomaly_type=$("#potato_anomaly_type").val()
plot_id="potato_history_plot"
anomaly_id=$(potato_history_select).val()
plot_title=item+" "+anomaly_type+" price anomaly";setPlotHistory(item,anomaly_type,anomaly_id,plot_id,plot_title)});}
function setHistorySelect(item,anomaly_type,id,plot_id){data_to_send={anomaly_type,item,}
requestPostData("/dashboard/getAnomalousPeriod",{data:data_to_send}).then(data=>{option_html=""
for(var i=0;i<data.length;i++){option_html+=`
			<option value=${i}> ${data[i]} </option>
			`}
$(id).html(option_html)
anomaly_id=$(id).val()
plot_title=item+" "+anomaly_type+" price anomaly";setPlotHistory(item,anomaly_type,anomaly_id,plot_id,plot_title)});}
function setPlotHistory(item,anomaly_type,anomaly_id,plot_id,plot_title){data_to_send={item,anomaly_type,anomaly_id,}
requestPostData("/dashboard/getAnomalousData",{data:data_to_send}).then(data=>{console.log(data)
plotHistory(plot_id,data,plot_title)})}
function plotHistory(plot_id,data,title){y_title="Price in ₹ per 100 kg"
plot_data=[{x:data["date"],y:data["mandi"],type:'scatter',name:"Mandi Price"},{x:data["date"],y:data["retail"],type:'scatter',name:"Retail Price"},];var layout={width:'1000px',height:'500px',title:title,showlegend:true,automargin:true,xaxis:{title:{text:"Date (29 Days)",},},yaxis:{title:{text:y_title,},},};var config={displayModeBar:false};plt=Plotly.newPlot(plot_id,plot_data,layout,config);}
function setCSRF(){csrf_token=$("input[name=csrfmiddlewaretoken]").val();$("body").bind("ajaxSend",function(elm,xhr,s){if(s.type=="POST"){xhr.setRequestHeader('X-CSRF-Token',csrf_token);}});}