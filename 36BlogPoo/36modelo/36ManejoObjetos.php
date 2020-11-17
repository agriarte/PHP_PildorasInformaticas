<?php

include_once ("36ObjetoBlog.php");

class ManejoObjetos {

    private $conexion;

    function __construct($conexion) {
        $this->setConexion($conexion);
    }

    public function setConexion(PDO $conexion) {
        $this->conexion = $conexion;
    }

    //Función que lee toda la bbdd
    //se crea un array donde recoger cada registro
    //se hace consulta de tipo asociativa a la bbdd y cada registro se guarda en
    //en el array. El indice del array es $contador
    public function getContenidoFecha() : array {
        $matriz = array();
        $contador = 0;
        $resultado = $this->conexion->query("SELECT * FROM contenido ORDER BY FECHA DESC");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $blog = new ObjetoBlog();

            $blog->setId($registro['ID']);
            $blog->setTitulo($registro['TITULO']);
            $blog->setFecha($registro['FECHA']);
            $blog->setComentario($registro['COMENTARIO']);
            $blog->setImagen($registro['IMAGEN']);
            
            $matriz[$contador]=$blog;
            $contador++;
        }
        return $matriz;
    }
   
    //insertar nuevo registro
    public function insertaContenido(ObjetoBlog $blog) {
        $sql = "INSERT INTO contenido (TITULO,FECHA,COMENTARIO,IMAGEN) VALUES ('" . $blog->getTitulo() . "' , '" . $blog->getFecha() . "' , '" . $blog->getComentario() . "' , '" . $blog->getImagen() . "')";
        $this->conexion->exec($sql);      
    }
}

?>
