import csv
import geocoder
from collections import namedtuple
from .models import Location, Map, Item



class MapReader(object):
    ''' Represents a map read from a csv file '''
    def __init__(self, csv_file, name='', user=None):
        if name == '':
            self.__name = csv_file.name.split('/')[-1]
        else:
            self.__name = name
        self.__csv_file = csv_file
        self.__size_hint = 4096

        self.__dialect = self._dialect()
        self.__has_header = self._has_header()

        self.__map = Map.objects.create(
            name=self.__name,
            user=user
        )

        self.__items = self._items()

    def read(self):
        ''' Returns the previously created map '''
        return self.__map

    @property
    def items(self):
        return self.__items

    def _dialect(self):
        ''' Studies the first two lines of csv file to check separators used '''
        dialect = csv.Sniffer().sniff(self.__csv_file.read(self.__size_hint))
        self.__csv_file.seek(0)

        return dialect

    def _has_header(self):
        ''' Studies the first two lines of csv file to check if it has headers '''
        has_header = csv.Sniffer().has_header(self.__csv_file.read(self.__size_hint))
        self.__csv_file.seek(0)

        return has_header

    def _items(self):
        ''' Reads csv file and writes all addresses into the database '''
        csv_data = self._read_csv_data()
        return [self._write_to_db(address) for address in csv_data]

    def _write_to_db(self, address):
        ''' Writes an address into the database '''
        name = address[0]
        street = address[1]
        number = address[2]
        _zip = address[3]

        l = '%s, %s - %s' % (street, number, _zip)

        g = geocoder.google(l)

        if g.status != 'OK':
            raise GeocodingError(g.status)

        location, created = Location.objects.get_or_create(
            lat=g.latlng[0],
            lon=g.latlng[1],
            defaults={'number': number,
                      'street': street,
                      'zipcode': _zip
                      }
        )

        item = Item.objects.create(
            item_map=self.__map,
            location=location,
            name=name
        )

        return item

    def _read_csv_data(self):
        ''' Returns all csv rows except header '''
        csv_data = csv.reader(self.__csv_file, self.__dialect)

        if self.__has_header:
            next(csv_data)

        return csv_data

    def __str__(self):
        return '\n'.join([unicode(i) for i in self.__items])


class GeocodingError(Exception):
    ''' Defines a custom error to use if geocoding goes wrong '''
    def __init__(self, value):
        self.value = value

    def __str__(self):
        return repr(self.value)
