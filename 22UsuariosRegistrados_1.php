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
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
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

        <table  width="385">
            <tbody>
                <tr>
                    <td style="width: 121px;" colspan="3">Zona de usuarios registrados</td>
                </tr>
                <tr>
                    <td style="width: 121px;"><a href="22UsuariosRegistrados_2.php">P&aacute;gina 2</a></td>
                    <td style="width: 121px;"><a href="22UsuariosRegistrados_3.php">P&aacute;gina 3</a></td>
                    <td style="width: 121px;">&nbsp;<a href="22UsuariosRegistrados_4.php">P&aacute;gina 4</a></td>
                </tr>
            </tbody>
        </table>
        
        <a href="22CerrarSesion.php"><br>Cerrar sesión</a>

    </body>
</html>
