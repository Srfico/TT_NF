import numpy as np
import math as mp
from matplotlib import pyplot as plt
from matplotlib import animation,rc
from matplotlib.animation import FuncAnimation
from pylab import *
import inspect,re,random,os
from tkinter import *
import matplotlib.patches as patches
from PIL import Image
import time
import cv2
import pandas as pd



URLL='C:\\xampp\\htdocs\\TT_NF - copia\\public\\Locaciones.csv'
URLP='C:\\xampp\\htdocs\\TT_NF - copia\\public\\Pesos.csv'
df_loc=pd.read_csv(URLL,sep=',',decimal='.',header=None)
df_pes=pd.read_csv(URLP,sep=',',decimal='.')

#Para quitar alaska y hawaii
df_loc=df_loc.drop([8], axis=1)
df_loc=df_loc.drop([0], axis=1)
df_pes=df_pes.drop(['Anchorage'], axis=1)
df_pes=df_pes.drop([0], axis=0)
df_pes=df_pes.drop([8], axis=0)
df_pes=df_pes.drop(['Honolulu'], axis=1)
print(df_pes)
print(df_loc)

#Definición del arreglo de ciudades
Ciudades_eeuu=[]
for i in range(1,len(df_pes.columns)):
  Ciudades_eeuu.append(df_pes.columns[i])
Ciudades_eeuu[-1]='Washington'

#Definición del arreglo de pesos
Pesos_eeuu=np.zeros((len(Ciudades_eeuu),len(Ciudades_eeuu)))
df_pes.values
i,j=0,0
for ex in df_pes.values:
  for ey in ex[1:]:
    Pesos_eeuu[i][j]=ey
    j=j+1
  i=i+1
  j=0

#Definicion del arreglo de locaciones
Locaciones_eeuu=[]
for ex in range(0,len(df_loc.values[0])):
  Locaciones_eeuu.append([df_loc.values[0][ex],df_loc.values[1][ex]])

def Fitness_TSP(S):
  Sum=0
  for i in range(0,len(S)-1):
    Sum=Sum+Pesos_eeuu[S[i],S[i+1]]
  return Sum

def Copia(X):
  Y=[]
  for i in range(0,len(X)):
    Y.append(X[i])
  return Y

def Igual(X,Y):
  for i in range(0,len(X)):
    if(X[i]!=Y[i]):
      return 0
  return 1

#Seleccion aleatoria con mayor probabilidad para mejores resultados (Maximizar)
def SeleccionAleatoriaMax(P,Fitness):
  FP=[]
  min=Fitness[0]
  for i in range(0,len(P)):
    Y=Fitness[i]
    FP.append(Y)
    if(min>Y):
      min=Y
  if(min<0):
    t=1
  else:
    t=0
  Sum=0
  for i in range(0,len(FP)):
    Sum=Sum+FP[i]-1*t*min
  Prob=[]
  Acum=0
  for i in range(0,len(FP)):
    Acum=Acum+FP[i]/Sum
    Prob.append(Acum)
  N=len(P)
  i=0
  q=np.random.uniform(0,1)
  while(q>Prob[i]):
    i=i+1
  return P[i]

#Seleccion aleatoria con mayor probabilidad para mejores resultados (Minimizar)
'''Invierte la grafica dada por Calculo(P[i]) para algun i mediante el maximo
de este conjunto. Esto permite asignar un porcentaje mayor para las soluciones
que eran mas bajas y permiten minimizar pero ahora pasan a ser los mas altos.
Ademas normaliza los valores, dejando solo valores positivos.
'''
def SeleccionAleatoriaMin(P,Fitness):
  max=Fitness[0]
  T=[]
  for i in range(0,len(P)):
    T.append(Fitness[i])
    if(max<Fitness[i]):
      max=Fitness[i]
  F=[]
  for i in range(0,len(P)):
    F.append(0.5+max-Fitness[i])
  #print('F: ',F)
  Sum=0
  for i in range(0,len(F)):
    Sum=Sum+F[i]
  Prob=[]
  Acum=0
  for i in range(0,len(F)):
    Acum=Acum+F[i]/Sum
    Prob.append(Acum)
  N=len(P)
  i=0
  q=np.random.uniform(0,1)
  while(q>Prob[i]):
    i=i+1
  x=arange(0,len(P))
  return P[i]

