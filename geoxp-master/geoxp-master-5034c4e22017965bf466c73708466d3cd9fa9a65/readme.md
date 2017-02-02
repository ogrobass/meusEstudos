# GeoXP 2016

## 1. Requirements

* Python 2.7 - See https://www.python.org/
* Pip 8.1.X - See https://pypi.python.org/pypi/pip
    * See this useful link to install pip on ubuntu: http://www.saltycrane.com/blog/2010/02/how-install-pip-ubuntu/
* Virtualenv - See https://virtualenv.pypa.io/en/stable/
* MySQL - See http://dev.mysql.com/downloads/
* [Optional] Docker - See https://www.docker.com/products/overview

---------------------
## 2. Setting up the development environment

Create a virtual environment one directory above the cloned repository:

`$ virtualenv .`

Activate the virtual environment:

`$ . bin/activate`

Install the Python requirements:

`$ pip install -r geoxp/geoxp/requirements.txt`

-----------------------
## 3. Setting up MySQL

Use the settings in `settings.py`

-----------------------
## 4. Running tests

To run the automated tests:

`$ cd geoxp/geoxp`

`$ ./manage.py test`

-----------------------
## 5. Running the application

To run the application directly:

`$ cd geoxp/`

`$ ./manage.py runserver`

To run using Docker:

`$ docker-compose up`


The application will be available at http://localhost:8000