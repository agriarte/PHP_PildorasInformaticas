<?php

class Conexion {

    protected $conexion_db;

    public function Conexion() {
        // conexion con PDO
        /* crear objeto conexion PDO, setear atributos para control de errores, poner utf8
         * devolver objeto conexion
         */
        $dsn = 'mysql:dbname=gestionpedidos;host=localhost';
        $usuario = 'root';
        $password = '';

        try {
            $this->conexion_db = new PDO($dsn, $usuario, $password);
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion_db->exec("SET CHARACTER SET utf8");
            return $this->conexion_db;
        } catch (Exception $e) {
            echo "ERROR en la linea " . $e->getLine();
        } finally {
            
        }
    }

    /* mysqli -----------------------------------------------------------------
      require "config.php";
      $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
      if ($this->conexion_db->connect_errno) {
      echo "Fallo al conectar a mysqli " . $this->conexion_db->connect_error;
      return;
      }
      $this->conexion_db->set_charset(DB_CHARSET);
      -------------------------------------------------------------------------- */
}
?>

