# Generated by Django 4.1.1 on 2022-10-24 14:44

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('gestionVenta', '0012_remove_perfil_vendedor'),
    ]

    operations = [
        migrations.AlterField(
            model_name='cliente',
            name='nombre',
            field=models.CharField(max_length=20),
        ),
        migrations.AlterField(
            model_name='cliente',
            name='telefono',
            field=models.CharField(max_length=11, unique=True, verbose_name='Teléfono'),
        ),
    ]
