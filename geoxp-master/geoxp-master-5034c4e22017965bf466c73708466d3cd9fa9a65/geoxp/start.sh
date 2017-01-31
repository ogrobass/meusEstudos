#!/bin/bash

python manage.py migrate auth             # Apply database migrations for auth
python manage.py migrate                  # Apply database migrations
python manage.py collectstatic --noinput  # Collect static files

# Start Gunicorn processes
echo Starting Gunicorn.
exec gunicorn geoxp.wsgi:application \
    --bind 0.0.0.0:$PORT
