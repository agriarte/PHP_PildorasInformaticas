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
                //en variable superglobal $_SESSION["usuario"]                
                session_start();
                $_SESSION["usuario"] = $_POST["login"];
                
                header("location:22UsuariosRegistrados_1.php");
            } else {
                //no existe
                header("refresh:5;url=22IndexLogin.php");
                echo '<h1>Error, espera 5 segundos o pulsa <a href="22IndexLogin.php">aquí</a>.</h1>';
            }
        } catch (Exception $exc) {
            die("Error : " . $exc->getMessage());
        }
        ?>
    </body>
</html>
