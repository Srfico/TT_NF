<!-- FORMULARIO GENERAL PARA DEFINIR SOLUCIONES, SI HAY INICIAL, ALGORITMO,
    ETC -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'])?>">
        @csrf
        <label>
            Algoritmo
            <select name="Algoritmo" >
                <!-- FALTA HACER QUE DESPUES DE SELECCIONAR NO ES PUEDAN MODIFICAR
                    O QUEDE GUARDADO Y SE MUESTRA QUE SE ELIGIO-->
                <option>Local Search</option>
                <option>Simulated Annealing</option>
                <option>Genetic</option>
                
                </select>
        </label>
        <br>
        <label>
            Tipo Solución
            <select name="TipoInd" >
                <!-- FALTA HACER QUE DESPUES DE SELECCIONAR NO ES PUEDAN MODIFICAR
                    O QUEDE GUARDADO Y SE MUESTRA QUE SE ELIGIO-->
                <option>Entero</option>
                <option>Real</option>
                <option>Binario</option>
                <option>Permutación</option>
                <option>Camino</option>
                </select>
        </label>
        <br>
        <label>
            Tengo Solución Inicial
            <input type="checkbox" name="Inicial">
        </label>
        <br>
        <button type="submit" name='submit'>Siguiente paso</button>
    </form>
    @if (isset($_POST['submit']))
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'])?>">
        @csrf
            @if ($_POST['Algoritmo']=="Local Search")
                @if (!isset($_POST['Inicial']))
                <!-- Falta generalizar para cualquier tipo de solucion nueva
                    en este caso solo sirve para reales y enteros -->
                <label>
                    Numero de coordenadas solución 
                    <input type="number" name="M">
                </label>
                <br>
                <label>
                    Limite inferior
                    <input type="number" name="Lim_inf">
                    <br>
                    Limite superior
                    <input type="number" name="Lim_sup">
                </label>
                <br>
                @endif
                <label>
                    <!-- r=2 #Para definir el intervalo [Si-r,Si+r] donde buscar
                             vecinas enteras o reales -->
                    Tamaño de vecindad
                    <input type="number" name="r">
                </label>
                <br>
                <label>
                    <!-- TipoImprov='best' #Se selecciona la primera solucion 
                        que mejora o la mejor de las J.-->
                    Tipo mejora
                    <select name="TipoImprov">
                        <option>first</option>
                        <option>best</option>
                    </select>
                </label>
                <br>
                <label>
                    <!-- TipoOpt= 'Max' #Si se desea maximizar u optimizar-->
                    Tipo Optimización
                    <select name="TipoOpt">
                        <option>Max</option>
                        <option>Min</option>
                    </select>
                </label>
                <br>
                <label>
                    <!-- I=250 #Numero de iteraciones (Veces que se busca una solución mejor)-->
                    Numero de iteraciones
                    <input type="number" name="I">
                </label>
                <br>
                <label>
                    <!-- J=150 #Numero de soluciones vecinas que se prueban-->
                    Numero de candidatas
                    <input type="number" name="J">
                </label>
                <br>
                <label>
                    <!-- Time_Lim=1000000 #Limitacion de tiempo del algoritmo -->
                    Tiempo limite
                    <input type="number" name="Time_Lim">
                </label>
                <br>
                <label>
                    Fitness
                    <select name="Fitness">
                        <option>Fitness_Prueba</option>
                    </select>
                </label>
                @if ($_POST['TipoInd']=="Real")
                    <label>
                        Solucion Vecina
                        <select name="SolucionVecina">
                            <option>SolucionVecinaIR</option>
                        </select>
                    </label>
                    <label>
                        Nuevo Individuo 
                        <select name="NuevoIndividuo">
                            <option>NuevoIndividuoR</option>
                        </select>
                    </label>
                @endif
                @if ($_POST['TipoInd']=="Entero")
                @endif
                @if ($_POST['TipoInd']=="Binario")
                @endif
                @if ($_POST['TipoInd']=="Permutación")
                @endif
                @if ($_POST['TipoInd']=="Camino")
                @endif
            @endif
            @if ($_POST['Algoritmo']=="Simulated Annealing")
                @if (!isset($_POST['Inicial']))
                    NO TIENE Inicial
                @endif
            @endif
            @if ($_POST['Algoritmo']=="Genetic")
                @if (!isset($_POST['Inicial']))
                    NO TIENE Inicial
                @endif
            @endif
            <br>
            <button type="submit" name='submit2'>Ejecutar</button>
        </form>
    @endif