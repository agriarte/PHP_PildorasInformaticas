<?php

//conexion con base de datos, activar deteccion de errores y lanzar excepcion
try {
    //conexion ( host,nombre db, usuario, password )
    $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec('SET CHARACTER SET UTF8');
} catch (Exception $exc) {
    die("Error: " . $exc->getMessage());
    echo $exc->getLine();
} finally {
    
}
?>

