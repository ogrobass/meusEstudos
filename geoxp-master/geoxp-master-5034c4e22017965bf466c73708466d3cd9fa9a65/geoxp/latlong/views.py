from django.contrib.auth import authenticate as auth, login as _login, logout
from django.contrib.auth.models import User
from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import redirect, render, render_to_response
from django.template import RequestContext
from django.views.decorators.csrf import csrf_protect, csrf_exempt
from .forms import UploadFileForm, LoginForm, RegistrationForm
from .models import Location, Map, Item
from django.contrib.auth.models import AnonymousUser

import json
from mapreader import MapReader, GeocodingError


def upload(request):
    if request.method == 'POST':
        file = request.FILES['file']
        if request.user.is_authenticated():
            user = request.user
        else:
            user = None

        try:
            reader = MapReader(file, user=user)
            _map = reader.read()
        except GeocodingError as error:
            return redirect('/error', error.value)

        value = request.POST.get("action")
        if value == "Download":
            response = HttpResponse(
                unicode(_map), content_type="text/csv")
            response['Content-Disposition'] = 'inline; filename = output.csv'
            return response
        else:
            form = UploadFileForm(request.POST, request.FILES)

            if form.is_valid():
                return HttpResponseRedirect('maps/' + str(_map.id))
    else:
        form = UploadFileForm()

    return render(request, 'latlong/index.html', {'form': form})


def error(request, error_message=None):
    zero_results = error_message == 'ZERO_RESULTS'
    over_query_limit = error_message == 'OVER_QUERY_LIMIT'
    request_denied = error_message == 'REQUEST_DENIED'
    invalid_request = error_message == 'INVALID_REQUEST'

    return render(request, 'latlong/error.html',
                  {'zero_results': zero_results,
                   'over_query_limit': over_query_limit,
                   'request_denied': request_denied,
                   'invalid_request': invalid_request})


def login(request):
    next = request.GET.get('next', '/')

    if request.method == "POST":
        username = request.POST['username']
        password = request.POST['password']
        user = auth(username=username, password=password)

        if user is not None:
            if user.is_active:
                _login(request, user)
                return HttpResponseRedirect(next)
            else:
                return HttpResponse("Inactive user.")
        else:
            return HttpResponseRedirect('/')

    form = LoginForm()
    return render(request, "latlong/login.html", {'redirect_to': next, 'form': form})


@csrf_protect
def register(request):
    if request.method == 'POST':
        form = RegistrationForm(request.POST)

        if form.is_valid():

            user = User.objects.create_user(
                username=form.cleaned_data['username'],
                password=form.cleaned_data['password1'],
                email=form.cleaned_data['email']
            )
            user = auth(username=form.cleaned_data[
                        'username'], password=form.cleaned_data['password1'])

            return HttpResponseRedirect('/')

    else:
        form = RegistrationForm()

    return render(request, 'latlong/register.html', {'form': form})
