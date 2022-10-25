from django.shortcuts import render,HttpResponse
from gestionVenta.models import Perfil
# Create your views here.

def login(request):
    return HttpResponse("Login")

def plataformas(request):
    return HttpResponse("Plataformas")
    
def nuevaVenta(request):
    return HttpResponse("NuevaVenta")

def pendientes(request):
    return HttpResponse("Pendientes")
    
def renovacion(request):
    return HttpResponse("Renovacion")

def ventas(request):
    return HttpResponse("Ventas")

def actualizacion(request):
    return HttpResponse("Actualizacion")