<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de Usuario</title>
        <style>
            h1,h2{
                text-align: center;
            }
            .tabla1{
                width: 25%;
                background-color: #FFC;
                border: 2px dotted #F00;
                margin: auto;
                .izq{
                    text-align: right;
                }
                .der{
                    text-align: left;
                }

                td{
                    text-align: center;
                    padding: 10;
                }
            }
            .tabla2,.td2{
                padding: 25px;
                width: 800px;
                margin:  10px auto;
                border-collapse: collapse;
                border: 3px solid black;    
            }

            .td2{
                border: 3px solid black;          
            }

            IMG.centrado {
                display: block;
                margin-left: auto;
                margin-right: auto }




        </style>
    </head>
    <body>

        <?php
        // bloque php Comprueba Login si se pulsa ENVIAR. Este bloque php solo se 
        //lee si pulsamos el botón
        //inicialmente vale null
        //mas tarde si el usuario ya ha sido logado se cambiará a true
        $autenticado = null;

        if (isset($_POST['enviar'])) {
            try {
                $base = new PDO("mysql:host=localhost; dbname=gestionpedidos", "root", "");
                $base->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                $sql = "SELECT * FROM USUARIOS WHERE USUARIO=:login AND PASSWORD=:password";
                $resultado = $base->prepare($sql);

                //para evitar inyeccion  htmlentities y addslashes
                $login = htmlentities(addslashes($_POST["login"]));
                $password = htmlentities(addslashes($_POST["password"]));

                //enlaza los marcadores con las variables
                $resultado->bindValue(":login", $login);
                $resultado->bindValue(":password", $password);

                $resultado->execute();

                //rowcount devuelve el numero de filas de la consulta
                //Si Login y password existen devolverá 1, sino 0
                $numero_registros = $resultado->rowCount();

                if ($numero_registros != 0) {

                    //consultada la bbdd y existe usuario
                    $autenticado = true;
                    if (isset($_POST['recordar'])) {
                        //si checkbox activo, crear cookie
                        setcookie("nombre_usuario", $_POST['login'], time() + 30000);
                    }
                } else {
                    //no existe usuario conocido
                    header("refresh:5;url=./26IndexLoginCookies.php");
                    echo '<h1>Error, espera 5 segundos o pulsa <a href="./26IndexLoginCookies.php">aquí</a>.</h1>';
                }
            } catch (Exception $exc) {
                die("Error : " . $exc->getMessage());
            }
        }
        ?>

        <?php
        //este bloque es muy importante. 3 casos posibles:
        //1 -No te has logeado y no hay cookie -> carga formulario
        //2 -Te has logeado y no hay cookie 
        //3 -Una vez anterior que te logaste, estaba activo checkbox y se creó cookie
        // entonces automaticamente carga contenido sin mostrar formulario
        // 
        //si error de login...
        if ($autenticado == false) {
            //y ademas cookie no ha sido creado
            if (!isset($_COOKIE["nombre_usuario"])) {
                include "./26FormularioLogin.html";
            }
        }


        //si hay cookie con usuario imprimir saludo Nombre de usuario
        //y si no pero estamos autenticados imprimir saludo tambien 
        if (isset($_COOKIE["nombre_usuario"])) {
            echo "Hola " . $_COOKIE["nombre_usuario"];
        } else if (isset($_COOKIE["nombre_usuario"])) {
            echo "Hola " . $_POST["login"];
        }
        ?>

        <h2>Contenido de la web</h2>

        <table class="tabla2">
            <tr class="tr2">
                <td class="td2"><img class="centrado" src=".\23imagenes\coche.jpg" alt="" /></td>
                <td class="td2"><img class="centrado" src=".\23imagenes\lago.jpg" alt="" /></td>
            </tr>
            <tr class="tr2">
                <td class="td2"><img class="centrado" src=".\23imagenes\mansion.jpg" alt="" /></td>
                <td class="td2"><img class="centrado" src=".\23imagenes\numeros.jpg" alt="" /></td>
            </tr>
        </table>


        <?php
        if ($autenticado == true || $_COOKIE["nombre_usuario"]) {
            include "./26ZonaRegistrados.html";
        }
        ?>
    </body>
</html>
