from django.conf.urls import url

from . import views

urlpatterns = [
     url(r'^(?P<map_id>[0-9]+)?(/$)?', views.maps, name='maps'),
]