def IndiceAleatorio(n):
  if(n%2==0):
    t=-1
  else:
    t=0
  N=mp.ceil(n/2)
  #print('N: ',N)
  M=0
  for i in range(1,mp.ceil(N/2)):
    M=M+i
  M=2*M+mp.ceil(N/2)-t*mp.ceil(N/2)
  #print('M:',M)
  p=np.random.uniform(0,1)
  r=0;j=2;i=1
  n1=0
  while(i<=N and n1==0):
    if(i<=mp.ceil(N/2)):
      r=r+i/M
      #print(i,'/',M)
    else:
      r=r+(i-j)/M
      #print(i-j,'/',M)
      j=j+2
    if(p<r or i+1==N+1):
      n1=i
    i=i+1
  #print('n1:',n1)
  #p=0.999999
  p=np.random.uniform(0,1)
  r=0;j=2;i=1
  n2=0
  while(i<N and n2==0):
    if(i<=mp.ceil(N/2)):
      r=r+i/M
      #print(i,'/',M)
    else:
      r=r+(i-j)/M
      #print(i-j,'/',M)
      j=j+2
    if(p<r or i+1==N):
      n2=i+N
    i=i+1
  #print('n2:',n2)
  return n1-1,n2-1

# Cruce para cromosomas binarios
''' Se intercambian los valores de X e Y desde el primer elemento
hasta un aleatorio k entre 0 y M-1. Siendo X e Y los nuevos
individuos en la nueva generación o siguiente iteración.
'''
def CruceBinario1(X,Y):
  n=len(X)
  S=0
  k=randint(0,n)
  print(k)
  for i in range(0,k):
    S=X[i]
    X[i]=Y[i]
    Y[i]=S
  return X,Y

''' Lo mismo que el caso anterior pero ahora se intercambian
desde un k1 hasta un k2.
Es claro que este caso funciona mejor para M mas grande.
'''
def CruceBinario2(X,Y):
  n=len(X)
  S=0
  k_1=randint(0,5)
  k_2=randint(0,5)
  if(k_1>k_2):
    S=k_1
    k_1=k_2
    k_2=k_1
  for i in range(k_1,k_2+1):
    S=X[i]
    X[i]=Y[i]
    Y[i]=S
  return X,Y

# Cruce para cualquier tipo (binario, entero y real)
''' Se intercambian valores, si un numero aleatorio p>0.5
'''
def CruceUniforme(X,Y):
  n=len(X)
  S=0
  for i in range(0,n):
    p=np.random.uniform(0,1)
    if(p>=0.5):
      S=X[i]
      X[i]=Y[i]
      Y[i]=S
  return X,Y

#Cruce real
''' Se crea un individuo, en el que cada alelo es la media de los padres.
'''
def CruceAritmeticoMedia(X,Y):
  n=len(X)
  for i in range(0,n):
    X[i]=(X[i]+Y[i])/2
  return X

'''Igual que el caso anterior pero media geometrica'''
def CruceAritmeticoGeometrica(X,Y):
  n=len(X)
  for i in range(0,n):
    X[i]=pow(X[i]*Y[i],0.5)
  return X 

def CrucePorExtension(X,Y):
  n=len(X)
  for i in range(0,n):
    b=max(X[i],Y[i])
    a=min(X[i],Y[i])
    X[i]=b+(b-a)
    Y[i]=a-(b-a)
  return X,Y

def CruceBLXAlpha(X,Y):
  n=len(X)
  alpha=np.random.uniform(0,1)
  m_2=choice(X)
  m_1=choice(X)
  for i in range(0,n):
    M_2=max(X[i],Y[i])
    M_1=min(X[i],Y[i])
    if(m_2<M_2):
      m_2=M_2
    if(m_1>M_1):
      m_1=M_1
  I_1=m_1-(m_2-m_1)*alpha
  I_2=m_2+(m_2-m_1)*alpha
  for i in range(0,n):
    X[i]=np.random.uniform(I_1,I_2)
    Y[i]=np.random.uniform(I_1,I_2)
  return X,Y

