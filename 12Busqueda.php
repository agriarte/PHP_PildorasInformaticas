<!DOCTYPE html>
<!--
con method get lo introducido en el label viaja por URL. Se recoge con
$busqueda = $_GET["BuscarLabel"]; 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda</title>
    </head>
    <body>
        <form action="12PaginaBusqueda.php" method="get" >
            <label >Busqueda por paises: <input type="text" name="buscarLabel"></label> 
            
            <input type="submit" name="buscar" value="buscar">
        </form>


        <?php
        // put your code here
        ?>
    </body>
</html>
