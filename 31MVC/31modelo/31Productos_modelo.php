<?php

class Productos_modelo {

    private $db;
    private $productos;

    function __construct() {
        //carga una vez 31Conectar_modelo
        //ruta como si estuviera en index
        require_once './31modelo/31Conectar_modelo.php';
        $this->db = Conectar::conexion();
        //convierto productos en array;
        $this->productos = array();
    }

    function getProductos() {
        $consulta = $this->db->query("SELECT * FROM articulos");

        //bucle que recorre recorre registros hasta el final devolviendo array asociativo
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->productos[] = $filas;
        }
        //devuelve array de productos
        return $this->productos;
    }
}

?>