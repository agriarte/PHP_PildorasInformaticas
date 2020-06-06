<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documento sin título</title>
        <style>
            h1{
                text-align:center;
            }

            table{
                background-color:#FFC;
                padding:5px;
                border:#666 5px solid;
            }

            .no_validado{
                font-size:18px;
                color:#F00;
                font-weight:bold;
            }

            .validado{
                font-size:18px;
                color:#0C3;
                font-weight:bold;
            }


        </style>
    </head>

    <body>
        <h1>USANDO OPERADORES COMPARACIÓN</h1>

        <form action="" method="post" name="datos_usuario" id="datos_usuario">
            <table width="15%" align="center">
                <tr>
                    <td>Nombre:</td>
                    <td><label for="nombre_usuario"></label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario_id"></td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td><label for="edad_usuario"></label>
                        <input type="text" name="edad_usuario" id="edad_usuario_id"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="boton_enviando" id="enviando_id" value="Enviar"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST["boton_enviando"])) {

            $nombre = $_POST["nombre_usuario"];
            $edad = $_POST["edad_usuario"];

            if ($nombre == "Pedro" && $edad >= 18) {
                echo "<p class='validado'>Puedes entrar $nombre </p>";
            } else {
                echo "<p class='no_validado'>No puedes entrar $nombre </p>";
            }

            // if anidados
            if ($edad < 18) {
                echo "Eres menor de edad <br>";
            } else if ($edad >= 18 && $edad <= 45) {
                echo "Eres joven<br>";
            } else if ($edad >= 45 && $edad <= 65) {
                echo "Eres maduro<br>";
            } else if ($edad > 65) {
                echo "Cuídate<br>";
            }

            //operador ternario
            // condicion ? Verdarero : Falso
            echo $nombre == "Pedro" ? "Verdadero, eres Pedro<br>" : "Falso, no eres Pedro<br>";
            //tambien se pueden usar operadores lógicos
            echo ($nombre == "Juan" && $edad = 18) ? "se cumple Juan y 18<br>" : "No se cumple Juan y 18<br>";

            //condicional Switch Case
            switch ($nombre) {
                case "Pedro":
                    echo "case detecta Pedro<br>";
                    break;
                case "Juan":
                    echo "case detecta Juan<br>";
                    break;
                case "Maria":
                    echo "case detecta Maria<br>";
                    break;
                default:
                    echo "default , ninguno de 3<br>";
                    break;
            }
        }
        ?>
    </body>

</html>
