#LIBRERIAS
import numpy as np
import math as mp
from matplotlib import pyplot as plt
from matplotlib import animation,rc
from matplotlib import rc
from matplotlib.animation import FuncAnimation
from pylab import *
import inspect,re,random,os
from tkinter import *
import time

r=1
Prob=0.5

#VECINDAD INMEDIATA PARA ENTEROS
def SolucionVecinaIE(S,r):
  X=[]
  for i in range(0,len(S)):
    q=0
    j=0
    while(np.random.uniform(0,1)>q):
      q=q+(1/(2*r+1))
      j=j+1
    X.append(S[i]+(j-1)-r)
  return X

#VECINDAD INMEDIATA PARA REALES
def SolucionVecinaIR(S,r):
  X=[]
  for i in range(0,len(S)):
    lambd=np.random.uniform(0,1)
    X.append(S[i]+r*(2*lambd-1))
  return X


#VECINDAD DEFINIDA POR UNA PROBABILIDAD PARA BINARIOS
def SolucionVecinaB(S,p):
  X=[]
  for i in range(0,len(S)):
    lambd=np.random.uniform(0,1)
    if(lambd<Prob):
      if(S[i]==0):
        X.append(1)
      else:
        X.append(0)
    else:
      X.append(S[i])
  return X

#VECINDAD DEFINIDA POR UNA PROBABILIDAD PARA PERMUTACIONES
def SolucionVecinaP(S,p):
  X=[]
  Aux=0
  for i in range(0,len(S)):
    X.append(S[i])
  for i in range(0,len(X)):
    lambd=np.random.uniform(0,1)
    if(lambd<p):
      n_1=randint(0,len(X))
      n_2=randint(0,len(X))
      Aux=X[n_1]
      X[n_1]=X[n_2]
      X[n_2]=Aux
  return X

#Nuevo individuo entero
def NuevoIndividuoE(lim_inf, lim_sup , M):
  X=[]
  for i in range(0,M):
    p=np.random.uniform(0,1)
    q=0
    j=0
    while(p>q):
      q=q+(1/(lim_sup-lim_inf+1))
      j=j+1
    X.append(j+lim_inf-1)
  return X


#Nuevo individuo Real
def NuevoIndividuoR(lim_inf , lim_sup, M):
  X=[]
  for i in range(0,M):
    p=np.random.uniform(0,1)
    X.append((lim_inf-lim_sup)*p+lim_inf)
  return X

#Nuevo individuo binario
def NuevoIndividuoB(M):
  X=[]
  for i in range(0,M):
    p=np.random.uniform(0,1)
    if(0.5>=p):
      X.append(1)
    else:
      X.append(0)
  return X

#Nuevo individuo permutacional
def NuevoIndividuoP(P, M):
  X=[]
  Posibles=set(P)
  for i in range(0,M):
    m=choice(list(Posibles))
    X.append(m)
    Posibles.remove(m)
  return X

#Nuevo camino
def NuevoCamino(P , Vertice_Inicial, Vertice_Final ,M):
  Solucion=[]
  Posibles=set(P)
  Solucion.append(Vertice_Inicial)
  if(Vertice_Inicial==Vertice_Final):
    Posibles.remove(Vertice_Inicial)
  else:
    Posibles.remove(Vertice_Inicial)
    Posibles.remove(Vertice_Final)
  for x in P:
    if(x!=Vertice_Inicial and x!=Vertice_Final):
      m=choice(list(Posibles))
      Solucion.append(m)
      Posibles.remove(m)
  Solucion.append(Vertice_Final)
  return Solucion

def Fitness_Prueba(S):
  Valor=0
  for s in S:
    Valor=Valor+s*s
  return Valor

