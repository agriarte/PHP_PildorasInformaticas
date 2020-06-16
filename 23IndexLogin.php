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

                    //si existe, iniciamos sesion con nombre de usuario guardada
                    //en variable superglobal $_SESSION["usuarioGlobal"]                
                    session_start();
                    $_SESSION["usuarioGlobal"] = $_POST["login"];
                   
                } else {
                    //no existe
                    header("refresh:5;url=./23IndexLogin.php");
                    echo '<h1>Error, espera 5 segundos o pulsa <a href="./23IndexLogin.php">aquí</a>.</h1>';
                }
            } catch (Exception $exc) {
                die("Error : " . $exc->getMessage());
            }
        }
        ?>

        <?php
        //Si No existe usuarioGlobal carga formulario y si no Saludo Nombre Usuario
        if (!isset($_SESSION["usuarioGlobal"])) {
            include "./23FormularioLogin.html";
             
        } else {
            echo "<h2>Hola " . $_SESSION["usuarioGlobal"] . "</h1>";
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
// put your code here
        ?>
    </body>
</html>
