"""project URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include
# from first_app import views
# from dashboard import views


urlpatterns = [
    # path('', views.index, name="index"),
    # path('first_app/', include('first_app.urls')),
    path('dashboard/', include('dashboard.urls')),
    path('base/', include('base.urls')),
    # path('dispersion/', include('dispersion.urls')),
    # path('volatility/', include('volatility.urls')),
    path('home/', include('home.urls')),
    path('agri_req/', include('home.urls')),
    # path('', include('fcaData.urls')),
    # path('', include('indicator.urls')),
    path('admin/', admin.site.urls),
]



