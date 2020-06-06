<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
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



            $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', "");

            //atributos que sirven para que la base de datos lance errores si los hay
            //hay mas atributos diferentes, mirar manual
            $base->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING);

            $base->exec("SET CHARACTER SET utf8");

            $sql = "SELECT ID,SECCION,NOMBREARTICULO,PAISDEORIGEN,FECHA,PRECIO FROM articulos WHERE PAISDEORIGEN = :mPAIS "
                    . "AND SECCION = :mSECCION";

            $resulStatement = $base->prepare($sql);

            //echo "test resulStatement->queryString: $resulStatement->queryString<br>";

            $paramPais = $_GET["buscarPais"];
            $paramSeccion = $_GET["buscarSeccion"];


            $resulStatement->execute(array(":mPAIS" => $paramPais, "mSECCION" => $paramSeccion));


            // $resulStatement->fetch(PDO::FETCH_ASSOC)es como next de Java
            // se puede hacer fetch(PDO::FETCH_ASSOC) para devolver array asociativo 
            //PDO::FETCH_BOTH Especifica que el método de obtención debe devolver cada fila como un array indexado
            //tanto por los nombres como por los números de las columnas devueltos en el correspondiente
            // conjunto de resultados, comenzando por la columna 0. 
            while ($row = $resulStatement->fetch(PDO::FETCH_ASSOC)) {
                echo "ID: " . $row['ID'] . " SECCION: " . $row['SECCION'] . " N_ARTICULO: " . $row['NOMBREARTICULO'] . " PAIS: " . $row['PAISDEORIGEN'] . " PRECIO: " . $row['PRECIO'] . "<br>";
            }
            
            $resulStatement->closeCursor();
        } catch (Exception $e) {
            echo "ERROR!<br>";
            echo $e->getMessage();
        } finally {
            $base = null;
            echo "base = null <br>";
        }
        ?>
    </body>
</html>
