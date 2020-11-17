<?php

class Pregunta {

    private $pdo;
    public $id;
    public $Titulo;
    public $Fecha;
    public $Comentario;
    public $Foto;

    public function __CONSTRUCT() {
        try {
            $this->pdo = DataBase::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM respuestas");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM respuestas WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM respuestas WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE respuestas SET
                        ID           = ?
			TITULO       = ?, 
			FECHA        = ?,
                        COMENTARIO   = ?,
			FICHERO      = ?, 
						";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->id,
                                $data->Titulo,
                                $data->Fecha,
                                $data->Comentario,
                                $data->Fichero
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data) {
        try {
            $sql = "INSERT INTO respuestas (TITULO,FECHA,COMENTARIO,FICHERO) 
		        VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $$data->Titulo,
                                $data->Fecha,
                                $data->Comentario,
                                $data->Fichero
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
