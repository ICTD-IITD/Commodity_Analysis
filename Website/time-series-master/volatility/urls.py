from django.urls import path
from . import views

urlpatterns = [
    path('volatility', views.volatility, name='volatility'),

]