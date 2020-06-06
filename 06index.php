<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <p> Empiezan las BBDD </p>

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
        $conexion = mysqli_connect($db_host, $db_user, $db_password, $db_nombre);

        //si caracteres no salen bien se puede probar con
        //mysqli_set_charset($conexion, "utf-8");
        // mysqli_connect_errno() devuelve true si no encuentra o conecta con BBDD
        if (mysqli_connect_errno()) {

            //si error, imprime mensaje y salir del código php
            echo "fallo al conectar<br>";
            exit();
        }

        //$consulta = "SELECT * FROM articulos";
        //$consulta = "SELECT * FROM articulos WHERE seccion='Ceramica'";
        //busqueda con %loquesea% buscará campos que contengan esos caracteres.
        //existe la forma %palabra o palabra% para buscar a partir de x caracteres 
        //o después. En mis pruebas mas cómodo y eficaz %palabra%
        $consulta = "SELECT * FROM articulos WHERE seccion LIKE '%RR%'";

        $resultado = mysqli_query($conexion, $consulta);

        //en java para recorrer una bbdd se usa resultado.Next();
        //en php lo equivalente mysqli_fetch_row($resultado)
        //cada vez que se llama avanza en el indice de la resultset y además dará 
        //true si existe un siguiente registro
        //ATENCION con while: almacenamos en $fila el indice actual, avanza de posición y además
        //devuelve true mientras haya un siguiente
        //$fila es un array indexado del registro actual que almacena todas sus columnas o campos
        //para recorer array $fila podemos usar $fila[1],$fila[2] o bucle foreach
        //existe también otra forma de trabajar con arrays asociativo. La diferencia está en que 
        //en lugar de usar un indice para las columnas se usa el nombre de los campos. Ver index07 para ejemplo.
        //Para meter dentro de una tabla las etiquetas básicas son:
        //<table></table> abrir y cerrar tabla
        //<tr> nueva linea 
        //<td> nueva columna
        //la decoración de la tabla se podría hacer desde html. Actualmente es mas 
        //correcto hacerlo con etiquetas de estilo css
        echo "<table id='tablaListadoID'>";
        echo "<tr><th>Registro</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";
        while ($fila = mysqli_fetch_row($resultado)) {
            
            echo "<tr><td>$fila[0]</td>";
            echo "<td>$fila[1]</td>";
            echo "<td>$fila[2]</td>";
            echo "<td>$fila[3]</td>";
            echo "<td>$fila[4]</td>";
            echo "<td>$fila[5]</td></tr>";
        }


        /* while ($fila = mysqli_fetch_row($resultado)) {
          echo "<table id='customers'> <tr>";
          //echo "$fila[1] $fila[2] <br>";
          foreach ($fila as $value) {
          echo "<td> $value </td>";
          }
          echo "</tr>";
          }
          echo "</table>"; */
        ?>
    </body>
</html>

