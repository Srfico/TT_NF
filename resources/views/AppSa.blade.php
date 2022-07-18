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
            <!-- Header-->
            <header class="bg-dark py-1">
            <div class="container px-1">
            </div>
            </header>
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Recocido simulado</h1>
                    <p class="lead fw-normal text-muted mb-0">Utiliza el Recodico simulado para resolver el problema de las 29 ciudades de EEUU......</p>
                </div>
            </div>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                            <img src="Images/GACalculo.gif" style="max-width:90%;width: 90%;display: inline-block;"/>
                            <img src="Images/GACalculo_fin.png" style="max-width:90%;width: 90%;display: inline-block;"/>
                        </div>
                    <div class="col-lg-6">
                        <?PHP
                        if (empty($RegsSa)) {
                            $ArraySa=array(
                                "Vertice_Inicial"=>0,
                                "Num_Iteraciones"=>500,
                                "Num_Vecinas"=>350,
                                "Tiempo_Lim"=>1000000,
                                "Tipo_Improv"=>"first",
                                "Enfriamiento"=>"geometrico",
                                "Param_Geometrico"=>0.2,
                                "Param_Lineal"=>100,
                                "Lambda"=>0.9,
                                "Sigma"=>0.1,
                                "Gamma"=>0.5
                            );
                        }
                        else {
                            foreach($RegsSa as $item){$RegSa=$item;}
                            $ArraySa=array(
                                "Vertice_Inicial"=>$RegSa->Vertice_Inicial,
                                "Num_Iteraciones"=>$RegSa->Num_Iteraciones,
                                "Num_Vecinas"=>$RegSa->Num_Vecinas,
                                "Tiempo_Lim"=>$RegSa->Tiempo_Lim,
                                "Tipo_Improv"=>$RegSa->Tipo_Improv,
                                "Enfriamiento"=>$RegSa->Enfriamiento,
                                "Param_Geometrico"=>$RegSa->Param_Geometrico,
                                "Param_Lineal"=>$RegSa->Param_Lineal,
                                "Lambda"=>$RegSa->Lambda,
                                "Sigma"=>$RegSa->Sigma,
                                "Gamma"=>$RegSa->Gamma
                        );
                        }
                            ?>
                        <form method="POST" action="{{ route('SaveSa')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="elem-group">
                              <label for="department-selection">Vértice Inicial</label>
                              <select name='Vertice_Inicial' class="form-select" size="3" aria-label="size 3 select example" style="max-width:350px">
                                @if ($ArraySa["Vertice_Inicial"]==0)
                                    <option selected value="0">Atlanta</option>
                                @else
                                    <option value="0">Atlanta</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==1)
                                    <option selected value="1">Austin</option>
                                @else
                                    <option value="1">Austin</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==2)
                                    <option selected value="2">Baltimore</option>
                                @else
                                    <option value="2">Baltimore</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==3)
                                    <option selected value="3">Boston</option>
                                @else
                                    <option value="3">Boston</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==4)
                                    <option selected value="4">Chicago</option>
                                @else
                                    <option value="4">Chicago</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==5)
                                    <option selected value="5">Dallas</option>
                                @else
                                    <option value="5">Dallas</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==6)
                                    <option selected value="6">Denver</option>
                                @else
                                    <option value="6">Denver</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==7)
                                    <option selected value="7">Houston</option>
                                @else
                                    <option value="7">Houston</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==8)
                                    <option selected value="8">Indianapolis</option>
                                @else
                                    <option value="8">Indianapolis</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==9)
                                    <option selected value="9">Jacksonville</option>
                                @else
                                    <option value="9">Jacksonville</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==10)
                                    <option selected value="10">Las vegas</option>
                                @else
                                    <option value="10">Las vegas</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==11)
                                    <option selected value="11">Los angeles</option>
                                @else
                                    <option value="11">Los angeles</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==12)
                                    <option selected value="12">Memphis</option>
                                @else
                                    <option value="12">Memphis</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==13)
                                    <option selected value="13">Miami</option>
                                @else
                                    <option value="13">Miami</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==14)
                                    <option selected value="14">New orleands</option>
                                @else
                                    <option value="14">New orleands</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==15)
                                    <option selected value="15">New York</option>
                                @else
                                    <option value="15">New York</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==16)
                                    <option selected value="16">Newark</option>
                                @else
                                    <option value="16">Newark</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==17)
                                    <option selected value="17">Oakland</option>
                                @else
                                    <option value="17">Oakland</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==18)
                                    <option selected value="18">Filadelphia</option>
                                @else
                                    <option value="18">Filadelphia</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==19)
                                    <option selected value="19">Phoenix</option>
                                @else
                                    <option value="19">Phoenix</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==20)
                                    <option selected value="20">Portland</option>
                                @else
                                    <option value="20">Portland</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==21)
                                    <option selected value="21">San Antonio</option>
                                @else
                                    <option value="21">San Antonio</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==22)
                                    <option selected value="22">San Diego</option>
                                @else
                                    <option value="22">San Diego</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==23)
                                    <option selected value="23">San Francisco</option>
                                @else
                                    <option value="23">San Francisco</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==24)
                                    <option selected value="24">San Jose</option>
                                @else
                                    <option value="24">San Jose</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==25)
                                    <option selected value="25">Seattle</option>
                                @else
                                    <option value="25">Seattle</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==26)
                                    <option selected value="26">Tampa</option>
                                @else
                                    <option value="26">Tampa</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==27)
                                    <option selected value="27">Tucson</option>
                                @else
                                    <option value="27">Tucson</option>
                                @endif
                                @if ($ArraySa["Vertice_Inicial"]==28)
                                    <option selected value="28">Washington</option>
                                @else
                                    <option value="28">Washington</option>
                                @endif
                              </select>
                            </div>
                            <label for="customRange3" class="form-label">Nº iteraciones</label>
                            <input name="Num_Iteraciones" type="range" class="form-range" value="{{$ArraySa["Num_Iteraciones"]}}" min="1" max="50000" step="1" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Num_Iteraciones"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Nº vecinas</label>
                            <input name="Num_Vecinas" type="range" class="form-range" value="{{$ArraySa["Num_Vecinas"]}}" min="1" max="50000" step="1" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Num_Vecinas"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Tiempo Limite</label>
                            <input name="Tiempo_Lim" type="range" class="form-range" value="{{$ArraySa["Tiempo_Lim"]}}" min="1" max="1000000" step="1" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Tiempo_Lim"]}}</output>
                            <br>
                            <label for="department-selection">Tipo de improvisación</label>
                            <select name="Tipo_Improv" class="form-select" size="3" aria-label="size 3 select example" style="max-width:350px">
                                @if($ArraySa["Tipo_Improv"]=="first")
                                    <option selected value="first">First Improvee</option>
                                    <option value="best">Best Improvee</option>
                                @endif
                                @if($ArraySa["Tipo_Improv"]=="best")
                                    <option value="first">First Improvee</option>
                                    <option selected value="best">Best Improvee</option>
                                @endif
                              </select>
                            <br>
                            <label for="department-selection">Tipo de enfriamiento</label>
                            <br>
                            <select name="Enfriamiento" class="form-select form-select-sm" aria-label=".form-select-sm example" style="max-width:350px">
                                @if($ArraySa["Enfriamiento"]=="geometrico")
                                    <option value='geometrico' selected>Geometrico</option>
                                @else
                                    <option value='geometrico'>Geometrico</option>
                                @endif
                                @if($ArraySa["Enfriamiento"]=="lineal")
                                    <option value='lineal' selected>Lineal</option>
                                @else
                                    <option value='lineal'>Lineal</option>
                                @endif
                              </select>
                            <br>
                            <label for="customRange3" class="form-label">Alpha (Geometrico)</label>
                            <input name="Param_Geometrico" type="range" class="form-range" value="{{$ArraySa["Param_Geometrico"]}}" min="0.01" max="1" step="0.01" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Param_Geometrico"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Beta (Lineal)</label>
                            <input name="Param_Lineal" type="range" class="form-range" value="{{$ArraySa["Param_Lineal"]}}" min="1" max="50000" step="1" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Param_Lineal"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Lambda</label>
                            <input name="Lambda" type="range" class="form-range" value="{{$ArraySa["Lambda"]}}" min="0.01" max="1" step="0.01" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Lambda"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Sigma</label>
                            <input name="Sigma" type="range" class="form-range" value="{{$ArraySa["Sigma"]}}" min="0.01" max="1" step="0.01" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Sigma"]}}</output>
                            <br>
                            <label for="customRange3" class="form-label">Gamma</label>
                            <input name="Gamma" type="range" class="form-range" value="{{$ArraySa["Gamma"]}}" min="0.01" max="1" step="0.01" id="customRange3" oninput="this.nextElementSibling.value = this.value" style="max-width: 200px">
                            <output>{{$ArraySa["Gamma"]}}</output>
                            <br>
                            <button type="submit">Calcular Solución</button>
                          </form>
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