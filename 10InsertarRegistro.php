<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Registro</title>
    </head>
    <body>
        <?php
        //### datos conexion###
        $db_host = "localhost";
        $db_nombre = "gestionpedidos";
        $db_user = "root";
        $db_password = "";
        $conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);

        //###valores formulario###
        $seccion = $_GET['seccion'];
        $nombre = $_GET['n_art'];
        $fecha = $_GET['fecha'];
        $pais = $_GET['p_orig'];
        $precio = $_GET['precio'];

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if (mysqli_connect_errno()) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            exit();
        }

        $consulta = "INSERT INTO articulos (SECCION, NOMBREARTICULO, FECHA, PAISDEORIGEN, PRECIO) VALUES "
                . "('$seccion', '$nombre', '$fecha', '$pais', '$precio');";

        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado==null){
            echo "Algún error al insertar la consulta<br>";
        } else {
             echo "Registro Guardado<br>";
             echo "<table><tr>";
             echo "<td>$seccion</td>";
             echo "<td>$nombre</td>";
             echo "<td>$fecha</td>";
             echo "<td>$pais</td>";
              echo "<td>$precio</td>";
             echo "</tr></table>";
        }
        
        mysqli_close($conexion);
        
        ?>
    </body>
</html>
