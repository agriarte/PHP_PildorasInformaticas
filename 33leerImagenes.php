<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Resumen: las bbdd solo almacenan la ruta de las imagenes.
         * crear conexion, consulta para recibir ruta y con echo mostramos foto
         */
        // conexion a bbdd
        $db_host = "localhost";
        $db_nombre = "gestion_db_imagen";
        $db_user = "root";
        $db_password = "";

        $conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);
        if ($conexion->errno) {
            echo "test errno: $conexion->errno";
            die($conexion->errno);
        }

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        $conexion->set_charset("utf-8");

        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");

        $sql = "SELECT IMAGEN FROM articulos WHERE NOMBREARTICULO='Tubos'";

        //$resultado = mysqli_query($conexion, $sql);
        $resultado = $conexion->query($sql);

        //while ($fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
        while ($fila = $resultado->fetch_assoc()) {
        $ruta_img = $fila["IMAGEN"];  
        }
            ?>
        <div><img src="<?php echo $ruta_img; ?>" alt="Foto articulo" width="25%"></div>
    </body>
</html>
