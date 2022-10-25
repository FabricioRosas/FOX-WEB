from django.urls import path
from gestionVenta import views

urlpatterns = [
    path('', views.login, name="Login"),
    path('plataformas', views.plataformas, name="Plataformas"),
    path('nuevaVenta', views.nuevaVenta, name="NuevaVenta"),
    path('pendientes', views.pendientes, name="Pendientes"),
    path('renovacion', views.renovacion, name="Renovacion"),
    path('ventas', views.ventas, name="Ventas"),
    path('actualizacion', views.actualizacion, name="Actualizacion"),
]