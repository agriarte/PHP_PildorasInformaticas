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
        <form action="08PaginaBusquedaPost.php" method="post" >
            <label >Busqueda en BBDD: <input type="text" name="buscarLabel"></label> 
            
            <input type="submit" name="buscarBoton" value="buscar">
        </form>


        <?php
        // put your code here
        ?>
    </body>
</html>