def BusquedaLocal(Lim_inf, Lim_sup , r,  M, I, J, Time_Lim , TipoImprov, TipoOpt, SolucionVecina,Fitness_Function, NuevoIndividuo, Inicial=[]):
  if(Inicial==[]):
    Inicial=NuevoIndividuo(Lim_inf,Lim_sup,M)
  Actual=Inicial
  Fitness_Act=Fitness_Function(Actual)
  Fitness=[Fitness_Act]
  i=1 #Contador de iteraciones
  j=1 #Contador de vecinas
  k=1 #Contador de vecinas sin mejora (Para el Best)
  elegidos=[Inicial] #Para guardar las soluciones elegidas
  candidatos=[] #Para guardar soluciones candidatas
  Tiempo_Contado=0 #Para
  if(TipoImprov=='first'):
    while(i<I and j<J and Tiempo_Contado<=Time_Lim):
      t_0=time.time()
      X=SolucionVecina(Actual,r)
      j=j+1 
      candidatos.append(X)
      Fitness_Cand=Fitness_Function(X)
      if(TipoOpt=='Min'):
        if(Fitness_Cand<Fitness_Act):
          j=1
          i=i+1
          elegidos.append(X)
          Actual=X
          Fitness_Act=Fitness_Cand
          Fitness.append(Fitness_Act)
      if(TipoOpt=='Max'):
        if(Fitness_Cand>Fitness_Act):
          j=1
          i=i+1
          elegidos.append(X)
          Actual=X
          Fitness_Act=Fitness_Cand
          Fitness.append(Fitness_Act)
      t_f=time.time()
      if(Time_Lim>0):
        Tiempo_Contado=Tiempo_Contado+(t_f-t_0)
  if(TipoImprov=='best'):
    Y=[]
    while(i<I and j<J and Tiempo_Contado<=Time_Lim):
      t_0=time.time()
      X=SolucionVecina(Actual,r)
      j=j+1
      Fitness_Cand=Fitness_Function(X)
      if(TipoOpt=='Min'):
        if(Fitness_Cand<Fitness_Act):
          Y=X
          #Fitness_Act=Fitness_Cand
          #Fitness.append(Fitness_Act)
      if(TipoOpt=='Max'):
        if(Fitness_Cand>Fitness_Act):
          Y=X
          #Fitness_Act=Fitness_Cand
          #Fitness.append(Fitness_Act)
      if(Y!=X):
        k=k+1
      else:
        k=1
      if(j==J and k!=j):
        j=1
        k=1
        i=i+1
        Actual=Y
        Fitness_Act=Fitness_Cand
        Fitness.append(Fitness_Act)
      t_f=time.time()
      if(Time_Lim>0):
        Tiempo_Contado=Tiempo_Contado+(t_f-t_0)
  return Actual,candidatos,elegidos,Fitness

Lim_inf , Lim_sup =-100, 100 #Intervalo para buscar soluciones nuevas
M=2 #Tamaño de las soluciones
r=2 #Para definir el intervalo [Si-r,Si+r] donde buscar vecinas enteras o reales
I=250 #Numero de iteraciones (Veces que se busca una solución mejor)
J=150 #Numero de soluciones vecinas que se prueban
Time_Lim=1000000 #Limitacion de tiempo del algoritmo
TipoImprov='first' #Se selecciona la primera solucion que mejora o la mejor de las J.
TipoOpt= 'Min' #Si se desea maximizar u optimizar
SolucionVecina=SolucionVecinaIE
Fitness=Fitness_Prueba
NuevoIndividuo=NuevoIndividuoE
Inicial=[] #Solucion inicial
S=BusquedaLocal(Lim_inf, Lim_sup , M, r , I ,J , Time_Lim , TipoImprov, TipoOpt, SolucionVecina, Fitness, NuevoIndividuo , Inicial)
Solucion=S[0]
Candidatos=S[1]
Elegidos=S[2]
Fitness=S[3]
Fitness_Solucion=S[3][-1]

print(Solucion)

#x=np.arange(0,len(Fitness))
#plt.plot(x,Fitness,'-',color='r')
#plt.title('Fitness')
#plt.show()
#print(Solucion)
#print('Primer Fitness: ', S[1][0],'Ultimo Fitness: ',S[1][-1])