<?php
require_once './preguntas/modelo/DataBase.php';

$controlador = 'pregunta';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "preguntas/controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'Controlador';
    $controlador = new $controlador;
    $controlador->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controlador = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "preguntas/controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'Controlador';
    $controlador = new $controlador;
    
    // Llama la accion
    call_user_func( array( $controlador, $accion ) );
}

?>