def CruceOrden(X,Y):
  n=len(X)
  n_1=randint(0,n)
  n_2=randint(0,n)
  if(n_1>n_2):
    s=n_1
    n_1=n_2
    n_2=s
  X_s=list(X)
  Y_s=list(Y)
  for i in range(n_1,n_2+1):
    X_s.remove(Y[i])
    Y_s.remove(X[i])
  s=0
  j=0
  for i in range(n_2+1,n):
    X[i]=Y_s[j]
    Y[i]=X_s[j]
    j=j+1
  for i in range(0,n_1):
    X[i]=Y_s[j+i]
    Y[i]=X_s[j+i]
  return X,Y

#Cruce de orden incluyendo indiceAleatorio para el calculo
def CruceOrdenProb(X,Y):
  n=len(X)
  Indices=IndiceAleatorio(n)
  n_1=Indices[0]
  n_2=Indices[1]
  X_s=list(X)
  Y_s=list(Y)
  for i in range(n_1,n_2+1):
    X_s.remove(Y[i])
    Y_s.remove(X[i])
  s=0
  j=0
  for i in range(n_2+1,n):
    X[i]=Y_s[j]
    Y[i]=X_s[j]
    j=j+1
  for i in range(0,n_1):
    X[i]=Y_s[j+i]
    Y[i]=X_s[j+i]
  return X,Y

'''
Toma dos indices n_1,n_2 aleatorios entre 0 y M, para pasar los genes entre estos
indices a los hijos a construir. Si X e Y son los padres, los elementos en X de
n_1 a n_2 se van al hijo 2 H_2, y los elementos en Y de n_1 a n_2 se van al hijo 1 
o H_1.

Luego, se toma el primer elemento k que no este en [n_1,n_2] en Y y se pregunta
si este elemento Q esta entre los elementos Y[n_1],...,Y[n_2], si no esta entonces
Y[k]=Q, por el contrario si Q esta, se toma X[k] y se repite el proceso, es decir,
se pregunta si X[k] esta en Y[n_1],...,Y[n_2] y asi sucesivamente.

Esto se reptie con cada elemento en Y hasta que H_1 este completo, y se repite con
H_2 utilizando X.
'''

def CrucePMX(X,Y):
  n=len(X)
  n_1=randint(0,n)
  n_2=randint(0,n)
  if(n_1==n_2):
    return X,Y
  if(n_1>n_2):
    s=n_1
    n_1=n_2
    n_2=s
  H_1=[]
  H_2=[]
  f={}
  f_inv={}
  X_set=set([])
  Y_set=set([])
  AUX_X=set([])
  AUX_Y=set([])
  for i in range(0,n):
    H_1.append(0)
    H_2.append(0)
  for i in range(n_1,n_2+1):
    H_1[i]=Y[i]
    H_2[i]=X[i]
    X_set.add(X[i])
    Y_set.add(Y[i])
    f_inv[Y[i]]=X[i]
    f[X[i]]=Y[i]
  if(n_1>0):
    for i in range(0,n_1):
      T=X[i]
      while(T in Y_set):
        T=f_inv[T]
      H_1[i]=T
      T=Y[i]
      while(T in X_set):
        T=f[T]
      H_2[i]=T
  if(n_2<n-1):
    for i in range(n_2+1,n):
      T=X[i]
      while(T in Y_set):
        T=f_inv[T]
      H_1[i]=T
      T=Y[i]
      while(T in X_set):
        T=f[T]
      H_2[i]=T
  return H_1,H_2

