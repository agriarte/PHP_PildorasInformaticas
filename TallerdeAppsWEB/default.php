<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap  -->
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- JS, Popper.js, and jQuery -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


        <meta charset="UTF-8">

        <script>
            //no la uso por movimiento brusco
            function isScrolledIntoView(el) {
                var rect = el.getBoundingClientRect();
                var elemTop = rect.top;
                var elemBottom = rect.bottom;

                // Only completely visible elements return true:
                var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
                // Partially visible elements return true:
                //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
                return isVisible;
            }

            function scrollWinY() {
                while (!isScrolledIntoView(infodeviceID)) {

                    // incrementally scroll up 100px
                    window.scrollBy(0, 100);
                }
            }
            //

            function scrollWinYSuave(el) {
                console.log(el);
                // Scroll to a certain element suave
                document.querySelector('#' + el).scrollIntoView({
                    behavior: 'smooth',
                    block: 'end'
                });
            }

            //eventos cards se han desplegado(collapse)
            $(document).ready(function () {
                $("#txtPfCollapseID").on('shown.bs.collapse', function () {
                    if (!isScrolledIntoView(txtPfCollapseID)) {
                        console.log("hacemos scroll suave PF");
                        scrollWinYSuave('txtPfCollapseID');
                    }
                });
            })
            $(document).ready(function () {
                $("#txtSnmpCollapseID").on('shown.bs.collapse', function () {
                    if (!isScrolledIntoView(txtSnmpCollapseID)) {
                        console.log("hacemos scroll suave Snmp");
                        scrollWinYSuave('txtSnmpCollapseID');
                    }
                });
            })
            $(document).ready(function () {
                $("#txtInfoCollapseID").on('shown.bs.collapse', function () {
                    if (!isScrolledIntoView(txtInfoCollapseID)) {
                        console.log("hacemos scroll suave Info");
                        scrollWinYSuave('txtInfoCollapseID');
                    }
                });
            })
        </script>
        <style>
            .text-responsive {
                font-size: calc(28% + 1vw + 1vh);
            }
        </style>

        <title>El Taller de las Apps</title>
    </head>

    <body class="bg-dark">
        <!--empieza navbar -->    
        <nav class="navbar navbar-expand-lg fixed-top  bg-info navbar-dark sticky-top">
            <a class="navbar-brand" href="https://www.tallerdeapps.com/" target="_blank"><img src="./img/logo36.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.tallerdeapps.com/" target="_blank">El taller de las Apps</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Proyectos <span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="download">
                            <a class="dropdown-item" href="https://www.tallerdeapps.com/#" target="_blank">Preguntas Frecuentes BBDD</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.tallerdeapps.com/#" target="_blank">Monitor SNMP</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://www.tallerdeapps.com/infodevice/indexinfodevice.php" target="_blank">Info Device</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto/contacto.php" target="_blank">Contacto</a>
                    </li>
                </ul>                
            </div>
        </nav><!-- fin de navbar-->


        <!--logo para abajo-->
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-12 pt-5 text-center ">

                    <img class="img-fluid" src="./img/tallergrande729.png">

                </div>
                <div class="col-12 text-center">
                    <div class="text-white" >
                        <p class="text-responsive">Desarrollo de aplicaciones de escritorio y móvil</p>
                    </div>
                </div>
            </div>

            <!-- inicio cards proyectos-->
            <div class="container pt-lg-5">
                <div class="row text-center">
                    <div class="col-md-4">
                        <a href="#pfID" class="btn" data-toggle="collapse">
                            <div class="card bg-info">
                                <div class="text-center">
                                    <img class="" src="./img/pf60m.png" alt="Card image cap">
                                    <p class="text-white">Preguntas Frecuentes BBDD</p>
                                </div> 
                        </a></div>
                    <div id="pfID" class="bg-white collapse text-justify p-2 ">
                        <div id="txtPfCollapseID">
                            <p>
                                Base de datos que comparte soluciones a averías de impresoras y otros temas 
                                relacionados con el servicio técnico de SDC. Contiene ayudas sobre códigos SC,
                                procedimientos de instalación, mensajes de error Remote y un largo etc. A través 
                                del menú, podemos buscar y crear nuevo contenido.
                            </p>
                            <div class="text-center">
                                <a href="loquesea.htm"><button id="pfID"  class="btn btn-outline-info collapse" type="button" class="btn btn-outline-light">Abrir</button>                 
                            </div>
                        </div>
                    </div>
                </div> <!-- fin de col PF -->

                <div class="col-md-4">
                    <a href="#snmpID" class="btn" data-toggle="collapse">
                        <div class="card bg-info">
                            <div class="text-center">
                                <img class="" src="./img/snmp60B.png" alt="SNMP Monitor">
                                <p class="text-white">MonitorSNMP</p>
                            </div> 
                    </a></div>
                <div id="snmpID" class="bg-white collapse text-justify p-2 ">
                    <div id="txtSnmpCollapseID">
                        <p>Monitor remoto para impresoras de red con protocolo SNMP. Da información de todas las impresoras 
                            conectadas en un rango IP generando una tabla con los contadores, modelo, número de serie y si están operativas
                            o en algún estado de alerta (falta de papel, toner, etc) [en desarrollo]</p>
                        <div class="text-center">
                            <a href="loquesea2.htm"><button id="snmpID"  class="btn btn-outline-info collapse" type="button" class="btn btn-outline-light">Abrir</button>                 
                        </div>
                    </div>
                </div>
            </div> <!-- fin de col SNMP-->

            <div class="col-md-4">
                <a href="#infodeviceID" class="btn" data-toggle="collapse">
                    <div class="card bg-info">
                        <div class="text-center">
                            <img class="" src="./img/infodevice60.png" alt="Info Device">
                            <p class="text-white">Info Device</p>
                        </div> 
                </a></div>


            <div id="infodeviceID" class="bg-white collapse text-justify p-2 ">
                <div id="txtInfoCollapseID">
                    <p>Información del dispositivo obtenida con el User Agent del navegador y por otros medios. Devuelve versiones del sistema y otras características.</p>
                    <div class="text-center">
                        <a href="./infodevice/indexinfodevice.php"><button id="infodeviceID"  class="btn btn-outline-info collapse" type="button" >Abrir info</button>                 
                    </div>
                </div>
            </div> <!-- fin de col -->
        </div>
    </div> <!-- fin -->





    <br> <br> <br>

    <footer class="fixed-bottom py-0 bg-light">
        <div class="container text-center">
            <small>Copyright &copy; 2020 Pedro Agriarte</small>
        </div>
    </footer>

</div>




</body>
</html>

