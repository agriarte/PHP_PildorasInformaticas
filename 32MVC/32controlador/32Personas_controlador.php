<?php

//la ruta es como si estuviera en raiz por empezar desde INDEX
require_once "./32modelo/32Personas_modelo.php";
$persona = new Personas_modelo();

//se guarda array de productos
$matrizPersonas=$persona->getPersonas();


require_once './32vista/32Personas_vista.php';


?>