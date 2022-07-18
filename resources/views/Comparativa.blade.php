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
                <h1 class="fw-bolder">Comparativa de soluciones</h1>
                <p class="lead fw-normal text-muted mb-0">Se observa una comparativa de la mejor solución
                    que se tiene para los 3 algoritmos abordados.
                </p>
            </div>
        </div>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <h2 class="fw-bolder">Búsqueda local</h2>
                    <p class="lead fw-normal text-muted mb-0"></p>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <h2 class="fw-bolder">Recocido Simulado</h2>
                    <p class="lead fw-normal text-muted mb-0"></p>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <h2 class="fw-bolder">Algoritmo Genético</h2>
                    <p class="lead fw-normal text-muted mb-0"></p>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                    <div class="col-lg-6" style="padding-top:10px;padding-bottom:10px">
                        <img src="Images/mapa-de-eeuu-en-blanco-para-imprimir-mudo.jpg" style="max-width:500px"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center" style="padding-top:10px;padding-bottom:10px">
                        <h2 class="fw-bolder">Tabla comparativa</h2>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Algoritmo</th>
                                <th scope="col">Iteraciones</th>
                                <th scope="col">Tiempo</th>
                                <th scope="col">Fitness</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Otto</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>Otto</td>
                              </tr>
                            </tbody>
                          </table>
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