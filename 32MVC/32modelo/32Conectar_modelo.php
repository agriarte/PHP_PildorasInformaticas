<!--

-->
<?php

class Conectar {

    //método estático para abrir conexión. No requiere instanciar
    //conexion con base de datos, activar deteccion de errores y lanzar excepción si hay error
    //UTF8 para caracteres latinos
    //devuelve $conexion

    public static function conexion() {

        try {
            //conexion ( host,nombre db, usuario, password )
            $conexion = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec('SET CHARACTER SET UTF8');
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
            echo $exc->getLine();
        }

        return $conexion;
    }

}
?>
