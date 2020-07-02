<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo Paginación</title>
    </head>
    <body>
        <?php
        //conexion con base de datos, activar deteccion de errores y lanzar excepcion
        try {
            //conexion ( host,nombre db, usuario, password )
            $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec('SET CHARACTER SET UTF8');

            // registros por pagina 3
            $tamagnoPaginas = 3;


            //este bloque se ejecuta si hemos pulsado un numero de pagina
            if (isset($_GET["miPagina"])) {
                if ($_GET["miPagina"] == 1) {
                    //si pulsamos 1 recarga pagina
                    header("Location:30indexPaginacion.php");
                } else {
                    $pagina = $_GET["miPagina"];
                }
            } else {

                //si no ha hecho click pagina inicial es la primera
                $pagina = 1;
            }


            $sql = "SELECT NOMBREARTICULO, SECCION, PAISDEORIGEN, PRECIO FROM articulos WHERE SECCION='DEPORTE'";

            $resultado = $base->prepare($sql);

            $resultado->execute(array());
            
             //calcula a partir de que registro comienza. En la pagina 1 empieza desde 0, en la pagina 2 desde 3, etc
            $empezarDesde = ($pagina - 1) * $tamagnoPaginas;

            //numero de registros
            $numFilas = $resultado->rowCount();

            //calcula el numero de paginas necesarias según numero de registros y cuantos muestra por pantalla
            //ceil() redondea por arriba
            $totalPaginas = ceil($numFilas / $tamagnoPaginas);

            echo "Número de registros de la consulta: " . $numFilas . "<br>";
            echo "Número de páginas : " . $totalPaginas . "<br>";
            echo "Estamos en página : " . $pagina . " de " . $totalPaginas . "<br>";

            $resultado->closeCursor();

            //############ repetimos consulta con limite
            //limit x,y mostrar desde registro x en bloques de tamaño y
            $sql_limit = "SELECT NOMBREARTICULO, SECCION, PAISDEORIGEN, PRECIO FROM articulos WHERE SECCION='DEPORTE' LIMIT $empezarDesde,$tamagnoPaginas";

            $resultado = $base->prepare($sql_limit);
            $resultado->execute(array());

            //avanza una posición y guarda el registro actual de forma asociativa. (La otra forma es por numero de columna)
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "Nombre Artículo: " . $registro["NOMBREARTICULO"] . " Sección: " . $registro["SECCION"] .
                " País de Origen: " . $registro["PAISDEORIGEN"] . " Precio: " . $registro["PRECIO"] . "<BR>";
            }
        } catch (Exception $exc) {
            die("Error: " . $exc->getMessage());
            echo $exc->getLine();
        }

        //######### paginacion

        //crea una serie de links con numero de pagina. La var miPagina contendrá el valor numérico para capturar con $_GET
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo "<a href='?miPagina=" . $i . "'>" . $i . "</a>";
        }
        ?>
    </body>
</html>
