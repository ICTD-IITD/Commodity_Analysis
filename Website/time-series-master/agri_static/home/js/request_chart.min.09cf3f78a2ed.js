function requestPlotChart_forecast(state_name,mandi_name,commodity_name,chart_column){date=$("#id_news_feed_date").val();data={commodity_name,mandi_name,state_name,date,}
chart_id=[]
color="green"
if(chart_column==1){chart_id=["forecast_chart11","forecast_chart12","forecast_chart13"]
color="green"}else if(chart_column==2){chart_id=["forecast_chart21","forecast_chart22","forecast_chart23"]
color="blue"}else if(chart_column==3){chart_id=["forecast_chart31","forecast_chart32","forecast_chart33"]
color="Purple"}
plotChartForecast(data,chart_id,color)}
function requestPlotChart_1yr(state_name,mandi_name,commodity_name,chart_column){date=$("#id_news_feed_date").val();data={commodity_name,mandi_name,state_name,date,}
chart_id=[]
color="green"
if(chart_column==1){chart_id=["chart11","chart12","chart13"]
color="green"}else if(chart_column==2){chart_id=["chart21","chart22","chart23"]
color="blue"}else if(chart_column==3){chart_id=["chart31","chart32","chart33"]
color="Purple"}
plotChart(data,chart_id,color)}
function requestPlotChart_arrival_vs_mandi(state_name,mandi_name,commodity_name,chart_column){date=$("#id_news_feed_date").val();data={commodity_name,mandi_name,state_name,date,}
chart_id=[]
color="green"
if(chart_column==1){chart_id="arrival_vs_mandi_chart11"
color="green"}else if(chart_column==2){chart_id="arrival_vs_mandi_chart12"
color="blue"}else if(chart_column==3){chart_id="arrival_vs_mandi_chart13"
color="Purple"}
plotChartArrivalVsMandi(data,chart_id,color)}
function requestPlotChart_mandi_vs_retail(state_name,mandi_name,commodity_name,chart_column){date=$("#id_news_feed_date").val();data={commodity_name,mandi_name,state_name,date,}
chart_id=[]
color="green"
if(chart_column==1){chart_id="mandi_vs_retail_chart11"
color="green"}else if(chart_column==2){chart_id="mandi_vs_retail_chart12"
color="blue"}else if(chart_column==3){chart_id="mandi_vs_retail_chart13"
color="Purple"}
plotChartMandiVsRetail(data,chart_id,color)}
function requestPlotChart_volatility_mandi(state_name,mandi_name,commodity_name,chart_column){date=$("#id_news_feed_date").val();data={commodity_name,mandi_name,state_name,date,}
chart_id=[]
color="green"
if(chart_column==1){chart_id=["vol_mandi_chart11","vol_retail_chart11"]
color="green"}else if(chart_column==2){chart_id=["vol_mandi_chart12","vol_retail_chart12"]
color="blue"}else if(chart_column==3){chart_id=["vol_mandi_chart13","vol_retail_chart13"]
color="Purple"}
plotChartVolatilityMandiRetail(data,chart_id,color)}