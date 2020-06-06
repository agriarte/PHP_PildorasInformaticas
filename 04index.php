<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>titulo de la web</title>
    </head>
    <body>
        <!--
        importante, usa el name no el id, para identificar elementos.
        label es solo una etiqueta, se podría usar <p>. Se usa por elegancia -->
        <form name="form1" action="" method="post" >
            <p>
                <label form="nume1">primer numero</label>
                <input type="text" name="num1_name" id="num1_id">

                <label form="nume2">segundo numero</label>
                <input type="text" name="num2_name" id="num2_id">

                <label form="operacion"></label>
                <select name="operacion_name" id="operacion_id">
                    <option>Suma</option>
                    <option>Resta</option>
                    <option>Multiplicacion</option>
                    <option>Division</option>
                    <option>Modulo</option>
                    <option>Incrementa</option>
                    <option>Decrementa</option> 
                </select>
            </p>
            <p>
                <input type="submit" name="button_name" id="button_id" value="Enviar" onclick="Prueba">
            </p>

        </form>

        <?php
        //ejemplo de php combinado entre parte include y parte en archivo html

        include ("04calculadora.php");

        if (isset($_POST["button_name"])) {
            $numero1 = $_POST["num1_name"];
            $numero2 = $_POST["num2_name"];
            $operacion = $_POST["operacion_name"];

            $textoPrueba = "'este texto está en una variable global'";

            //la function calcular esta dentro de "calculadora.php.
            calcular($operacion, $numero1, $numero2);
        }
        ?>

    </body>
</html>