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
        $id = $_GET['c_id'];
        $seccion = $_GET['c_seccion'];
        $nombre = $_GET['c_nombre'];
        $fecha = $_GET['c_fecha'];
        $pais = $_GET['c_pais'];
        $precio = $_GET['c_precio'];

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if (mysqli_connect_errno()) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            exit();
        }

        $consulta ="UPDATE articulos SET SECCION='$seccion', NOMBREARTICULO='$nombre', FECHA='$fecha', PAISDEORIGEN='$pais', PRECIO='$precio' WHERE ID='$id'";
       

        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado==null){
            echo "Algún error al insertar la consulta<br>";
        } else {
             echo "Registro Guardado<br>";
             echo "<table><tr>";
             echo "<td>$id</td>";
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
