# -*- coding: utf-8 -*-
# Generated by Django 1.10.1 on 2016-09-22 09:36
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('coreapp', '0002_auto_20160922_0841'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='tasklist',
            name='opt',
        ),
        migrations.AlterField(
            model_name='tasklist',
            name='state',
            field=models.IntegerField(default=0),
        ),
    ]
