<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once("../36modelo/36ObjetoBlog.php");
        include_once("../36modelo/36ManejoObjetos.php");

        try {
            $miconexion = new PDO('mysql:host=localhost; dbname=blog', 'root', '');
            $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $miconexion->exec("SET CHARACTER SET utf8");

            //controlar la entrada del archivo imagen. Errores y mover de temp a mi carpeta imagenes
            if ($_FILES['imagen']['error']) {
                switch ($_FILES['imagen']['error']) {
                    case 1://UPLOAD_ERR_INI_SIZE
                        echo "Tamaño de archivo excedido según archivo PHP.ini<br>";
                        break;
                    case 2://UPLOAD_ERR_FORM_SIZE
                        echo "Tamaño de archivo excedido según form html. 2 Mb<br>";
                        break;
                    case 3://UPLOAD_ERR_PARTIAL
                        echo "El envío de archivo se interrumpió<br>";
                        break;
                    case 4://UPLOAD_ERR_NO_FILE
                        echo "No se ha enviado ninguna imagen<br>";
                        break;
                }
            } else {
                echo "Entrada subida correctamente <br>";
                if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))) {
                    $destino_imagenes = "../36imagenes/";
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_imagenes . $_FILES['imagen']['name']);

                    echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado al directorio<br>";
                } else {
                    echo "Error. No se ha copiado el archivo<br>";
                }
            }
            $manejo_objetos = new ManejoObjetos($miconexion);
            $blog = new ObjetoBlog();

            //para setear asi ya funciona pero por seguridad se añaden funciones
            //htmlentities y addslashes
            //$blog->setTitulo($_POST['campo_titulo']);
            $blog->setTitulo(htmlentities(addslashes($_POST['campo_titulo']), ENT_QUOTES));
            $blog->setFecha(date("Y-m-d H:i:s"));
            $blog->setComentario(htmlentities(addslashes($_POST['area_comentarios']), ENT_QUOTES));
            $blog->setImagen(htmlentities(addslashes($_FILES['imagen']['name']), ENT_QUOTES));
            
            $manejo_objetos->insertaContenido($blog);
            
            echo '<br>Entrada subida correctamente<br>';
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
        ?>
    </body>
</html>
