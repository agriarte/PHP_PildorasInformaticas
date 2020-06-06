<?php
require "./20DevuelveProductos.php";
$miDevuelveProductos = new DevuelveProductos();
$arrayProductos = $miDevuelveProductos->getProductos();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BBDD con POO</title>
    </head>
    <body>

        <?php
        
        echo "<table id='tablaListadoID'>";
        echo "<tr><th>ID</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";

        foreach ($arrayProductos as $elementos) {

            echo "<tr><td>" . $elementos['ID'] . "</td>";
            echo "<td>" . $elementos['SECCION'] . "</td>";
            echo "<td>" . $elementos['NOMBREARTICULO'] . "</td>";
            echo "<td>" . $elementos['FECHA'] . "</td>";
            echo "<td>" . $elementos['PAISDEORIGEN'] . "</td>";
            echo "<td>" . $elementos['PRECIO'] . "</td>";
        }
        
        ?>

    </body>
</html>
