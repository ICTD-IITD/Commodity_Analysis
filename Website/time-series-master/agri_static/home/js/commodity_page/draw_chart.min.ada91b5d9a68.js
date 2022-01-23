function drawChartForecast({chart_id,date,price_original,price_forecast,avg,std,anomaly_dates,anomalous_data,data_label,color}){redraw(chart_id);var ctx=document.getElementById(chart_id).getContext('2d');anomaly=[]
if(data_label!="Arrival"){for(var i=0;i<date.length;i++){if(anomaly_dates.includes(date[i])){anomaly.push(price_forecast[i])}else{anomaly.push(null)}}}
mean_plus_std=avg.map(function(num,idx){return num+std[idx];});mean_minus_std=avg.map(function(num,idx){return num-std[idx];});s0={label:"Forecast",borderColor:"Red",data:price_forecast,fill:false,pointRadius:0,backgroundColor:"Red",pointStyle:'rect',}
s1={label:data_label,borderColor:color,data:price_original,fill:false,pointRadius:0,backgroundColor:color,pointStyle:'rect',}
s2={label:"Avg",borderColor:color,data:avg,borderDash:[5,5],fill:false,pointRadius:0,}
s3={data:mean_minus_std,pointRadius:0,fill:'+1',}
s4={data:mean_plus_std,pointRadius:0,fill:false,}
s5={label:"Anomaly",data:anomaly,fill:false,pointRadius:10,type:'bubble',radius:10,hoverRadius:2,backgroundColor:'red',hoverBackgroundColor:'red',pointStyle:'circle',}
s6={data:anomalous_data,hidden:true,}
datasets=[]
if(data_label=="Arrival"){datasets=[s0,s1]}else{datasets=[s0,s1,s2,s3,s4,s5,s6]}
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:datasets,},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{ticks:{min:0,maxTicksLimit:6,}}]},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex==5)return true;if(legendItem.datasetIndex>=2){return false;}
return true;},usePointStyle:true,}}}});chart_dict[chart_id]=myChart;document.getElementById(chart_id).onclick=function(evt){chart_id=$(this)[0].id;data_type=$(this)[0].dataset.type;myChart=chart_dict[chart_id];var activePoints=myChart.getElementsAtEventForMode(evt,'point',myChart.options);active_point=activePoints.filter(p=>{if(p._datasetIndex==5)return true;return false;})?.[0];if(!active_point)return;var x=myChart.data.labels[active_point._index];var y=myChart.data.datasets[active_point._datasetIndex].data[active_point._index];info=myChart.data.datasets[6].data[0][x];info={...info,data_type,}
showAnomalyModal(info,"forecast")};}
function drawChart1Yr({chart_id,date,original,avg,std,anomaly_dates,anomalous_data,data_label,color}){redraw(chart_id);var ctx=document.getElementById(chart_id).getContext('2d');anomaly=[]
if(data_label!="Arrival"){for(var i=0;i<date.length;i++){if(anomaly_dates.includes(date[i])){anomaly.push(original[i])}else{anomaly.push(null)}}}
mean_plus_std=avg.map(function(num,idx){return num+std[idx];});mean_minus_std=avg.map(function(num,idx){return num-std[idx];});s1={label:data_label,borderColor:color,data:original,fill:false,pointRadius:0,backgroundColor:color,pointStyle:'rect',}
s2={label:"Avg",borderColor:color,data:avg,borderDash:[5,5],fill:false,pointRadius:0,}
s3={data:mean_minus_std,pointRadius:0,fill:'+1',}
s4={data:mean_plus_std,pointRadius:0,fill:false,}
s5={label:"Anomaly",data:anomaly,fill:false,pointRadius:10,type:'bubble',radius:10,hoverRadius:2,backgroundColor:color,hoverBackgroundColor:color,pointStyle:'circle',}
s6={data:anomalous_data,hidden:true,}
datasets=[]
if(data_label=="Arrival"){datasets=[s1]}else{datasets=[s1,s2,s3,s4,s5,s6]}
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:datasets,},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{ticks:{min:0,maxTicksLimit:6,}}]},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex==1)return false;if(legendItem.datasetIndex==4)return true;if(legendItem.datasetIndex>=2){return false;}
return true;},usePointStyle:true,}}}});chart_dict[chart_id]=myChart;document.getElementById(chart_id).onclick=function(evt){chart_id=$(this)[0].id;data_type=$(this)[0].dataset.type;myChart=chart_dict[chart_id];var activePoints=myChart.getElementsAtEventForMode(evt,'point',myChart.options);active_point=activePoints.filter(p=>{if(p._datasetIndex==4)return true;return false;})?.[0];if(!active_point)return;var x=myChart.data.labels[active_point._index];var y=myChart.data.datasets[active_point._datasetIndex].data[active_point._index];info=myChart.data.datasets[5].data[0][x];info={...info,data_type,}
showAnomalyModal(info)};}
function drawChartArrivalVsMandi({chart_id,date,mandi_price,mandi_avg,mandi_std,arrival,color,}){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');mean_plus_std=mandi_avg.map(function(num,idx){return num+mandi_std[idx];});mean_minus_std=mandi_avg.map(function(num,idx){return num-mandi_std[idx];});s1={label:"Mandi Price",borderColor:color,data:mandi_price,fill:false,pointRadius:0,pointStyle:'rect',backgroundColor:color,yAxisID:"axis_1",}
s2={label:"Arrival",data:arrival,pointRadius:0,fill:false,borderColor:"red",backgroundColor:"red",pointStyle:'rect',yAxisID:"axis_2"}
s3={label:"Price Avg",borderColor:color,data:mandi_avg,borderDash:[5,5],fill:false,pointRadius:0,yAxisID:"axis_1"}
s4={data:mean_minus_std,pointRadius:0,fill:'+1',yAxisID:"axis_1"}
s5={data:mean_plus_std,pointRadius:0,fill:false,yAxisID:"axis_1"}
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:[s1,s2,s3,s4,s5],},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{id:"axis_1",position:"left",ticks:{min:0,maxTicksLimit:6,}},{id:"axis_2",position:"right",ticks:{min:0,maxTicksLimit:6,}}]},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex>=2){return false;}
return true;},usePointStyle:true,},}}});chart_dict[chart_id]=myChart;}
function drawChartMandiVsRetail({chart_id,date,mandi_price,mandi_avg,mandi_std,retail_price,retail_avg,retail_std,color,}){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');mean_plus_std_mandi=mandi_avg.map(function(num,idx){return num+mandi_std[idx];});mean_minus_std_mandi=mandi_avg.map(function(num,idx){return num-mandi_std[idx];});mean_plus_std_retail=retail_avg.map(function(num,idx){return num+retail_std[idx];});mean_minus_std_retail=retail_avg.map(function(num,idx){return num-retail_std[idx];});var filtered=mandi_price.filter(function(item){return typeof item=="number"});console.log(Math.max(...mandi_price))
s1={label:"Mandi Price",borderColor:color,data:mandi_price,fill:false,pointRadius:0,backgroundColor:color,pointStyle:'rect'}
s2={label:"Retail Price",data:retail_price,pointRadius:0,fill:false,borderColor:"red",backgroundColor:"red",pointStyle:'rect'}
s3={label:"Mandi Avg",borderColor:color,data:mandi_avg,borderDash:[5,5],fill:false,pointRadius:0,}
s4={data:mean_minus_std_mandi,pointRadius:0,fill:'+1',}
s5={data:mean_plus_std_mandi,pointRadius:0,fill:false,}
s6={label:"Retail Avg",borderColor:'red',data:retail_avg,borderDash:[5,5],fill:false,pointRadius:0,}
s7={data:mean_minus_std_retail,pointRadius:0,fill:'+1',}
s8={data:mean_plus_std_retail,pointRadius:0,fill:false,}
console.log(ctx)
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:[s1,s2,s3,s4,s5,s6,s7,s8],},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{ticks:{min:0,maxTicksLimit:6,}}]},tooltips:{mode:'point'},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex>=2){return false;}
return true;},usePointStyle:true,}}}});chart_dict[chart_id]=myChart;}
function drawChartVolatility({chart_id,date,vol,avg,std,data_label,color,}){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');mean_plus_std=avg.map(function(num,idx){return num+std[idx];});mean_minus_std=avg.map(function(num,idx){return num-std[idx];});s1={label:data_label,borderColor:color,data:vol,fill:false,pointRadius:0,backgroundColor:color,pointStyle:'rect'}
s2={label:"Avg",borderColor:color,data:avg,borderDash:[5,5],fill:false,pointRadius:0,}
s3={data:mean_minus_std,pointRadius:0,fill:'+1',}
s4={data:mean_plus_std,pointRadius:0,fill:false,}
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:[s1,s2,s3,s4],},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{ticks:{beginAtZero:false,maxTicksLimit:6,}}]},tooltips:{mode:'point'},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex>=1){return false;}
return true;},usePointStyle:true,}}}});chart_dict[chart_id]=myChart;}
function drawChartMostVolatile({chart_id,state_name,mandi_name,vol,}){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');var label=[]
var bgColor=[]
for(var i=0;i<Math.min(11,mandi_name.length);i++){if(state_name[i]==""){bgColor.push("orange")
label.push(mandi_name[i])}else{bgColor.push("#5383b0")
label.push(mandi_name[i]+" ("+state_name[i]+")")}}
s1={labels:label,datasets:[{backgroundColor:bgColor,data:vol}]}
var myHorizontalBar=new Chart(ctx,{type:'horizontalBar',data:s1,options:{title:{display:true,text:'10 Most Volatile Mandis'},legend:{display:false,},}});chart_dict[chart_id]=myHorizontalBar}
function drawChartDispersion({chart_id,date,dispersion,avg,std,data_label,color,}){redraw(chart_id)
var ctx=document.getElementById(chart_id).getContext('2d');mean_plus_std=avg.map(function(num,idx){return num+std[idx];});mean_minus_std=avg.map(function(num,idx){return num-std[idx];});s1={label:data_label,borderColor:color,data:dispersion,fill:false,pointRadius:0,backgroundColor:color,pointStyle:'rect'}
s2={label:"Avg",borderColor:color,data:avg,borderDash:[5,5],fill:false,pointRadius:0,}
s3={data:mean_minus_std,pointRadius:0,fill:'+1',}
s4={data:mean_plus_std,pointRadius:0,fill:false,}
let myChart=new Chart(ctx,{type:'line',data:{labels:date,datasets:[s1,s2,s3,s4],},options:{scales:{xAxes:[{type:'time',time:{parser:'YYYY-MM-DD',unit:'day',day:'MMM YY',displayFormats:{day:'MMM YY'}},ticks:{autoSkip:true,maxTicksLimit:12}}],yAxes:[{ticks:{beginAtZero:false,maxTicksLimit:6,}}]},tooltips:{mode:'point'},legend:{labels:{filter:function(legendItem,chartData){if(legendItem.datasetIndex>=1){return false;}
return true;},usePointStyle:true,}}}});chart_dict[chart_id]=myChart;}