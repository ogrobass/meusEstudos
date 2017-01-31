#!/usr/bin/env python

from django.db.utils import OperationalError
from time import sleep

import os
import sys

MAX_TRIES = 10
WAIT_TIME = 2

if __name__ == "__main__":
    os.environ.setdefault("DJANGO_SETTINGS_MODULE", "geoxp.settings")
    try:
        from django.core.management import execute_from_command_line
    except ImportError:
        # The above import may fail for some other reason. Ensure that the
        # issue is really that Django is missing to avoid masking other
        # exceptions on Python 2.
        try:
            import django
        except ImportError:
            raise ImportError(
                "Couldn't import Django. Are you sure it's installed and "
                "available on your PYTHONPATH environment variable? Did you "
                "forget to activate a virtual environment?"
            )
        raise

    # When running using Docker compose, the MySQL container needs some time
    # to start, so the web container might not be able to connect to the
    # database at first. If this is the problem, waiting and trying again
    # solves it.
    try_number = 0
    while try_number < MAX_TRIES:
        try:
            execute_from_command_line(sys.argv)
            break
        except OperationalError:
            print 'Could not connect to database'
            print 'Trying again\n'
            sleep(WAIT_TIME)

            try_number += 1
            if try_number == MAX_TRIES:
                print 'Could not connect to database after %d tries.\nGiving up...' % MAX_TRIES
