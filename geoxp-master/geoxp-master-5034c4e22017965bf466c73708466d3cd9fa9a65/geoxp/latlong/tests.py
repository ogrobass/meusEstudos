# -*- coding: utf-8 -*-
'''Tests for latlong package.'''
from django.test import TestCase
from django.contrib.auth.models import User

import os.path
import sys

from .models import Location, Map, Item
from mapreader import MapReader

TEST_DIR = os.path.abspath(os.path.join(
    __file__, os.pardir)) + '/../test_files/'

class TestCSV(TestCase):
    ''' Test several aspects of a csv file, such as separators and headers '''
    def setUp(self):
        ''' Initial set up for tests '''
        reload(sys)
        sys.setdefaultencoding('utf8')

    def test_should_return_status_200(self):
        ''' Test for status 200 when loading page '''
        response = self.client.get('/', follow=True)
        self.assertEqual(200, response.status_code)

    def generic_should_return_csv_with_lat_lon(self, delimiter, header):
        ''' Generic function to test csv files '''
        if delimiter == ',' and header is False:
            input_file_name = TEST_DIR + 'addresses_comma_no_header.csv'
            expected_output_file_name = TEST_DIR + 'expected_comma_no_header.csv'

        elif delimiter == ',' and header is True:
            input_file_name = TEST_DIR + 'addresses_comma.csv'
            expected_output_file_name = TEST_DIR + 'expected_comma.csv'

        elif delimiter == ';' and header is False:
            input_file_name = TEST_DIR + 'addresses_no_header.csv'
            expected_output_file_name = TEST_DIR + 'expected_no_header.csv'

        else:
            input_file_name = TEST_DIR + 'addresses.csv'
            expected_output_file_name = TEST_DIR + 'expected.csv'

        with open(input_file_name, 'rb') as input_file:
            output_locations = MapReader(input_file)

        with open(expected_output_file_name, 'rb') as expected_output:
            self.assertEqual(str(
                output_locations), expected_output.read())

    def test_should_return_csv_with_lat_lon(self):
        '''Test if loaded page returns csv with ";" and header'''
        self.generic_should_return_csv_with_lat_lon(';', True)

    def test_should_return_csv_with_lat_lon_with_comma(self):
        '''Test if loaded page returns csv with "," and header'''
        self.generic_should_return_csv_with_lat_lon(',', True)

    def test_should_return_csv_with_lat_lon_no_header(self):
        '''Test if loaded page returns csv with ";" and no header'''
        self.generic_should_return_csv_with_lat_lon(';', False)

    def test_should_return_csv_with_lat_lon_with_comma_no_header(self):
        '''Test if loaded page returns csv with "," and no header'''
        self.generic_should_return_csv_with_lat_lon(',', False)


class TestDatabase(TestCase):
    ''' Tests writing to the database and reading from the database '''
    def setUp(self):
        ''' Writes a dummy user into the database '''
        input_file_name = TEST_DIR + 'addresses.csv'
        self.user = User.objects.create(
            username='ian',
            email='i@n.com',
            password='secret'
        )

        with open(input_file_name, 'rb') as input_file:
            output_locations = MapReader(
                input_file, name='test_map', user=self.user)

    def test_wrote_to_database(self):
        ''' Checks if the dummy user map is successfully read
        from the database '''
        _map = Map.objects.get(name='test_map')
        self.assertIsNotNone(_map)
        items = _map.items.all()
        self.assertEqual(items[0].name, 'Ime')
        self.assertEqual(items[0].location.street, 'Rua do Matão')
        self.assertEqual(_map.user, self.user)
