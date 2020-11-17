<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="29hoja.css">


    </head>

    <body>

        <?php
        include './29Conexion.php';

        $conexion = $base->query("SELECT * FROM personas");
        //extraer array de objetos de todos los registros
        $registros = $conexion->fetchall(PDO::FETCH_OBJ);

        //si has pulsado el boton INSERTA name=cr
        //coge valores de los input text Nom,Ape y Dir

        if (isset($_POST['cr'])) {
            $nom = $_POST['Nom'];
            $ape = $_POST['Ape'];
            $dir = $_POST['Dir'];

            $sql = "INSERT INTO PERSONAS (NOMBRE, APELLIDOS, DIRECCION) VALUES (:miNom, :miApe, :miDir)";

            $resultado = $base->prepare($sql);
            $resultado->execute(array(":miNom" => $nom, ":miApe" => $ape, "miDir" => $dir));

            header("Location:29indexCRUD.php");
        }
        ?>


        <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table width="50%" border="0" align="center">
                <tr >
                    <td class="primera_fila">Id</td>
                    <td class="primera_fila">Nombre</td>
                    <td class="primera_fila">Apellido</td>
                    <td class="primera_fila">Dirección</td>
                    <td class="sin">&nbsp;</td>
                    <td class="sin">&nbsp;</td>
                    <td class="sin">&nbsp;</td>
                </tr> 

                <?php foreach ($registros as $persona): ?>

                    <tr>
                        <td><?php echo $persona->ID ?></td>
                        <td><?php echo $persona->NOMBRE ?></td>
                        <td><?php echo $persona->APELLIDOS ?></td>
                        <td><?php echo $persona->DIRECCION ?></td>

                        <td class="bot"><a href="29BorrarCRUD.php?id=<?php echo $persona->ID ?>" ><input type='button' name='del' id='del' value='Borrar'></a></td>
                        
                        <td class='bot'><a href="29EditarCRUD.php?id=<?php echo $persona->ID ?> 
                                           & nom=<?php echo $persona->NOMBRE ?>
                                           & ape=<?php echo $persona->APELLIDOS ?>
                                           & dir=<?php echo $persona->DIRECCION ?>
                                           "> <input type='button' name='up' id='up' value='Actualizar'></a></td>
                    </tr>
                    <?php
                endforeach;
                ?>
                <tr>
                    <td></td>
                    <td><input type='text' name='Nom' size='10' class='centrado'></td>
                    <td><input type='text' name='Ape' size='10' class='centrado'></td>
                    <td><input type='text' name=' Dir' size='10' class='centrado'></td>
                    <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
            </table>

        </form>

        <p>&nbsp;</p>
    </body>
</html>