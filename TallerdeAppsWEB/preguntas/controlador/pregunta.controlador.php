<?php
require_once './preguntas/modelo/Pregunta.php';

class PreguntaControlador{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Pregunta();
    }
    
    public function Index(){
        require_once './preguntas/vista/header.php';
        require_once './preguntas/vista/pregunta/pregunta.php';
        require_once './preguntas/vista/footer.php';
    }
    
    public function Crud(){
        $alm = new Pregunta();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once './preguntas/vista/header.php';
        require_once './preguntas/vista/pregunta/preguntaEditar.php';
        require_once './preguntas/vista/footer.php';
    }
    
    public function Guardar(){
        $alm = new Pregunta();
        
        $alm->id = $_REQUEST['id'];
        $alm->Titulo = $_REQUEST['Titulo'];
        $alm->Fecha = $_REQUEST['Fecha'];
        $alm->Comentario = $_REQUEST['Comentario'];
        $alm->Archivo = $_REQUEST['Archivo'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexPfFrontController.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: indexPfFrontController.php');
    }
}
