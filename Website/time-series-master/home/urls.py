from django.urls import path
from . import views

urlpatterns = [
	# path('', views.base, name='home'),
	

	path('get_forecast', views.get_forecast, name="get_forecast"),
	path('get_mandi_data_1_year', views.get_mandi_data_1_year, name="get_mandi_data_1_year"),
	path('get_commodity_map', views.get_commodity_map, name="get_commodity_map"),
	path('get_arrival_vs_mandi_last_3yr', views.get_arrival_vs_mandi_last_3yr, name="get_arrival_vs_mandi_last_3yr"),
	path('get_mandi_vs_retail_last_3yr', views.get_mandi_vs_retail_last_3yr, name="get_mandi_vs_retail_last_3yr"),
	path('get_volatility_last_3yr', views.get_volatility_last_3yr, name="get_volatility_last_3yr"),
	path('get_dispersion_last_3yr', views.get_dispersion_last_3yr, name="get_dispersion_last_3yr"),
	path('get_dispersion_last_3yr_anomaly', views.get_dispersion_last_3yr_anomaly, name="get_dispersion_last_3yr_anomaly"),
	# path('get_most_volatile_mandi', views.get_most_volatile_mandi, name="get_most_volatile_mandi"),
	path('get_most_dispersed_commodity', views.get_most_dispersed_commodity, name="get_most_dispersed_commodity"),


	path('get_commodity_page/<str:commodity>/<str:mandi>/<str:state>/<str:date>', views.get_commodity_page, name="get_commodity_page"),


	# path('get_forecast_by_date', views.get_forecast_by_date, name="get_forecast_by_date"),
	# path('get_mandi_data_1_year_by_date', views.get_mandi_data_1_year_by_date, name="get_mandi_data_1_year_by_date"),
	# path('get_arrival_vs_mandi_last_3yr_by_date', views.get_arrival_vs_mandi_last_3yr_by_date, name="get_arrival_vs_mandi_last_3yr_by_date"),
	# path('get_mandi_vs_retail_last_3yr_by_date', views.get_mandi_vs_retail_last_3yr_by_date, name="get_mandi_vs_retail_last_3yr_by_date"),
	# path('get_volatility_last_3yr_by_date', views.get_volatility_last_3yr_by_date, name="get_volatility_last_3yr_by_date"),
	# path('get_dispersion_last_3yr_by_date', views.get_dispersion_last_3yr_by_date, name="get_dispersion_last_3yr_by_date"),
	# path('get_most_volatile_mandi', views.get_most_volatile_mandi, name="get_most_volatile_mandi"),
	


	path('getLast1YrNews', views.getLast1YrNews, name='getLast1YrNews'),
	path('getLast3YrNews', views.getLast3YrNews, name='getLast3YrNews'),
	path('getDispersionNews', views.getDispersionNews, name='getDispersionNews'),
	path('getVolatilityNews', views.getVolatilityNews, name='getVolatilityNews'),

	#return most anomolus mandi given commodity
	path('getMostAnomolousMandi', views.getMostAnomolousMandi, name='getMostAnomolousMandi'),
	path('getAnomolousCommodity', views.getAnomolousCommodity, name='getAnomolousCommodity'),
	
	# delete this url
	path('getAnomalyData', views.getAnomalyData, name='getAnomalyData'),
	# path('getAnomalyPage', views.getAnomalyPage, name='getAnomalyPage'),

	path('', views.landing_page, name='landing_page'),
	path('landing_page', views.landing_page, name='landing_page'),
	path('landing_page/<str:commodity>/<str:date>',views.landing_page_commodity, name='landing_page_commodity'),
	path('news_feed_page_past', views.news_feed_page_past, name='news_feed_page_past'),

	path('get_forecasted_mandi_1_month', views.get_forecasted_mandi_1_month, name='get_forecasted_mandi_1_month'),
	path('get_anomolous_normal', views.get_anomolous_normal, name='get_anomolous_normal'),
	



	# path('getVolatilityNewsFeed', views.getVolatilityNewsFeed, name="getVolatilityNewsFeed"),
	# path('getNonAnomalousAndArticleNewsFeed', views.getNonAnomalousAndArticleNewsFeed, name="getNonAnomalousAndArticleNewsFeed"),
	# path('getAnomalousAndArticleNewsFeed', views.getAnomalousAndArticleNewsFeed, name="getAnomalousAndArticleNewsFeed"),
	# path('getAnomalousAndNoArticleNewsFeed', views.getAnomalousAndNoArticleNewsFeed, name="getAnomalousAndNoArticleNewsFeed"),

	path('getNewsByDate', views.getNewsByDate, name='getNewsByDate'),

	path('getVolatilityNewsFeedByDate', views.getVolatilityNewsFeedByDate, name="getVolatilityNewsFeedByDate"),
	path('getNonAnomalousAndArticleNewsFeedByDate', views.getNonAnomalousAndArticleNewsFeedByDate, name="getNonAnomalousAndArticleNewsFeedByDate"),
	path('getAnomalousAndArticleNewsFeedByDate', views.getAnomalousAndArticleNewsFeedByDate, name="getAnomalousAndArticleNewsFeedByDate"),
	path('getAnomalousAndNoArticleNewsFeedByDate', views.getAnomalousAndNoArticleNewsFeedByDate, name="getAnomalousAndNoArticleNewsFeedByDate"),

	path('getMostVolatileMandiByDate', views.getMostVolatileMandiByDate, name="getMostVolatileMandiByDate"),




]
