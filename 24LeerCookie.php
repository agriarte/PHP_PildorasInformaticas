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
        if (isset($_COOKIE["Prueba"])){
            //si existe cookie 
            echo $_COOKIE["Prueba"] . "<br>";
        } else {
            echo "no hay cookie<br>";
        }
        ?>
    </body>
</html>
