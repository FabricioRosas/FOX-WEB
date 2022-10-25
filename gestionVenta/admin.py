from django.contrib import admin

from gestionVenta.models import Cliente, Vendedor, Perfil, Cuenta,Administrador

# Register your models here.

class ClienteAdmin(admin.ModelAdmin):
    list_display=("nombre","telefono")
    search_fields=("nombre","telefono")
    list_filter=("nombre","telefono",)

class VendedorAdmin(admin.ModelAdmin):
    list_display=("pk","nombre","telefono","correo")
    search_fields=("nombre","telefono")

class AdministradorAdmin(admin.ModelAdmin):
    list_display=("pk","nombre","idVendedor")

class PerfilAdmin(admin.ModelAdmin):
    list_display=("nombrePerfil","pin","fechaInicio","fechaFin","modoPago","monto")
    search_fields=("nombrePerfil","fechaInicio","fechaFin","modoPago","monto")

class CuentaAdmin(admin.ModelAdmin):
    list_filter=("plataforma","correo","fechaAdquisicion","fechaCaducidad",)
    list_display=("plataforma","correo","contrasenia","fechaAdquisicion","fechaCaducidad")

admin.site.register(Cliente,ClienteAdmin)
admin.site.register(Vendedor,VendedorAdmin)
admin.site.register(Perfil,PerfilAdmin)
admin.site.register(Cuenta,CuentaAdmin)
admin.site.register(Administrador,AdministradorAdmin)