def CrucePMXProb(X,Y):
  n=len(X)
  Indices=IndiceAleatorio(n)
  n_1=Indices[0]
  n_2=Indices[1]
  if(n_1==n_2):
    return X,Y
  if(n_1>n_2):
    s=n_1
    n_1=n_2
    n_2=s
  H_1=[]
  H_2=[]
  f={}
  f_inv={}
  X_set=set([])
  Y_set=set([])
  AUX_X=set([])
  AUX_Y=set([])
  for i in range(0,n):
    H_1.append(0)
    H_2.append(0)
  for i in range(n_1,n_2+1):
    H_1[i]=Y[i]
    H_2[i]=X[i]
    X_set.add(X[i])
    Y_set.add(Y[i])
    f_inv[Y[i]]=X[i]
    f[X[i]]=Y[i]
  if(n_1>0):
    for i in range(0,n_1):
      T=X[i]
      while(T in Y_set):
        T=f_inv[T]
      H_1[i]=T
      T=Y[i]
      while(T in X_set):
        T=f[T]
      H_2[i]=T
  if(n_2<n-1):
    for i in range(n_2+1,n):
      T=X[i]
      while(T in Y_set):
        T=f_inv[T]
      H_1[i]=T
      T=Y[i]
      while(T in X_set):
        T=f[T]
      H_2[i]=T
  return H_1,H_2

def CruceCicle(X,Y):
  n=len(X)
  I=set(arange(0,n))
  H_1=[]
  H_2=[]
  f={}
  f_inv={}
  for i in range(0,n):
    H_1.append(0)
    H_2.append(0)
    f[X[i]]=[Y[i],i]
    f_inv[Y[i]]=[X[i],i]
  while(len(I)>0):
    k=choice(list(I))
    I.discard(k)
    p=np.random.uniform(0,1)
    if(p<0.5):
      T=X[k]
      H_1[k]=T
    else:
      T=Y[k]
      H_1[k]=T
    p=np.random.uniform(0,1)
    while(len(I)>0):
      if(p<0.5):
        S=f_inv[T]
      else:
        S=f[T]
      if(H_1[k]==S[0]):
        break
      T=S[0]
      H_1[S[1]]=T
      I.discard(S[1])
  I.clear()
  I=set(arange(0,n))
  while(len(I)>0):
    k=choice(list(I))
    I.discard(k)
    p=np.random.uniform(0,1)
    if(p<0.5):
      T=X[k]
      H_2[k]=T
    else:
      T=Y[k]
      H_2[k]=T
    p=np.random.uniform(0,1)
    while(len(I)>0):
      if(p<0.5):
        S=f_inv[T]
      else:
        S=f[T]
      if(H_2[k]==S[0]):
        break
      T=S[0]
      H_2[S[1]]=T
      I.discard(S[1])
  return H_1,H_2

def MutacionBinaria(X,p):
  n=len(X)
  for i in range(0,n):
    q=np.random.uniform(0,1)
    if(p>=q):
      if(X[i]==0):
        X[i]=1
      else:
        X[i]=0
  return X

'''Se modifico para que solo permita mutación entera,
utilizando la función techo. Esto no era asi originalmente,
hay que crear una versión para reales y otra para enteros.
'''
def MutacionUniformeEntera(X,p):
  n=len(X)
  for i in range(0,n):
    q=np.random.uniform(0,1)
    if(p>=q):
      X[i]=X[i]+mp.ceil(random.normalvariate(0,1))
  return X

'''Lo mismo que el anterior pero con ruido real'''
def MutacionUniformeReal(X,p):
  n=len(X)
  for i in range(0,n):
    q=np.random.uniform(0,1)
    if(p>=q):
      X[i]=X[i]+random.normalvariate(0,1)
  return X

def MutacionPermutacional(X,p):
  n_1=randint(0,len(X))
  n_2=randint(0,len(X))
  q=np.random.uniform(0,1)
  S=0
  if(p>=q):
    S=X[n_1]
    X[n_1]=X[n_2]
    X[n_2]=S
  return X

