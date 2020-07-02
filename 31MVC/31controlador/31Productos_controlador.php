<?php

//al incluir este archivo se hace conexion, se lee db y se recibe array con registros 
//require_once "../31modelo/31Productos_modelo.php";
//la ruta es como si estuviera en raiz por empezar desde INDEX
require_once "./31modelo/31Productos_modelo.php";
$producto = new Productos_modelo();

//se guarda array de productos
$matrizProductos=$producto->getProductos();


require_once './31vista/31Productos_vista.php';


?>