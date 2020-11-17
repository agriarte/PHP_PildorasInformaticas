<?php

class Personas_modelo {

    private $db;
    private $personas;

    function __construct() {
        //ruta como si estuviera en index
        require_once './32modelo/32Conectar_modelo.php';
        $this->db = Conectar::conexion();
        //convierto $personas en array;
        $this->personas = array();
    }

    function getPersonas() {
        $consulta = $this->db->query("SELECT * FROM personas");

        //bucle que recorre recorre registros hasta el final devolviendo array asociativo
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->personas[] = $filas;
        }
        //devuelve array de productos
        return $this->personas;
    }
}

?>