def Elitismo(P,Q,Elites,N,crossing,mutation,Fitness,SeleccionAleatoria, Prob_Mutation, TipoOpt):
  Mejores=[]
  Mejor=[]
  Poblacion=list(P)
  Fitness_Poblacion=list(P)
  #Busqueda de Elites mejores individuos en P
  for i in range(0,Elites):
    Best_Fitness=Fitness[0]
    Mejor=0
    for j in range(0,len(Poblacion)):
      if(TipoOpt=='Min'):
        if(Fitness[j]<Best_Fitness):
          Best_Fitness=Fitness[j]
          Mejor=j
      elif(TipoOpt=='Max'):
        if(Fitness[j]>Best_Fitness):
          Best_Fitness=Fitness[j]
          Mejor=j
    Mejores.append(Poblacion[Mejor])
    Poblacion.remove(Poblacion[Mejor])
    Fitness_Poblacion.remove(Fitness_Poblacion[Mejor])
  for i in range(0,len(Mejores)):
    Q.append(Mejores[i])
  '''
  Si N y Elitismo (o len(Mejores)) no coinciden en paridad,
  siempre faltara uno, por tanto hay que agregarlo.
  '''
  if(len(Q)==N-1 and Elites>0):
      P_a=SeleccionAleatoria(P,Fitness)
      P_b=SeleccionAleatoria(P,Fitness)
      P_Q=crossing(Copia(P_a),Copia(P_b))
      lambd=np.random.uniform(0,1)
      if(lambd>0.5):
        Q.append(mutation(P_Q[0],Prob_Mutation))
      else:
        Q.append(mutation(P_Q[1],Prob_Mutation))
  return Q

def SolucionVecinaPC(S,Vertice,p):
  X=[]
  Aux=0
  for i in range(1,len(S)-1):
    X.append(S[i])
  for i in range(0,len(X)):
    lambd=np.random.uniform(0,1)
    if(lambd<p):
      n_1=randint(0,len(X))
      n_2=randint(0,len(X))
      Aux=X[n_1]
      X[n_1]=X[n_2]
      X[n_2]=Aux
  S=[]
  S.append(Vertice)
  for x in X:
    S.append(x)
  S.append(Vertice)
  return S

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


def AlgoritmoGenetico(Permut,Vertice_Inicial, Vertice_Final, M, #Para definir la población inicial
                      L,J, N , Time_Lim, Elites, #Parametros internos del algoritmo
                      Crossing, Mutation, Fit_Opt, #Para definir población, cruce, mutacion, etc
                      Prob_Mutation , #Probabilidades de cruce y mutación
                      TipoOpt,
                      Pob=[] #Población inicial si se define inicialmente.
                      ):
  P=[]
  i=0
  j=0
  if(Pob==[]):
    while(len(P)<N):
      X=NuevoCamino(Permut,Vertice_Inicial, Vertice_Final, M)
      P.append(X)
  else:
    P=Pob
  Solucion=[]
  Sum=0
  Desv=[]
  Prom=[]
  Fitness=[]
  Pob_Mejores_Sol=[]
  Fitness_ant=0
  Fitness_Solucion=0
  Tiempo_Contado=0
  Valor_Aceptado=0
  while(i<L and j<J and Valor_Aceptado==0 and Tiempo_Contado<=Time_Lim):
    t_0=time.time()
    Fitness.clear()
    if(i>0):
      Fitness_ant=Fitness_Solucion
    for k in range(0,len(P)):
      Fitness.append(Fitness_TSP(P[k]))
      Sum=Sum+Fitness[k]
      if(TipoOpt=='Max'):
        if(Solucion==[] or (Fitness_Solucion<Fitness[k])):
          Solucion=P[k]
          Fitness_Solucion=Fitness[k]
      if(TipoOpt=='Min'):
        if(Solucion==[] or (Fitness_Solucion>Fitness[k])):
          Solucion=P[k]
          Fitness_Solucion=Fitness[k]
    Q=[]
    for k in range(0,mp.ceil(N/2)-mp.ceil(Elites/2)):
      P_a=SeleccionAleatoria(P,Copia(Fitness))
      P_b=SeleccionAleatoria(P,Copia(Fitness))
      P_Q=Crossing(Copia(P_a[1:len(P_a)-1]),Copia(P_b[1:len(P_b)-1]))
      for Y in P_Q:
        Q.append([Vertice_Inicial]+Mutation(Copia(Y),Prob_Mutation)+[Vertice_Final])
      P_Q=[]
    Q=Elitismo(Copia(P),Q,Elites,N,Crossing,Mutation,Copia(Fitness), SeleccionAleatoria, Prob_Mutation,TipoOpt)
    P=Q
    i=i+1
    if(Fitness_ant==Fitness_Solucion):
      j=j+1
    else:
      Desv.append(Fitness_Solucion)
      Prom.append(Sum/len(P))
      Pob_Mejores_Sol.append(Solucion)
      j=0
    t_f=time.time()
    Sum=0
    if(Time_Lim!=0):
      Tiempo_Contado=Tiempo_Contado+t_f-t_0
    if(Fitness_Solucion<=Fit_Opt):
      Valor_Aceptado=1
  #Fitness.clear()
  return Solucion,Desv,Fitness_Solucion,Pob_Mejores_Sol,Prom,Fitness

