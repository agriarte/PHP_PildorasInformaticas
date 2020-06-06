<?php
require "./21DevuelvePaises.php";

$datoBusqueda= $_GET["buscarLavel"];

$miDevuelvePaises = new DevuelvePaises();
$arrayProductos = $miDevuelvePaises->getProductosPais($datoBusqueda);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mostrar por Paises</title>
    </head>
    

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

    
</html>
