<?php

$db_host = "localhost";
$db_nombre = "gestion_db_imagen";
$db_user = "root";
$db_password = "";

//$conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);
//$conexion= new mysqli($db_password, $db_user, $db_nombre, $db_host);
$conexion = new mysqli($db_host, $db_user, $db_password, $db_nombre);

//si caracteres no salen bien se puede probar con
//mysqli_set_charset($conexion, "utf-8");
$conexion->set_charset("utf-8");

// mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
if ($conexion->connect_errno) {

    //si error, imprime mensaje y salir del código php
    echo "fallo al conectar<br>";
    echo $conexion->connect_errno . "<br>";
}
mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");

//recibimos los datos del archivo en array super Global $_Files con muchas propiedades ( name, type, size, tmp_name, etc

$archivo = $_FILES["fileToUpload"]["tmp_name"];
$tamanio = $_FILES["fileToUpload"]["size"];
$tipo = $_FILES["fileToUpload"]["type"];
$nombre = $_FILES["fileToUpload"]["name"];

if ($archivo != "none") {
    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp);
}

echo "$archivo,$tamanio,$tipo,$contenido<br>";


$sql = "INSERT INTO ficheros VALUES (0,'$nombre','$tipo','$contenido')";

$resultado = $conexion->query($sql);


if (mysqli_affected_rows($conexion) > 0) {
    print "Se ha guardado el archivo en la base de datos.";
} else {
    print "No se ha podido subir el archivo al servidor";
}

$sql = "SELECT * FROM ficheros";
//$resultado = mysqli_query($conexion, $sql);
$resultado = $conexion->query($sql);

echo "<table id='tablaListadoID'>";
echo "<tr><th>ID</th><th>NOMBRE</th><th>TIPO</th><th>CONTENIDO</th></tr>";

//while ($fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr><td>" . $fila['ID'] . "</td>";
    echo "<td>" . $fila['NOMBRE'] . "</td>";
    echo "<td>" . $fila['TIPO'] . "</td>";
    echo "<td><img src='data:image/png; base64," . base64_encode($fila['CONTENIDO']) . "'></td>";
    echo "</tr>";
     
}
echo "</table>";
?>