P=[i for i in range(0,29)]
Vertice_Inicial=0
Vertice_Final=Vertice_Inicial
prob=0.9 #Probabilidad de cruce
M=len(P) #Tamaño de las soluciones
L=1000 #Numero de iteraciones
J=5000 #Numero maximo de iteraciones sin mejora
N=30 #Numero de individuos por población
Crossing=CruceOrden #Cruce de individuos
Mutation=MutacionPermutacional #Para introducir aleatorieadad en la población
SeleccionAleatoria=SeleccionAleatoriaMin #Tipo de seleccion aleatoria
Fit_Opt= 0 #Fitness especifico para parar el algoritmo
Time_Lim=5000000 #Tiempo especifico para parar el algoritmo
Elites= 2 #Numero de mejores individuos a preservar por generaciones
Prob_Cross=0.9 #Probabilidad de cruce
Prob_Mutation=0.05 #Probabilidad de mutacion
lim_inf=-50
lim_sup=50
Pob=[]
TipoOpt='Min'
S=AlgoritmoGenetico(P,Vertice_Inicial, Vertice_Final, M,#Para definir la población inicial
                      L,J, N , Time_Lim, Elites, #Parametros internos del algoritmo
                      Crossing, Mutation, Fit_Opt, #Para definir población, cruce, mutacion, etc
                      Prob_Mutation , #Probabilidades de cruce y mutación
                      TipoOpt , #PARA DETERMINAR EL TIPO DE FIT
                      Pob #Población inicial si se define inicialmente.
                    )
Solucion_GA=S[0]
Desv_GA=S[1]
Fitness_Solucion_GA=S[2]
Elegidos_GA=S[3]
Prom_GA=S[4]
Fitness_GA=S[5]

