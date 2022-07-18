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
                <h1 class="fw-bolder">Problema del viajero o Travelling Salesman Problem (TSP)</h1>
                <!--<p class="lead fw-normal text-muted mb-0">How can we help you?</p> -->
            </div>
        </div>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">¿Que es el TSP?</h2>
                        <p class="lead fw-normal text-muted mb-0">Dado un conjunto finito de ciudades, y costos de viaje
                            entre todos los pares de ciudades, encontrar la forma mas barata de visitar todas las
                            ciudades exactamente una vez,y volver al punto de partida.
                            <br><br> Como caso particular se toma el problema de visitar 29 ciudades
                            de EEUU de las 31 disponibles, dejando fuera a Honolulu de Hawaii y
                            Anchorage de Alaska, según el siguiente <a href='https://www.mapcrow.info/united_states.html'>sitio</a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                        <img src="Images/PVF.svg" style="max-width:500px"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Formalización para solución</h2>
                        <p class="lead fw-normal text-muted mb-0">
                            Se etiqueta a cada ciudad con un indice, de modo que exista una biyección
                            entre las ciudades y el conjunto \([29]\). De esta manera, y considerando que
                            se debe visitar cada ciudad una sola vez partiendo de un vertice inicial de indice \(i\),
                            cada camino seria una sucesión de la forma \((i,0,....,0)+\alpha([29]-\lbrace i \rbrace)+(0,...,i)\)
                            siendo \(\alpha\) una permutación. Por lo tanto, se define cada solución como una permutación
                            de los vertices restantes al conjunto \([29]\), siendo el costo o Fitness de cada camino
                            definido como \(p(i,\alpha_1)+p(\alpha_1,\alpha_2)+...+p(\alpha_{28},i)\) considerando que desde el inicio se conocera un vertice inicial.
                            <br><br>
                            La idea para la representación en permutación, se obtuvo de la siguiente <a href='https://programmerclick.com/article/81351272174/'>fuente</a>.
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
                        <img src="Images/NP.png"/></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Costo computacional</h2>
                        <p class="lead fw-normal text-muted mb-0"> El costo computacional del problema
                            considerando todas las combinaciones posibles es \(O(n!)\) (con \(n=28\)). Ahora, al ser soluciones del tipo \(X=(X_1,...,X_n)\),
                            la verificación de una solución es de tipo lineal, se define al TSP como un problema de clase 
                            \(\textbf{NP}\). Luego, este problema se puede utilizar para reducir al resto 
                            de problemas al TSP, por tanto es \(\textbf{NP}-Completo\) y como se trata de un problema
                            de optimización, termina siendo \(\textbf{NP}-hard\).
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