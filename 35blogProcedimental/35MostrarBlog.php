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
        <h2>Blog</h2>
        <hr/>
        <?php
        $miconexion = mysqli_connect("localhost", "root", "", "blog");
        //comprobar conexion
        if (!$miconexion) {
            echo "La conexión ha fallado: " . mysqli_error() . "<br>";
            exit();
        }
        $miconsulta = "SELECT * FROM contenido ORDER BY FECHA DESC";
        if ($resultado = mysqli_query($miconexion, $miconsulta)) {
            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo "<h3>" . $registro['TITULO'] . "<h3>";
                echo "<h4>" . $registro['FECHA'] . "<h4>";
                echo "<div style='width:400px'>" . $registro['COMENTARIO'] . "</div><br><br>";
                if ($registro['IMAGEN']!=""){
                    echo "<img src='./35imagenes/" . $registro['IMAGEN'] . "' style='width:400px' />";
                }
                echo "<br>Ruta de imagen: 35imagenes/" . $registro['IMAGEN'];
                echo "<hr/>";
                
            }
        }
        ?>
         
    </body>
</html>