def Mapa_Sol(Elegidos,Algoritmo):
  Sol_Inicial=Elegidos[0]
  Sol_Final=Elegidos[-1]
  Sol_Inicial_Acum=[]
  Sol_Final_Acum=[]
  for i in range(0,15):
    Sol_Inicial_Acum=Sol_Inicial_Acum+[Sol_Inicial]
    Sol_Final_Acum=Sol_Final_Acum+[Sol_Final]
  Elegidos=Sol_Inicial_Acum+Elegidos+Sol_Final_Acum
  LocNor=[[780,400] #Atlanta
            ,[545,460] #Austin
            ,[885,265] #Baltimore
            ,[955,185] #Boston
            ,[700,230] #Chicago
            ,[580,430] #Dalas
            ,[440,280] #Denver
            ,[590,490] #Houston
            ,[735,265] #Indianapolis
            ,[830,465] #Jacksonville
            ,[270,320] #Las vegas
            ,[220,365] #Los angeles
            ,[690,370] #Memphis
            ,[870,550] #Miami
            ,[680,480] #New Orleands
            ,[917,223] #New york
            ,[915,220] #Newark
            ,[170,268] #Oakland
            ,[905,245] #Filadelphia
            ,[310,390] #Phoenix
            ,[200,110] #Portland
            ,[530,500] #San antonio
            ,[230,386] #San diego
            ,[163,259] #San francisco
            ,[180,285] #San Jose
            ,[220,80] #Seattle
            ,[830,510] #Tampa
            ,[330,420] #Tucson
            ,[882,275] #Washintong
            ]

  def lim():
    axes.set_xlim(0,H)
    axes.set_ylim(W,0)
    return graficar,

  def g(i):
    x_dat=[]
    y_dat=[]
    for Sol in Elegidos[i]:
      x_dat.append(LocNor[Sol][0])
      y_dat.append(LocNor[Sol][1])
    graficar.set_data(x_dat,y_dat)
    return graficar,

  fig2,axes=plt.subplots()
  fig2.set_size_inches(19,11)
  axes.set_axis_off()
  im = Image.open('C:\\xampp\\htdocs\\TT_NF - copia\\public\\Images\\mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg')
  #im=im.rotate(180)
  H,W=im.size
  #tr = transforms.Affine2D().rotate_deg(180)
  #plt.imshow(np.fliplr(im))
  plt.imshow(im)
  for i in range(0,len(LocNor)):
      plt.plot(LocNor[i][0],LocNor[i][1],'.',color='red')
      plt.annotate(Ciudades_eeuu[i],(LocNor[i][0],LocNor[i][1]),color='red',fontsize=14)
  graficar, =plt.plot([],[],'-',color='blue',linewidth=0.8)

  #Mapa_Cities(LocNor)
  anim2=animation.FuncAnimation(fig2,g,frames=arange(0,len(Elegidos)),init_func=lim,blit=True)
  rc('animation', html='jshtml')
  anim2

  anim2.save('C:\\xampp\\htdocs\\TT_NF - copia\\public\\Images\\'+Algoritmo+'Calculo.gif', writer='imagemagick', fps=10,)
  #plt.show()

Mapa_Sol(Elegidos_GA,'GA')

LocNor=[[780,400] #Atlanta
        ,[545,460] #Austin
        ,[885,265] #Baltimore
        ,[955,185] #Boston
        ,[700,230] #Chicago
        ,[580,430] #Dalas
        ,[440,280] #Denver
        ,[590,490] #Houston
        ,[735,265] #Indianapolis
        ,[830,465] #Jacksonville
        ,[270,320] #Las vegas
        ,[220,365] #Los angeles
        ,[690,370] #Memphis
        ,[870,550] #Miami
        ,[680,480] #New Orleands
        ,[917,223] #New york
        ,[915,220] #Newark
        ,[170,268] #Oakland
        ,[905,245] #Filadelphia
        ,[310,390] #Phoenix
        ,[200,110] #Portland
        ,[530,500] #San antonio
        ,[230,386] #San diego
        ,[163,259] #San francisco
        ,[180,285] #San Jose
        ,[220,80] #Seattle
        ,[830,510] #Tampa
        ,[330,420] #Tucson
        ,[882,275] #Washintong
          ]

im = Image.open('C:\\xampp\\htdocs\\TT_NF - copia\\public\\Images\\mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg')
#im=im.rotate(180)
H,W=im.size
#tr = transforms.Affine2D().rotate_deg(180)
#plt.imshow(np.fliplr(im))
plt.figure(figsize=(19,11))
plt.axis('off')
plt.imshow(im)
for i in range(0,len(LocNor)):
    plt.plot(LocNor[i][0],LocNor[i][1],'.',color='red')
    plt.annotate(Ciudades_eeuu[i],(LocNor[i][0],LocNor[i][1]),color='red',fontsize=14)
x_dat,y_dat=[],[]
for ind in Elegidos_GA[-1]:
      x_dat.append(LocNor[ind][0])
      y_dat.append(LocNor[ind][1])

#plt.plot(x_dat,y_dat,'-',color='blue',linewidth=0.8)
plt.savefig('C:\\xampp\\htdocs\\TT_NF - copia\\public\\Images\\GACalculo_fin.png',
#bbox_inches='tight',pad_inches = 0
)

