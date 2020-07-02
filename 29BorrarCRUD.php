<?php
include './29Conexion.php';

$miId = $_GET['id'];

$base->query("DELETE FROM personas WHERE ID= '$miId' ");

header("Location:29indexCRUD.php");

?>
