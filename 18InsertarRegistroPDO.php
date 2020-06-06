<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Registro</title>
    </head>
    <body>
        <?php
        //###valores formulario###
        $seccion = $_POST['seccion'];
        $nombre = $_POST['n_art'];
        $fecha = $_POST['fecha'];
        $pais = $_POST['p_orig'];
        $precio = $_POST['precio'];



        if (isset($_POST["boton_borrar"])) {
            $ID = $_POST["ID"];
            echo "test id=$ID<br>";
            try {
                $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', "");

                //atributos que sirven para que la base de datos lance errores si los hay
                //hay mas atributos diferentes, mirar manual
                $base->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING);

                $base->exec("SET CHARACTER SET utf8");

                $sql = "DELETE FROM articulos WHERE ID =:ID";

                $resulStatement = $base->prepare($sql);

                echo "test $resulStatement->queryString <br>";

                $resulStatement->execute(array(":ID" => $ID));

                echo "Registro ELIMINADO<br>";

                $resulStatement->closeCursor();
            } catch (Exception $e) {
                echo "ERROR!<br>";
                echo $e->getMessage();
            } finally {
                $base = null;
                echo "base = null <br>";
            }
        }



        if (isset($_POST["boton_insertar"])) {
            try {
                //resumen del ejemplo:
                //crear objeto PDO llamado $base;
                //setear utf8;
                //sentencia sql con :Marcadores para las consultas preparadas
                //crear objeto resultStatement
                //ejecutar una consulta sustituyendo los :Marcadores por arrays(":Marcador"=>parametro)
                //
                //con $row = $resulStatement->fetch(PDO::FETCH_ASSOC) obtenemos
                //un array asociativo de parejas [nombre columna], campo
                //que vamos recorriendo en bucle while. ( al estilo del next() de java)

                echo "test $seccion, $nombre, $fecha, $pais, $precio <br>";

                $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', "");

                //atributos que sirven para que la base de datos lance errores si los hay
                //hay mas atributos diferentes, mirar manual
                $base->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING);

                $base->exec("SET CHARACTER SET utf8");

                $sql = "INSERT INTO articulos (SECCION,NOMBREARTICULO,PAISDEORIGEN,FECHA,PRECIO) "
                        . "VALUES (:mseccion,:mnombrearticulo,:mpais,:mfecha,:mprecio)";

                $resulStatement = $base->prepare($sql);

                echo "test $resulStatement->queryString <br>";

                $resulStatement->execute(array(":mseccion" => $seccion, ":mnombrearticulo" => $nombre, ":mpais" => $pais, ":mfecha" => $fecha, ":mprecio" => $precio));

                echo "Registro insertado<br>";

                $resulStatement->closeCursor();
            } catch (Exception $e) {
                echo "ERROR!<br>";
                echo $e->getMessage();
            } finally {
                $base = null;
                echo "base = null <br>";
            }
        }
        ?>
    </body>
</html>
