from django.urls import path
from . import views

urlpatterns = [
    path('dispersion', views.dispersion, name='dispersion'),

]