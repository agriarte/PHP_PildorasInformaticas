<!DOCTYPE html>
 <!-- <th> cabecera <tr> linea row <td> celda data cell -->
 <!-- hover: color fondo al pasar raton -->
 <!-- border-collapse: collapse hace que los bordes de la tabla y celdas
      se fusionen en una sola línea -->
<html>
    <head>
        <title>BBDD</title>
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
        <p> Conexión con POO a BBDD </p>

        <?php
        // datos básicos de conexión a BBDD
        //ruta, para pruebas localHost.
        //usuario
        //contraseña
        //conexion
        // es lo mismo que en java:
        //Connection miCon = DriverManager.getConnection("jdbc:mysql://db4free.net:3306/basedatospruebas", "agriarte", "Colores2019!");

        $db_host = "localhost";
        $db_nombre = "gestionpedidos";
        $db_user = "root";
        $db_password = "";
        
        //$conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);
        //$conexion= new mysqli($db_password, $db_user, $db_nombre, $db_host);
        $conexion= new mysqli($db_host, $db_user, $db_password, $db_nombre);
        
        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        $conexion->set_charset("utf-8");
        
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if ($conexion->connect_errno) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            echo $conexion->connect_errno . "<br>";
            
        }
        

        $sql = "SELECT * FROM articulos";
        
        //$resultado = mysqli_query($conexion, $sql);
        $resultado=$conexion->query($sql);
        
        if($conexion->errno){
            echo "test errno: $conexion->errno";
            die($conexion->errno);
        }
 
        echo "<table id='tablaListadoID'>";
        echo "<tr><th>ID</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";
        
        //while ($fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
        while ( $fila=$resultado->fetch_assoc()){
            echo "<tr><td>" . $fila['ID'] . "</td>";
            echo "<td>". $fila['SECCION'] . "</td>" ;
            echo "<td>". $fila['NOMBREARTICULO'] . "</td>";
            echo "<td>". $fila['FECHA'] . "</td>";
            echo "<td>". $fila['PAISDEORIGEN'] . "</td>";
            echo "<td>". $fila['PRECIO'] . "</td>";
        }


       
        ?>
    </body>
</html>


