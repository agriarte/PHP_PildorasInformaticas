<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $miconexion = mysqli_connect("localhost", "root", "", "blog");
        //comprobar conexion
        if (!$miconexion) {
            echo "La conexión ha fallado: " . mysqli_error() . "<br>";
            exit();
        }

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
                $destino_imagenes = "35imagenes/";
                move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_imagenes . $_FILES['imagen']['name']);

                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado al directorio<br>";
            } else {
                echo "Error. No se ha copiado el archivo<br>";
            }
        }

        //insertar en bbdd
        $eltitulo = $_POST['campo_titulo'];
        $lafecha = date("Y-m-d H:i:s");
        $elcomentario = $_POST['area_comentarios'];
        $laimagen = $_FILES['imagen']['name'];
        $miconsulta = "INSERT INTO contenido (TITULO,FECHA,COMENTARIO,IMAGEN) VALUES ('" . $eltitulo . "' , '" . $lafecha . "' , '" . $elcomentario . "' , '" . $laimagen . "')";
        $resultado = mysqli_query($miconexion, $miconsulta);
        //cerramos conexion
        mysqli_close($miconexion);

        echo '<br> Entrada grabada correctamente <br><br>';
        ?>
    </body>
</html>
