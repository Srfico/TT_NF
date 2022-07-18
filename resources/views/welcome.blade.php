<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Heurísticas y Complejidad - Nicolás Fica</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <script type="text/javascript" src="https://www.hostmath.com/Math/MathJax.js?config=OK"></script>
        <!--<link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>  -->
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">UTEM</a> 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="">Inicio</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contenido</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="Info">Travelling Salesman Problem (TSP)</a></li>
                                    <li><a class="dropdown-item" href="Comparativa">Comparación de soluciones</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Acerca de</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="assets/NicolasFica_TT2021.pdf">Informe</a></li>
                                    <li><a class="dropdown-item" href="https://github.com/Srfico">Github</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-dark py-1">
            <div class="container px-1">
                    <h1 class="display-5 fw-bolder text-white mb-2">Resuelve el TSP</h1>
                    <p class="lead fw-normal text-white-50 mb-4">¿ Cual es el camino que se debe seguir desde Atlanta,
                                para recorrer 28 ciudades restantes 
                                de EEUU visitandolas una sola vez, y recorriendo la menor distancia volviendo a Atlanta? 
                    </p>
                    <div style="text-align:center;">
                        <div>
                            <img src="Images/GACalculo.gif" style="max-width:50%;width: 50%;display: inline-block;"/>
                            </div>
                    <!-- width:885px;height:500px;object-fit:none;display: inline-block-->
                        <div style='padding-top:10px'>
                            <img src="Images/GACalculo_fin.png" style="max-width:50%;width: 50%;display: inline-block;"/>
                            </div>
                    </div>
                    <!--
                    -->
                    <div style="text-align:center;padding-top:30px;padding-bottom:30px">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Aplicación
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="AppLs">Busqueda Local</a></li>
                              <li><a class="dropdown-item" href="AppSa">Recocido Simulado</a></li>
                              <li><a class="dropdown-item" href="AppGa">Algoritmo genético</a></li>
                            </ul>
                          </div>                                                   
                                <a class="btn btn-primary btn-lg px-5" href="welcome">Calcular</a>
                                <!--<form method="GET" action="{{ route('homeCalculo')}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit">Calcular</button>
                                </form>-->
                                <a class="btn btn-outline-light btn-lg px-2" href="Info">Mas info</a>
                            </div>
                    <p class="lead fw-normal text-white-50 mb-4"> Se observa una animación que muestra una intuitiva
                        mejoria del camino que se tiene por solución, y junto a esta animación la solución encontrada
                        por el algoritmo genético.
                        Para volver a calcular presione el boton "Calcular",
                        para obtener mas información sobre el TSP presione "Mas info", y si desea utilizar este algoritmo
                        u otro para resolver el problema con otros parametros presione el boton "Opciones".
                    </p>
            </div>
            </header>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="Images/LS1.gif"/>
                        <img src="Images/LS2.gif"/>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Local Search o Busqueda Local</h2>
                        <p class="lead fw-normal text-muted mb-4">Para una solución inicial conocida o aleatoria,
                            se define una colección de soluciones "cercanas", en la cual se buscara una solución
                            que mejore el resultado actual. <br><br>
                            Este proceso se repetira hasta que se cumpla algún criterio
                            de parada, como llegar a un optimo local, que se cumpla cierto tiempo limite, numero de soluciones, etc.

                            <br><br> En las imagenes, se observa la selección de soluciones (rojo) y vecindades (negro para actual y gris para anterior), y como se minimiza un valor
                            a medida que se van tomando soluciones de manera "local".
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-5" href="LS">Mas info</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                            <img src="Images/SA_FITNESS.gif"/>
                            <img src="Images/SA_PROB.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Simulated Annealing o Recocido simulado</h2>
                        <p class="lead fw-normal text-muted mb-4"> Partiendo de una solución inicial conocida o aleatoria,
                            se utiliza una generalización de la busqueda local, añadiendo la posibilidad de que se puedan
                            escoger soluciones que tienen un resultado peor que el actual.
                            <br><br> Esto mediante una probabilidad de ser escogida si se empeora el resultado actual, basada en que tan avanzado esta el proceso
                            de optimización y que tanto empeora dicha solución respecto la actual.
                            <br><br>

                            En los gifs se observa como el valor a minimizar no es unicamente decreciente (rojo), lo que esta relacionado
                            con tomar soluciones que empeoran. Ademas, se observa una curva que describe que tanto "empeoramiento" se permite
                            si se selecciona una solución peor, a medida que ocurren las iteraciones.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-5" href="SA">Mas info</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="Images/GA_1.gif"/>
                        <img src="Images/GA_2.gif"/>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Genetic Algorithm o Algoritmo genético</h2>
                        <p class="lead fw-normal text-muted mb-4">
                            Cada solución se tomada como un individuo en un sistema evolutivo, teniendo cada individuo
                            una estructura que representa su genetica o genotipo, el que sera sometido a ciertos operadores
                            que siguen la metafora de cruce y mutación de una población de soluciones, buscando obtener
                            soluciones o individuos cada vez mejores.
                            <br><br>
                            En la primera imagen se ve como converge la población en individuos similares (o iguales) al pasar las generaciones, considerando
                            que un individuo viene descrito por un punto \((x,y)\) en el plano \(\mathbb{R}^2\).
                            En la segunda se observa como disminuye el Fitness al tomar al mejor individuo pasando por las generaciones
                            desde la primera.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-5" href="GA">Mas info</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section four-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img src="Images/Fitness_Algs.png"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Comparativa de los algoritmos</h2>
                        <p class="lead fw-normal text-muted mb-4">Se comparan los resultados obtenidos en los algoritmos presentados
                            para la resolución del problema de las 29 ciudades en EEUU.
                            <br><br> En la imagen se ve la disminución del Fitness para una ejecución de la busqueda local 
                            en rojo, recocido simulado en azul y algoritmo genético en verde.
                            <br><br> En el eje \(x\) se tiene la cantidad de soluciones elegidas, y en el eje \(y\) el 
                            fitness.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-5" href="Comparativa">Mas info</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; TT_NF 2022</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>