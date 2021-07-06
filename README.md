# usefull Django _cmd
	ORDER TO INSTALL DJANGO WIN7
 * <a href="https://www.c-sharpcorner.com/article/how-to-install-pip-django-virtualenv-in-ubuntu/">for ubuntu</a>
========================================================
	Step 1
========================================================
	install python on pc 
========================================================
	Step 2
========================================================
	Open Powershell
	Verify Python Installation by
========================================================
python -V
========================================================
	Step 3 - Upgrade Pip
========================================================
python -m pip install --upgrade pip
========================================================
	Step 4 - Create a Project Directory by
========================================================
mkdir django_project
GOTO 
cd django_project
========================================================
	Step 5 - Create Virtual Environment
========================================================
python -m venv venv
	AND THIS 
pip install virtualenv
========================================================
	Step 6 ASSIGN NAME 
========================================================
virtualenv venv
======================================================== 
NEXT Activate Virtual Environment by GOTO 
======================================================== 
venv\Scripts\activate
======================================================== 
	Step 7 - Install Django IN V.env
========================================================
pip install django
========================================================
	Step 8 - Start a New Project
========================================================
django-admin startproject testsite
go to 
cd testsite
========================================================
	you can add app 
========================================================
python manage.py startapp myapp
========================================================
	Step 9 - Run the Server by 
========================================================
python manage.py runserver
========================================================
	for add new dependencey or pakages 
========================================================
pip freeze > requirements.txt
========================================================
	then run server 
========================================================
python manage.py runserver
========================================================
========================================================
pip install -r requirements.txt
========================================================
	Check version 
========================================================
django-admin --version 
========================================================
	for migrations and  migration  
========================================================
python manage.py makemigrations
========================================================
	if no changes detected  then type  
========================================================
python manage.py migrate
========================================================
	Admin panel cmds 
========================================================
	python manage.py createsuperuser
	Then give admin password 
========================================================
 python manage.py runserver
========================================================
	most important in django  important in django
	 important in django important in django
========================================================
	1st required for folder 
open setting find templates add this below cmd==>
========================================================
'DIRS': [os.path.join(BASE_DIR,'templates')],
========================================================
	2ND STATIC FOLDER FOR CSS JS AND PICS ETC 
========================================================
	# Added manually

STATICFILES_DIRS = [ os.path.join(BASE_DIR, "static") ]
======================================================

======================================================
	3RD  thing is required  
======================================================

import os # new

	i used then my static files problem solved 

python manage.py collectstatic
=======================================================

	4th  in head tag add below 
=======================================================

{% load static %}
=======================================================

	for style sheet in link tag add this 
=======================================================

<link rel="stylesheet" type="text/css" href="{% static 'style.css' %}">
-----------------------------------------------------------------------


========================================
My first app with httprequest required 
========================================
1st open setting add app name 
========================================
INSTALLED_APPS['myapp']
========================================
2nd add in current urls
========================================
from django.urls import path,include
and 
 path('',include('myapp.urls'))
================================================================================
create new file in app view file then add
================================================================================
from django.shortcuts import render
from django.http import HttpResponse


# Create your views here.
def myfunctioncall(request):
	return HttpResponse("<h1>hello world this is from my app</h1>")
================================================================================
app urls dir 

from django.urls import path
from . import views
urlpatterns=[
	path('preet/',views.myfunctioncall,name='preet')

]
================================================================================
then run server with 
in url =>preet/

======================
add function app views 
=====================
def add(request,a,b):
	# a=int(input("enter num1"))
	# b=int(input("enter num2"))
	return HttpResponse(f'<h1> You ans is :{a+b}</h1>')
=====================
in urls 
=====================
path('add/<int:a>/<int:b>',views.add,name='add'),

==========================================
Json response add this  in urls
==========================================
path('intro/<str:name>/<int:age>',views.intro,name='intro'),
==========================================
in views 
==========================================
from django.http import HttpResponse,JsonResponse
==========================================
Function is 
==========================================
def intro(request,name,age):
	my_dict={
	 'Name':name,
	 'Age':age 
	 }

	return JsonResponse(my_dict)
==========================================

