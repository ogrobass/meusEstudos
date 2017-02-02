from django.shortcuts import render
from django.http import HttpResponse
from latlong.models import Location, Map, Item
from django.core import serializers
from django.http import HttpResponseForbidden
from django.http import HttpResponseForbidden


import json


def maps(request, map_id=''):
    _map = None
    print map_id
    if map_id == None or map_id == '':
        _map = Map.objects.latest('created_at')
    else:
        _map = Map.objects.get(id=map_id)
    maps = None
    if _map.user and _map.user != request.user:
        return HttpResponseForbidden()

    if request.user.is_authenticated():
        maps = request.user.maps.all()

    l = [i.location for i in _map.items.all()]
    items = [i for i in _map.items.all()]
    map_data = serializers.serialize("json", l)  
    item_data = serializers.serialize("json", items)  
    return render(request, 'maps/index.html', { 'maps': maps, 'map': map_data, 'items': item_data})
