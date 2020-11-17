<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Info Sistema y Navegador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/ua-parser-js@0/dist/ua-parser.min.js"></script>

        <script>
            function pintaTabla() {

                /*
                 //result devuelve: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0 
                 var parser = new UAParser();
                 var uastring = parser.getUA();
                 // by default it takes ua string from current browser's window.navigator.userAgent 
                 document.getElementById('id1').innerHTML = uastring;
                 document.getElementById('id2').innerHTML = parser.setUA(uastring).getBrowser().name;
                 document.getElementById('id3').innerHTML = parser.setUA(uastring).getBrowser().version;
                 document.getElementById('id4').innerHTML = parser.setUA(uastring).getOS().name;
                 document.getElementById('id5').innerHTML = parser.setUA(uastring).getOS().version; 
                 
                 
                 document.getElementById('id9').innerHTML = parser.setUA(uastring).getDevice().vendor; 
                 */

                var parser = new UAParser();
                var result = parser.getResult();

                // by default it takes ua string from current browser's window.navigator.userAgent 
                document.getElementById('id1').innerHTML = result.ua;
                document.getElementById('id2').innerHTML = result.browser.name;
                document.getElementById('id3').innerHTML = result.browser.version;
                document.getElementById('id4').innerHTML = result.engine.name;
                document.getElementById('id5').innerHTML = result.engine.version;
                document.getElementById('id6').innerHTML = result.os.name;
                document.getElementById('id7').innerHTML = result.os.version;
                document.getElementById('id8').innerHTML = result.device.model;
                var tipoDevice = result.device.type;
                document.getElementById('id9').innerHTML = tipoDevice;
                if ((tipoDevice) == null) {
                    if (/Mobi|Android/i.test(navigator.userAgent)) {
                        document.getElementById('id9').innerHTML = "Móvil";
                    } else {
                        document.getElementById('id9').innerHTML = "Ordenador o Tablet";
                    }
                }
                document.getElementById('id10').innerHTML = result.device.vendor;
                document.getElementById('id11').innerHTML = result.cpu.architecture;
                document.getElementById('id12').innerHTML = window.screen.width * window.devicePixelRatio + "x" + window.screen.height * window.devicePixelRatio;
                document.getElementById('id13').innerHTML = window.screen.width + "x" + window.screen.height;
                document.getElementById('id14').innerHTML = window.devicePixelRatio;
                document.getElementById('id15').innerHTML = window.screen.colorDepth + "bits";
                document.getElementById('id16').innerHTML = document.documentElement.clientWidth + "x" + document.documentElement.clientHeight + " (without scrollbars)";

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    document.getElementById('id17').innerHTML = "no disponible";
                    document.getElementById('id18').innerHTML = "no disponible";
                }
                function showPosition(position) {
                    document.getElementById('id17').innerHTML = position.coords.latitude;
                    document.getElementById('id18').innerHTML = position.coords.longitude;
                }

            }

        </script>

        <?php

        // Function to get the client IP address
        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if (isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if (isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if (isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            echo $ipaddress;
        }
        ?>
        <style>
            table.table-bordered{
                border:1px solid blue!important;
                margin-top:20px;
            }
            table.table-bordered > thead > tr > th{
                border:1px solid blue!important;
            }
            table.table-bordered > tbody > tr > td{
                border:1px solid blue!important;
            }
        </style>
    </head>
    <body class="bg-dark">

        <div class="container">
            <h2 class="d-flex justify-content-center text-white">Información del Sistema y Navegador</h2>
            <p class="d-flex justify-content-center text-white">User Agent y otras características del equipo</p>            

            <table class="table table-sm table-bordered w-auto mx-auto">
                <tbody>
                    <tr>
                        <td colspan="2" class="bg-dark text-white text-center">User Agent</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bg-light"><span id="id1"></span></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-sm table-bordered w-auto mx-auto">
                <tbody>
                    <tr>
                        <td rowspan="2" class="w-20 bg-primary">Navegador</td>
                        <td class="w-20 table-primary">Nombre:</td>
                        <td class="w-50 table-primary"><span id="id2"></span></td>
                    </tr>
                    <tr>

                        <td class="table-primary">Versión:</td>
                        <td class="table-primary"><span id="id3"></span></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="bg-secondary">Motor</td>
                        <td class="table-secondary">Nombre:</td>
                        <td class="table-secondary"><span id="id4"></span></td>
                    </tr>
                    <tr>
                        <td class="table-secondary">Versión:</td>
                        <td class="table-secondary"><span id="id5"></span></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="bg-success">S.O.</td>
                        <td class="table-success">Nombre:</td>
                        <td class="table-success"><span id="id6"></span></td>
                    </tr>
                    <tr>
                        <td class="table-success">Versión:</td>
                        <td class="table-success"><span id="id7"></span></td>
                    </tr>

                    <tr>
                        <td rowspan="3" class="bg-danger">Dispositivo</td>
                        <td class="table-danger">Modelo:</td>
                        <td class="table-danger"><span id="id8"></span></td>
                    </tr>
                    <tr>
                        <td class="table-danger">Tipo:</td>
                        <td class="table-danger"><span id="id9"></span></td>
                    </tr>
                    <tr>
                        <td class="table-danger">Marca:</td>
                        <td class="table-danger"><span id="id10"></span></td>
                    </tr>
                    <tr>
                        <td class="bg-info">CPU</td>
                        <td class="table-info">Arquitectura:</td>
                        <td class="table-info"><span id="id11"></span></td>
                    </tr>
                    <tr>
                        <td rowspan="5" class="bg-warning">Pantalla</td>
                        <td class="table-warning">Resolución:</td>
                        <td class="table-warning"><span id="id12"></span></td>
                    </tr>
                    <tr>
                        <td class="table-warning">AnchoxAlto:</td>
                        <td class="table-warning"><span id="id13"></span></td>
                    </tr>
                    <tr>
                        <td class="table-warning">devicePixelRatio:</td>
                        <td class="table-warning"><span id="id14"></span></td>
                    </tr>
                    <tr>
                        <td class="table-warning">colorDepth:</td>
                        <td class="table-warning"><span id="id15"></span></td>
                    </tr>
                    <tr>
                        <td class="table-warning">Ventana Navegador:</td>
                        <td class="table-warning"><span id="id16"></span></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-sm table-bordered w-auto mx-auto">
                <tbody>
                    <tr>
                        <td rowspan="3" class="bg-light">Geoposición</td>
                        <td class="table-light">IP Pública</td>
                        <td class="table-light"><?php get_client_ip(); ?></td>
                    </tr>
                    <tr>
                        <td class="table-light">Latitud</td>
                        <td class="table-light"><span id="id17"></span></td>
                    </tr>
                    <tr>
                        <td class="table-light">Longitud</td>
                        <td class="table-light"><span id="id18"></span></td>
                    </tr>


                </tbody>
            </table>
        </div>
        <script>
            pintaTabla();
        </script>
    </body>
</html>
