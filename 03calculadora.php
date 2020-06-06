<style>
    .estiloResaltado{
        color: salmon;
        font-weight: bold;
        font-size: medium;
    }
</style>

<?php

//importante, usa el name no el id, para identificar elementos
//label es solo una etiqueta, se podría usar <p>. Se usa por elegancia

if (isset($_POST["button_name"])) {
    $numero1 = $_POST["num1_name"];
    $numero2 = $_POST["num2_name"];
    $operacion = $_POST["operacion_name"];
    
    $textoPrueba="'este texto está en una variable global'";
    
    
    calcular($operacion,$numero1,$numero2);
    
}

function calcular($miOperacion,$numero1,$numero2){
    //en esta funcion las variables de fuera no tienen alcance. Una solución
    //puede ser pasarla como parámetro.
    //Otra opcion es declararla de nuevo como
    //global en la funcion y PHP sabrá que debe buscarla fuera de la funcion
    
    global $textoPrueba;
   
    echo "<p class='estiloResaltado'> prueba </p>";
    echo "aqui sin resaltar: $textoPrueba <br>";


    echo "Test> normal strcmp para Suma = " . strcmp($miOperacion, "Suma") . "<br>";
    echo "Test>!strcmp para Suma = " . (!strcmp($miOperacion, "Suma")) . "<br>";

    //strcmp = 0, osea FALSE, si son iguales. Con ! le damos la vuelta a
    //la lógica. SI !(no FALSE) { lo que sea }
    if (!strcmp($miOperacion, "Suma")) {
        echo $textoPrueba;
        echo "<p class='estiloResaltado'>La suma es " . ($numero1 + $numero2 . " </p>");
    }
    if (!strcmp($miOperacion, "Resta")) {
        echo "La resta es " . ($numero1 - $numero2);
    }
    if (!strcmp($miOperacion, "Multiplicacion")) {
        echo "La multiplicacion es " . ($numero1 * $numero2);
    }
    if (!strcmp($miOperacion, "Division")) {
        echo "La división es " . ($numero1 / $numero2);
    }
    if (!strcmp($miOperacion, "Modulo")) {
        echo "El módulo es " . ($numero1 % $numero2);
    }
}
?>

