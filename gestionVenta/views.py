from django.shortcuts import render,HttpResponse
from gestionVenta.models import Perfil
# Create your views here.

def login(request):
    return render(request, "login.html")

def plataformas(request):
    return render(request, "plataformas.html")
    
def nuevaVenta(request):
    return render(request, "nueva_venta.html")

def pendientes(request):
    return render(request, "pendientes.html")
    
def renovacion(request):
    return render(request, "renovacion.html")

def ventas(request):
    return render(request, "ventas.html")

def actualizacion(request):
    return render(request, "actualizacion.html")