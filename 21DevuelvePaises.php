<?php

require "20Conexion.php";

class DevuelvePaises extends Conexion {

    public function DevuelvePaises() {

        parent::Conexion();
    }

    public function getProductosPais($dato) {

        $sql = 'SELECT * FROM articulos WHERE PAISDEORIGEN= "' . $dato . '"'
                ;
        $consultaprep = $this->conexion_db->prepare($sql);
        
        $consultaprep->execute(array());
        
        $resultado = $consultaprep->fetchAll(PDO::FETCH_ASSOC);

        $consultaprep->closeCursor();

        return $resultado;

        $this->conexion_db = null;
    }

    /* -------------------------------------------------------

      $resultado = $this->conexion_db->query('SELECT * FROM articulos WHERE PAISDEORIGEN= "' . $dato . '"');

      $productos = $resultado->fetch_all(MYSQLI_ASSOC);

      return $productos;
      --------------------------------------------- */
}
?>

