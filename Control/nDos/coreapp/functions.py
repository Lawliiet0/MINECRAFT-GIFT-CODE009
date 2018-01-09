#-*:utf-8 -*-
import base64
import string
#from coreapp.models import Tasklist
def encodedata(data):
    s1 = base64.encodestring(data)
    s1 = string.replace(s1,"=",'^')
    s1 = string.replace(s1,"a",'!')
    s1 = string.replace(s1,"c",'(')
    s1 = string.replace(s1,"f",')')
    s1 = string.replace(s1,"m",'$')
    s1 = string.replace(s1,"x",'*')
    #print s1
    return s1[::-1]
def findall(db_object):
    try:
       res = db_object.objects.all()
    except:
       res = None
    return res
def finddata(db_object,data):
    try:
       res = db_object.objects.get(**data)
    except:
       res = None 
    return res
def savedata(db_object,data):
    try:
       db_object.objects.create(**data)
       res = 1
    except:
       res = 0
    return res
def updatedata(db_object,data,storedata):
    db_object.objects.filter(**data).update(**storedata)
    #return data
def deldata(db_object,data):
    res = False
    try:
       db_object.objects.get(**data).delete()
       res = True
    except:
       pass
    return res
