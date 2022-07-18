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
                <h1 class="fw-bolder">Recocido Simulado</h1>
                <p class="lead fw-normal text-muted mb-0">El procedimiento de recocido, se basa en elevar la temperatura de un sólido, 
                    consiguiendo que los estados moleculares se vean alterados, permitiendo que los átomos se muevan mas libremente de manera
                    aleatoria en la retícula que da forma al sólido, buscando una posición o configuración en el espacio, que permita una energía mínima.
                    La disminución de la temperatura se hace de manera generalmente lenta, permitiendo los ajustes necesarios de los átomos, para que al 
                    momento de llegar a la temperatura en la cual los estados moleculares vuelven a su estado fundamental, los átomos se encuentren en 
                    posiciones de mínima o cercanas a la mínima energía.</p>
            </div>
        </div>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                        <img src="Images/SA_SELECCION.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Metodo de selección</h2>
                        <p class="lead fw-normal text-muted mb-0">Para una vecindad \(V(X)\) se toma una solución aleatoria y se obtiene un numero
                            aleatorio \(\mu \in (0,1)\). De esta manera, si la solución candidata \(Y\) es mejor que \(X\) entonces la solución siguiente es \(Y\),
                            por el contrario si \(Y\) es peor que \(X\), \(Y\) sera la siguiente solución siempre que: \[\mu >e^{-(Y-X)/T}\] Para el caso de minimizar,
                            para maximizar es analogo y se extiende facilmente.
                            Se observa una grafica, que indica que una solución que empeora se seleccióna siempre que el valor de \(\mu\) supere la probabilidad
                            de la solución (Curva azul sobre la roja).
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                        <img src="Images/SA_TEMP.gif"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Temperatura</h2>
                        <p class="lead fw-normal text-muted mb-0">Se simula una
                            temperatura \(T_0\) como la del recocido, pero con las unidades de nuestro Fitness. Por ello es importante definir una temperatura final acorde
                            al metodo de enfriamiento, pues, la manera en la que se enfria la temperatura desde \(T_0\) define una sucesión que debe ser convergente
                            en la temperatura final \(T_f\) para que termine el proceso.
                            <br><br>
                            Si \(T_0\) es temperatura inicial, \(T_f\) es una temperatura final y \(\tau\) una sucesión, entonces se tendria algo como:
                            $$T_0 \to \tau(T_0) \to \tau^2(T_0) \to ... \to \tau^k(T_0)...$$  $$\tau^n(T_0) \leq T_f \to \mbox{Final algoritmo} $$ $$n\geq k \geq 0$$
                            Es evidente que \(T_0>>T_f\). En la imagen se observan \(T_k=\alpha T_{k-1}\) en azul, \(T_k=T_{k-1}-\beta \) en verde y \(T_k=\frac{T_0}{k+1}\) en rojo.
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