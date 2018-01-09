"""nDos URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.10/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
from django.conf.urls import url
from django.contrib import admin
from coreapp import views as coreapp_views
urlpatterns = [
    url(r'^admin/', admin.site.urls),
    url(r'^showConfig/(\d+)/$',coreapp_views.showConfig,name = "showConfig"),
    url(r'^tasklist/$',coreapp_views.tasklist,name = "tasklist"),
    url(r'^delTask/(\d+)/$',coreapp_views.delTask,name = 'delTask'),
    url(r'^setConfig/$',coreapp_views.setConfig,name = "setConfig"),
    url(r'^pressTest/(\d+)/$',coreapp_views.pressTest,name = "pressTest"),
    url(r'^stopTask/(\d+)/$',coreapp_views.stopTask,name = "stopTask"),
]
