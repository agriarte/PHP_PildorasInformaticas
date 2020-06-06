<style>
    .estiloResaltado{
        color: salmon;
        font-weight: bold;
        font-size: medium;
    }
</style>

<?php





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
        echo "<p class='estiloResaltado'>La resta es " . ($numero1 - $numero2 . "</p>");
    }
    if (!strcmp($miOperacion, "Multiplicacion")) {
        echo "<p class='estiloResaltado'>La multiplicacion es " . ($numero1 * $numero2) . " </p>";
    }
    if (!strcmp($miOperacion, "Division")) {
        echo "<p class='estiloResaltado'>La división es " . ($numero1 / $numero2) . " </p>";
    }
    if (!strcmp($miOperacion, "Modulo")) {
        echo "<p class='estiloResaltado'>El módulo es " . ($numero1 % $numero2) . " </p>";
    }
    if (!strcmp($miOperacion, "Incrementa")) {
        //OJO! no es como en java, primero debe hacerse la operacion
        $numero1++;
        $resultado=$numero1;
        echo "<p class='estiloResaltado'>El resultado de incrementar es " . ($resultado) . " </p>";
    }
    if (!strcmp($miOperacion, "Decrementa")) {
        $numero1--;
        $resultado=$numero1;
        echo "<p class='estiloResaltado'>El resultado de decrementar es " . ($resultado) . " </p>";
    }
}
?>

