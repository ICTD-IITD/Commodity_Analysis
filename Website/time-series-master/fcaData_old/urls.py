from django.urls import path
from . import views

urlpatterns = [
    path('getCommodityList', views.getCommodityList, name='getCommodityList'),
    path('getPriceDispersion', views.getPriceDispersion, name='getPriceDispersion'),
    path('getVolatilityAllCenter', views.getVolatilityAllCenter, name='getVolatilityAllCenter'),
    path('getVolatilityMonthRange', views.getVolatilityMonthRange, name='getVolatilityMonthRange'),

    

]