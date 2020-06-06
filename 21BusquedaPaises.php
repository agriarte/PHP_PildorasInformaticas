<!DOCTYPE html>
<!--
con method get lo introducido en el label viaja por URL. Se recoge con
$busqueda = $_GET["buscarLabel"]; 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda por Pais</title>
    </head>
    <body>
        <form action="21IndexMostrarPaises.php" method="get" >
            <label >Busqueda por País: <input type="text" name="buscarLavel"></label> 

            <input type="submit" name="buscar" value="buscar">
        </form>


        <?php
        // put your code here
        ?>
    </body>
</html>
