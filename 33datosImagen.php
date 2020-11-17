<?php

//recibimos los datos de la imagen en array super Global $_Files con muchas propiedades de la imagen ( name, type, size, tmp_name, etc

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$tipoArchivo = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($tipoArchivo != "jpg" && $tipoArchivo != "png" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo " target_dir = $target_dir <br>";
echo " target_file = $target_file <br>";


// datos básicos de conexión a BBDD
//ruta, para pruebas localHost.
//usuario
//contraseña
//conexion
// es lo mismo que en java:
//Connection miCon = DriverManager.getConnection("jdbc:mysql://db4free.net:3306/basedatospruebas", "agriarte", "Colores2019!");

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



    $sql = "SELECT * FROM articulos";

//$resultado = mysqli_query($conexion, $sql);
    $resultado = $conexion->query($sql);



    echo "<table id='tablaListadoID'>";
    echo "<tr><th>ID</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";

//while ($fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila['ID'] . "</td>";
        echo "<td>" . $fila['SECCION'] . "</td>";
        echo "<td>" . $fila['NOMBREARTICULO'] . "</td>";
        echo "<td>" . $fila['FECHA'] . "</td>";
        echo "<td>" . $fila['PAISDEORIGEN'] . "</td>";
        echo "<td>" . $fila['PRECIO'] . "</td>";
    }

    $sql = "UPDATE articulos SET IMAGEN='$target_file' WHERE NOMBREARTICULO='Tubos'";
    $resultado = $conexion->query($sql);
}
