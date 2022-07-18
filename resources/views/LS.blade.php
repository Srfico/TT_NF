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
                            <li class="nav-item"><a class="nav-link" href="/TT_NF - copia/public">Inicio</a></li>
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
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Busqueda Local</h1>
                <!--<p class="lead fw-normal text-muted mb-0">How can we help you?</p> -->
            </div>
        </div>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="Images/LS_VECINOS.gif"/>
                        <img src="Images/LS_VECINOS_PER.gif"/>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Vecindad o cercanía</h2>
                        <p class="lead fw-normal text-muted mb-0">Se trata de una colección de soluciones
                            que bajo ciertas condiciones se definen como cercanas a una solución de referencia.
                            <br><br> Si las soluciones son \(X=(X_1,...,X_n)\) de reales (\(n=2\)) y se define la cercania
                            por medio de un intervalo \([X_i-1,X_i+1]\) para \(i=1,2\), se observan algunas soluciones vecinas
                            en azul y algunas no vecinas en celeste, para la solución en rojo.
                            <br><br> También se podria definir para una tupla \((1,2,3,4)\), un punto cercano mediante
                            una permutación en la que se intercambian dos valores de posición. Siguiendo esta idea,
                            la vecindad completa de soluciones es la que se observa en el grafico, siendo el eje \(x\) el
                            que indica la posición \(1,2,3,4\) y el eje \(y\) el que indica el valor \(1,2,3,4\). 
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                        <img src="Images/LS_VECINOS_FIRST.gif"/>
                        <img src="Images/LS_VECINOS_BEST.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Tipo de mejora o selección</h2>
                        <p class="lead fw-normal text-muted mb-0">Si \(V(X)\) es la vecindad de \(X\), debe existir una función \(f: V(X) \rightarrow U\) siendo comunmente
                            \(U\) el conjunto real, que asigna a cada solución vecina de \(X\) y ella misma un valor que indica que tan utiles son para optimizar (Maximizar o minimizar).
                            De esta manera, usando el orden \(\leq\) usual, se sabe que solución es mejor, simplemente mediante \(f(r)\leq f(t) \leftrightarrow r\) es mejor que \(t\) si queremos minimizar y analogo
                            para maximizar.
                            <br><br> Ahora bien, por tiempo es imposible en la mayoria de casos verificar toda la vecindad, por tanto, se selecciona un numero de vecinos
                            de manera aleatoria, escogiendo el primero que mejora el Fitness actual (en rojo) o First Improvee (grafico arriba), o al mejor de la subcolección definida (30 soluciones con Fitness en azul), o Best Improvee
                            (grafico abajo)
                        </p>
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