<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documento sin título</title>
        <link rel="stylesheet" type="text/css" href="29hoja.css">
    </head>

    <body>

        <?php
        include './29Conexion.php';
        
        //si no he pulsado BotonActualizar leer valores de la bbdd
        if (!isset($_POST['bot_actualizar'])) {
            $id = $_GET['id'];
            $nom = $_GET['nom'];
            $ape = $_GET['ape'];
            $dir = $_GET['dir'];
        } else {
            //si hemos pulsado leer del formulario con POST, valor name del label para actualizar valores
             $id = $_POST['id'];
            $nom = $_POST['nom'];
            $ape = $_POST['ape'];
            $dir = $_POST['dir'];
            
            $sql= "UPDATE PERSONAS SET NOMBRE=:miNom, APELLIDOS=:miApe, DIRECCION=:miDir WHERE ID=:miId";
            
            $resultado=$base->prepare($sql);
            
            $resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, ":miApe"=>$ape, "miDir"=>$dir));
            
            header ("Location:29IndexCRUD.php");
        }
        ?>

        <h1>ACTUALIZAR</h1>

        <p>

        </p>
        <p>&nbsp;</p>
        <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="25%" border="0" align="center">
                <tr>
                    <td></td>
                    <td><label for="id"></label>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><label for="nom"></label>
                        <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><label for="ape"></label>
                        <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><label for="dir"></label>
                        <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
                </tr>
            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>