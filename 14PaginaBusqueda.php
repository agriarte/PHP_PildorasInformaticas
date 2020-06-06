<!DOCTYPE html>
 <!-- <th> cabecera <tr> linea row <td> celda data cell -->
 <!-- hover: color fondo al pasar raton -->
 <!-- border-collapse: collapse hace que los bordes de la tabla y celdas
      se fusionen en una sola línea -->
<html>
    <head>
        <title>resultado busquedaBBDD</title>
        <style>
            #tablaListadoID {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 60%;
            }

            #tablaListadoID td, #tablaListadoID th {
                border: 1px solid #ddd;
                padding: 8px;
                padding-left: 16px;
                width: 16%;
            }

           
            #tablaListadoID tr:hover {background-color: #ddd;}

            #tablaListadoID th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
            }

        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        
        $pais = $_GET["buscarLabel"];
        
        echo "test $pais";
        
        $db_host = "localhost";
        $db_nombre = "gestionpedidos";
        $db_user = "root";
        $db_password = "";
        
        $conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if (mysqli_connect_errno()) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            exit();
        }

      
        $consulta = "SELECT ID,SECCION,NOMBREARTICULO,PAISDEORIGEN WHERE PAISDEORIGEN='$pais";
        
        $resultado = mysqli_prepare($conexion, $consulta);
        //"s" indica que la consulta es String
        $ok=mysqli_bind_param($resultado, "s" , $pais);
        //devuelve true si se hizo la consulta
        $ok=mysqli_execute($resultado);
        
        if ($ok==false){
            echo "Ocurrió un error para realizar la consulta<br>";
        } else {
            //obsoleto
            $ok= mysqli_bind_result($resultado, $miID,$miSeccion,$miNombre,$miPais);
            
            echo "Artículos encontrados:<br><br>";
            while (mysqli_stmt_fetch($resultado)) {
                echo $miID . " " . $miSeccion . " " . $miNombre . " " . $miPais . "<br>";
            }
            
            
        }
        
        
        
        
 
        echo "RESULTADOS NOMBRE ARTICULO = $busqueda<br/>";
          
        //echo "<table id='tablaListadoID'>";
       // echo "<tr><th>ID</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";
        
        while ($fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
            echo "<form action='12ModificarRegistro.php' method='get'>";
            echo "<input type='text' name='c_id' value= " . $fila['ID'] . " <br>";
            echo "<input type='text' name='c_seccion' value=' " . $fila['SECCION'] . " '<br>"; 
            echo "<input type='text' name='c_nombre' value=' " . $fila['NOMBREARTICULO'] . " '<br>"; 
            echo "<input type='text' name='c_fecha' value=' " . $fila['FECHA'] . " '<br>"; 
            echo "<input type='text' name='c_pais' value=' " . $fila['PAISDEORIGEN'] . " '<br>"; 
            echo "<input type='text' name='c_precio' value=' " . $fila['PRECIO'] . " '<br>"; 
            
            echo "<input type='submit' name='actualizarBtn' value='Actualizar'";
            
        }
        
        mysqli_close($conexion);
        ?>
    </body>
</html>
