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
                <h1 class="fw-bolder">Algoritmo Genetico</h1>
                <p class="lead fw-normal text-muted mb-0">Una población es una colección de soluciones
                    a un problema de optimización. Cada individuo tendra una estructura llamada cromosoma \(X=(X_1,...,X_n)\),
                    donde cada posición \(i\in[n]\) es un gen y el respectivo \(X_i\) es llamado alelo. El cromosoma
                    es esencial pues permitira dar un valor de supervivencia a las soluciones, combinarlas o introducirles ruido
                    mediante una mutación. <br><br>
                    Lo que hara el algoritmo genetico, sera tomar estas soluciones, someterlas a un mecanismo de selección aleatoria
                    priorizando por la capacidad de sobrevivir, y con estas soluciones seleccionadas construira otra colección
                    de soluciones, con la que se repetira el proceso.</p>
            </div>
        </div>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img src="Images/GA_SELECT.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Fitness y mecanismo de selección </h2>
                        <p class="lead fw-normal text-muted mb-0">
                            El Fitness sera una función \(f : P \rightarrow \mathbb{R}\) que dara para cada individuo un valor
                            de supervivencia que indicara que tan útil es para el objetivo de optimizar. En la practica, se puede tomar el \([0,1]\)
                            un intervalo segmentado en tantos subintervalos como individuos hay en la población, siendo la longitud de cada subintervalo
                            definida por la probabilidad de ser escogido ese individuo, de esta manera, al escoger una posición aleatoria en el intervalo, sera 
                            mas posible caer en un intervalo "más grande".
                            <br><br> En la imagen se ve como para cada valor del eje \(x\) se tienen
                            5 posibilidades en \([0,1]\) definidas por el color del rectangulo en el eje \(y\)). De esta manera, al obtener 
                             numeros aleatorios, se seleccionarian respectivamente los individuos de intervalo rojo, azul, azul, cafe, verde, azul.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img src="Images/GA_OPER.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Operadores cruce y mutación</h2>
                        <p class="lead fw-normal text-muted mb-0">El cruce es un operador \( C : P\times P \to U\) que llega al universo
                            de cromosomas posibles. El cruce sera una operatoria aleatoria de intercambio, promedio, combinación
                            o permutación entre los alelos de los cromosomas \(X,Y\), simulando la combinación
                            genetica usual. (Se suele hacer dos veces el cruce de un par de individuos, para tener 2 nuevos individuos en la població nueva).
                            <br><br>
                            La mutación es un operador \(M : P \to U \) que de manera aleatoria introduce "ruido" en el individuo, esto es,
                            se simula la modificación genetica del individuo, lo que deriva en un nuevo individuo para la nueva población.
                            <br><br>
                            En la practica, cada par de individuos se somete a cruce considerando una probabilidad de cruce (cercana a \(1\)),
                            y a los pares salientes del cruce, pudiendo ser los mismos "padres", se les somete a mutación, existiendo una probabilidad
                            de mutación de que ocurra (cercana a \(0\)).
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section four-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img src="Images/GA_ELIT.gif" /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Elitismo</h2>
                        <p class="lead fw-normal text-muted mb-0">Si así se quiere, se pueden preservar algunos individuos
                            para las poblaciones siguientes, por su valor en supervivencia o por algún otro motivo. Usualmente
                            se suele calcular el Fitness para cada individuo, se define un ranking de mejor a peor de los individuos en función
                            del Fitness, seleccionando a los \(k\) primeros del ranking para preservar.
                            <br><br>
                            En la imagen, se observa como de la población en azul, se preservan 6 individuos pasandolos directamente
                            a la segunda población (En vacío inicialmente).
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