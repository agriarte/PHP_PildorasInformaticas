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
            //sentencia sql con ? para las consultas preparadas
            //crear objeto resultStatement
            //ejecutar una consulta sustituyendo los ? por arrays("parametro")
            //
            //con $row = $resulStatement->fetch(PDO::FETCH_ASSOC) obtenemos
            //un array asociativo de parejas [nombre columna], campo
            //que vamos recorriendo en bucle while. ( al estilo del next() de java)
            
            
            
            $base = new PDO('mysql:host=localhost; dbname=gestionpedidos', 'root', "");
            $base->exec("SET CHARACTER SET utf8");
               
            $sql = "SELECT ID,SECCION,NOMBREARTICULO,PAISDEORIGEN,FECHA,PRECIO FROM articulos WHERE PAISDEORIGEN= ?";
            
            $resulStatement=$base->prepare($sql);
            
            //echo "test resulStatement->queryString: $resulStatement->queryString<br>";
            
            $param1=$_GET["buscarLabel"];
            
            $resulStatement->execute(array($param1));
           
            // $resulStatement->fetch(PDO::FETCH_ASSOC)es como next de Java
            // se puede hacer fetch(PDO::FETCH_ASSOC) para devolver array asociativo 
             //PDO::FETCH_BOTH Especifica que el método de obtención debe devolver cada fila como un array indexado
             //tanto por los nombres como por los números de las columnas devueltos en el correspondiente
             // conjunto de resultados, comenzando por la columna 0. 
            while ($row = $resulStatement->fetch(PDO::FETCH_BOTH)) {
                echo "ID: " . $row['ID'] . " SECCION: " . $row['SECCION'] . " N_ARTICULO: " . $row['NOMBREARTICULO'] . " PAIS: " . $row['PAISDEORIGEN'] . " PRECIO: " . $row['PRECIO'] . "<br>";
            }
            
             echo "test por numero de columna:<br>";
             $resulStatement->execute(array($param1));
            while ($row = $resulStatement->fetch(PDO::FETCH_BOTH)) {
                echo "ID: " . $row[0] . " SECCION: " . $row[1] . " N_ARTICULO: " . $row[2] . " PAIS: " . $row[3] . " PRECIO: " . $row[4] . "<br>";
            }
           
            
            
            $resulStatement->closeCursor();
            
                } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $base=null;
        }
        ?>
    </body>
</html>
