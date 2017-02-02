# -*- coding: utf-8 -*-
from django.test import TestCase

import sys

class TestMaps(TestCase):

    def setUp(self):
        reload(sys)
        sys.setdefaultencoding('utf8')

    def test_should_return_something(self):
        response = self.client.get('/maps')
        print 'Response:'
        print response
