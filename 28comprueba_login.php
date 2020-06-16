<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin título</title>
    </head>

    <body>


        <?php
        try {

            $login = htmlentities(addslashes($_POST["login"]));

            $password = htmlentities(addslashes($_POST["password"]));

            //variable bandera para saber si el login esta en la base de datos
            $contador = 0;


            $base = new PDO("mysql:host=localhost; dbname=gestionpedidos", "root", "");

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = "SELECT * FROM usuarios WHERE USUARIO= :login";

            $resultado = $base->prepare($sql);

            $resultado->execute(array(":login" => $login));

            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

                //echo "Usuario: " . $registro['USUARIO'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";
                //comparar password del formulario con el password cifrado de bbdd
                //si existe incrementa contador

                if (password_verify($password, $registro['PASSWORD'])) {
                    $contador++;
                }
                //Si encontró un login...
                if ($contador > 0) {
                    echo "Usuario registrado";
                } else {
                    echo "Usuario no registrado";
                }
            }

            $resultado->closeCursor();
        } catch (Exception $e) {

            die("Error: " . $e->getMessage());
        }
        ?>
    </body>
</html>