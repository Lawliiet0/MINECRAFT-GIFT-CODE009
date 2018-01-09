from __future__ import unicode_literals

from django.db import models

# Create your models here.
class Tasklist(models.Model):
    category = models.CharField(max_length = 20)
    target = models.CharField(max_length = 100,blank = True)
    parameters = models.CharField(max_length = 1024 ,blank = True )
    timer = models.IntegerField(default = 20)
    pressure = models.DecimalField(max_digits=3, decimal_places=2,default=0.90)
    state = models.IntegerField(default = 0)
    detail = models.CharField(max_length = 100 ,blank = True )
    date_time = models.DateTimeField(auto_now_add = True)
    def __unicode__(self):
      return self.category
    class Meta:
      ordering = ['-date_time']
class Machinelist(models.Model):
    addr = models.CharField(max_length = 30,blank = True)
    port = models.IntegerField(default = 10200)
    ostype = models.IntegerField(default = 0 )
    alive = models.IntegerField(default = 0 )
    date_time = models.DateTimeField(auto_now_add = True)
    describe = models.CharField(max_length = 50,blank = True)
    def __unicode__(self):
      return self.addr
    class Meta:
      ordering = ['-date_time']

