from __future__ import unicode_literals
from django.contrib.auth.models import User
from django.db import models


class Location(models.Model):
    ''' Represents a location object containing latitude, longitude, street,
    number and zip. '''
    lat = models.FloatField()
    lon = models.FloatField()
    zipcode = models.CharField(max_length=9)
    street = models.CharField(max_length=100)
    number = models.IntegerField()

    def __str__(self):
        return unicode(self).encode('utf-8')

    def __unicode__(self):
        return u'%s;%s;%s;%s;%s' % (self.street, self.number, self.zipcode,
                                    self.lat, self.lon)

    def __eq__(self, other):
        return (self.lat, self.lon) == (other.lat, other.lon)

    def __ne__(self, other):
        return not self.__eq__(other)


class Map(models.Model):
    ''' Represents a collection of items that belongs to a
    specific user '''
    name = models.CharField(max_length=100)
    user = models.ForeignKey(User, related_name='maps',
                             null=True, blank=True, default=None)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return '\n'.join([unicode(l) for l in self.items.all()])


class Item(models.Model):
    ''' Represents an object that contains a Location and is
    bounded to a Map'''
    location = models.ForeignKey(Location, related_name='items')
    item_map = models.ForeignKey(Map, related_name='items')
    name = models.CharField(max_length=50)

    def __str__(self):
        return self.name + ';' + unicode(self.location)
