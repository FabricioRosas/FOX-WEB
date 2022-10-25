from http.client import HTTPResponse
from django.shortcuts import render
from django.http import HttpResponse
from gestionVenta.models import Perfil
# Create your views here.

def busqueda_perfil(request):
    return render(request,"busqueda_perfil.html")

def buscar(request):
    
    if request.GET["consultaPerfil"]:
        #mensaje="Perfil buscado: %r" %request.GET["perfil"]  
        varperfil=request.GET["consultaPerfil"]

        if len(varperfil)>15:
            mensaje="Texto demasiado largo"
        else:
            varperfiles=Perfil.objects.filter(nombrePerfil__icontains=varperfil)
            return render(request,"resultados_busqueda.html",{"perfiles":varperfiles,"query":varperfil})
    
    else:
        mensaje="No dejar búsqueda vacía"

    return HttpResponse(mensaje)

