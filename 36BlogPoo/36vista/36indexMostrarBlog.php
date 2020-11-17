<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../36modelo/36ManejoObjetos.php';
        try {
            $miconexion = new PDO('mysql:host=localhost; dbname=blog', 'root', '');
            $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $miconexion->exec("SET CHARACTER SET utf8");
            //instacia nueva de ManejoObjetos
            $manejo_objetos = new ManejoObjetos($miconexion);
            //array que recibe los registros del blog
            $tabla_blog = $manejo_objetos->getContenidoFecha();
            if (empty($tabla_blog)) {
                echo "<br>No hay registros<br>";
            } else {
                //recorrer array con foreach
                foreach ($tabla_blog as $valor) {
                    echo "<h3>" . $valor->getTitulo() . "</h3>";
                    echo "<h4>" . $valor->getFecha() . "</h2>";
                    echo "<div style='width:400px'>" . $valor->getComentario() . "</div>";
                    if ($valor->getImagen()!=""){
                        echo "<img src='../36imagenes/" . $valor->getImagen() . "' width='400px' height='300px' />";
                    }
                    echo "<hr/>";
                }
            }
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
        ?>
        
        <br/>
        <a href="36FormularioBlog.php">Volver a la página de inserción</a>
        
    </body>
</html>
