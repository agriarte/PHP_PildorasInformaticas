<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (!isset($_SESSION["usuario"])) {
            //$_SESSION["usuario"] trae el nombre de usario del campo login
            //Para evitar copy/paste de URl sin logarse se comprueba que está seteada
            //Si no está volvemos a la pantalla anterior de LOGIN de Usuario        
            header("location:22IndexLogin.php");
        }
        ?>

        <!--
        continua flujo, tenemos usuario logado
        -->
        <H1>Bienvenidos Usuarios</H1>
        <?php
        echo "Hola " . $_SESSION["usuario"];
        ?>

        <a href="22UsuariosRegistrados_1.php"><br>Volver</a>
        <a href="22CerrarSesion.php"><br>Cerrar sesión</a>      

    </body>
</html>
