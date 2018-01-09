from django.contrib import admin
from .models import Tasklist
from .models import Machinelist
# Register your models here.
class MachinelistAdmin(admin.ModelAdmin):
    list_display = ('id','addr','port','ostype','alive','date_time','describe')

admin.site.register(Tasklist)
admin.site.register(Machinelist,MachinelistAdmin)
