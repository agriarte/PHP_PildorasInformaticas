<!DOCTYPE html>
 <!-- <th> cabecera <tr> linea row <td> celda data cell -->
<!-- hover: color fondo al pasar raton -->
<!-- border-collapse: collapse hace que los bordes de la tabla y celdas
     se fusionen en una sola línea -->
<html>
    <head>
        <title>Busqueda BBDD una pantalla</title>
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

        <?php

        //el código en etiqueta HEAD para que se lea lo primero de todo

        function ejecutaConsulta($laBusqueda) {

            //$busqueda = $_GET["buscarLabel"];
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
            //$consulta = "SELECT * FROM articulos WHERE nombrearticulo LIKE = '%$busqueda%' ";
            //busqueda con %loquesea% buscará campos que contengan esos caracteres.
            //existe la forma %palabra o palabra% para buscar a partir de x caracteres 
            //o después. En mis pruebas mas cómodo y eficaz %palabra%
            $consulta = "SELECT * FROM articulos WHERE nombrearticulo LIKE '%$laBusqueda%'";

            $resultado = mysqli_query($conexion, $consulta);

            echo "<table id='tablaListadoID'>";
            echo "<tr><th>ID</th><th>Sección</th><th>Artículo</th><th>Fecha</th><th>País</th><th>Precio</th></tr>";

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

                echo "<tr><td>" . $fila['ID'] . "</td>";
                echo "<td>" . $fila['SECCION'] . "</td>";
                echo "<td>" . $fila['NOMBREARTICULO'] . "</td>";
                echo "<td>" . $fila['FECHA'] . "</td>";
                echo "<td>" . $fila['PAISDEORIGEN'] . "</td>";
                echo "<td>" . $fila['PRECIO'] . "</td>";
            }

            mysqli_close($conexion);
        }
        ?>

    </head>
    <body>

        <?php
        //no confundir miBusqueda con laBusqueda
        $miBusqueda = $_GET["buscarLabel"];

        //variable para indicar que la información se envíe a la misma página
        //$miPagina = "09index1Pantalla.php"; es equivalente
        //si el formulario tiene el action a otro archivo php hará un salto de pantalla. En este caso es el mismo.
        //Podemos poner manualmente el nombre del archivo o dejar que php_self nos los diga
        $miPagina = $_SERVER['PHP_SELF'];


        echo "test $miPagina<br>";

        //la primera vez que arranca la pagina como no hay entrada hara ejecutaConsulta. 
        //Las siguientes veces cargará el form y hará la busqueda con los datos entrados
        if ($miBusqueda != null) {
            ejecutaConsulta($miBusqueda);
        } else {
            echo ("<form action='" . $miPagina . "' method='get'>
            <label>Buscar:<input type='text' name ='buscarLabel'></label>       
            <input type='submit' name='enviando' value='Dale!'>
            </form>");
        }
        ?>
    </body>
</html>
