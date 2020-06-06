<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Registro</title>
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
        $id=$_GET['n_id'];
        

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if (mysqli_connect_errno()) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            exit();
        }

        $consulta = "DELETE FROM articulos WHERE ID='$id'";
        

        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado==null){
            echo "Algún error al insertar la consulta<br>";
        } else {
             echo "Num de Registros Eliminados: ";
             //devuelve el numero de registros afectados por una operación
             echo mysqli_affected_rows($conexion) . "<br>";
        }
        
        mysqli_close($conexion);
        
        ?>
    </body>
</html>
