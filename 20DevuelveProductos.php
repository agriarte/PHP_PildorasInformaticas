<?php

require "20Conexion.php";

class DevuelveProductos extends Conexion {

    public function DevuelveProductos() {

        parent::Conexion();
    }

    public function getProductos() {
        $sql = "SELECT * FROM articulos";
        $consultaprep = $this->conexion_db->prepare($sql);
        $consultaprep->execute(array());
        $resultado = $consultaprep->fetchAll(PDO::FETCH_ASSOC);

        $consultaprep->closeCursor();

        return $resultado;

        $this->conexion_db = null;
    }

    /* mysqli-------------------------------------------------------------------------
      $resultado= $this->conexion_db->query('SELECT * FROM articulos');

      $productos=$resultado->fetch_all(MYSQLI_ASSOC);

      return $productos;
      ------------------------------------------------------------------------- */
}
?>

