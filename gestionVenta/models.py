from unittest.util import _MAX_LENGTH
from django.db import models
# Create your models here.

class Cliente(models.Model):
    nombre=models.CharField(max_length=20,verbose_name="Nombre")
    telefono=models.CharField(max_length=11,verbose_name="Teléfono", unique=True)

    def __str__(self):
        return '👤%s   📱%s'%(self.nombre,self.telefono)

class Vendedor(models.Model):
    nombre=models.CharField(max_length=10,verbose_name="Nombre")
    telefono=models.CharField(max_length=11,verbose_name="Teléfono", unique=True)
    correo=models.EmailField(max_length=30,verbose_name="Correo", unique=True)
    contrasenia=models.CharField(max_length=10,verbose_name="Contraseña", unique=True)
    
    def __str__(self):
        return '👤%s   📱%s ID: %s'%(self.nombre,self.telefono,self.pk)

class Administrador(models.Model):
    nombre=models.CharField(max_length=20,verbose_name="Nombre")
    idVendedor=models.ForeignKey(Vendedor,verbose_name="Id Vendedor", default=1,on_delete=models.SET_DEFAULT)

    def __str__(self):
        return '👤%s   📱%s ID: %s'%(self.nombre,self.idVendedor.telefono,self.pk)

class Cuenta(models.Model):
    plataforma=models.CharField(max_length=10,verbose_name="Plataforma")
    correo=models.EmailField(max_length=30,verbose_name="Correo")
    contrasenia=models.CharField(max_length=10,verbose_name="Contraseña")
    fechaAdquisicion=models.DateField(auto_now=False,verbose_name="Fecha de Adquisición [DD-MM-AAAA]")
    fechaCaducidad=models.DateField(auto_now=False,verbose_name="Fecha de Caducidad [DD-MM-AAAA]")
    cantPerfiles=models.IntegerField(verbose_name="Cantidad máxima de Perfiles")
    idAdmin=models.ForeignKey(Administrador,verbose_name="Registrado por Admin",default=1,on_delete=models.CASCADE)
    #idVendedor=models.IntegerField(verbose_name="Registrado por Admin",null=True)

    def __str__(self):
        return '📺%s - %s: %s'%(self.plataforma,self.correo,self.contrasenia)

class Perfil(models.Model):
    #plataforma=models.CharField(max_length=10,null=True)
    idCuenta=models.ForeignKey(Cuenta,verbose_name="Cuenta",default=1,on_delete=models.CASCADE)#correo=models.CharField(max_length=30)
    #contrasenia=models.CharField(max_length=10)
    nombrePerfil=models.CharField(blank=True,null=True,max_length=10,verbose_name="Nombre del Perfil")
    pin=models.IntegerField(blank=True,null=True)
    fechaInicio=models.DateField(auto_now=False,verbose_name="Fecha de Inicio [DD-MM-AAAA]")#,input_formats=DATE_INPUT_FORMATS
    fechaFin=models.DateField(verbose_name="Fecha de Fin [DD-MM-AAAA]")
    idCliente=models.ForeignKey(Cliente,verbose_name="Id de Cliente",default=1,on_delete=models.CASCADE)#nombre
    #numero   
    modoPago=models.CharField(max_length=5,verbose_name="Modo de Pago")
    monto=models.FloatField(null=True,verbose_name="Monto [S/**.**]")
    idVendedor=models.ForeignKey(Vendedor,verbose_name="Vendedor",default=1,on_delete=models.CASCADE)

    def __str__(self):
        cadena=''
        if self.nombrePerfil is not None:
            cadena=' - '+self.nombrePerfil
        cad='📺'+self.idCuenta.plataforma+' - '+self.idCuenta.correo+cadena+' - RIP ['+str(self.fechaFin)+']'
        return cad

        