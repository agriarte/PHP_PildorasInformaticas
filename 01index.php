<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>  
            .resaltar{
                color: #cc0000;
                font-weight:bold;                    
            }

            h1{
                text-align: center;
                color: blue;

            }
        </style> 

        <title>Primeras pruebas con PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



    </head>
    <body>
        <h1>Prueba de Style y H1</h1>        
        <?php
        print "Comenzamos curso de PHP<br>";
        print "pruebas con variables<br>";
        print "y concatenaciones<br>";

        $nombre = "pedro";
        $edad = 6;
        print "mi nombre es $nombre <br>";
        // ' ' comilla simple imprime el literal del nombre de variable
        // ""  comilla doble o fuera de comillas imprime valor
        // . concatena
        print '$nombre = ' . $nombre . "<br>";
        //echo es mas rápido y permite imprimir variables separadas por coma.
        //print es una función que devuelve 1
        //normalmente se usa echo
        echo $edad, $nombre . "<br>";

        function miFuncion() {
            echo "imprimiendo desde dentro de function <br> ";
        }

        miFuncion();

        include ("01dame_datos.php");

        dameDatos01();

        //también se puede hacer otro tipo de include con require (requerido)
        //la diferencia entre include y require es que si el archivo no existe
        //continua flujo de ejecución y require se detiene en el error.
        //### video 6 ambito de variables ###
        //el ambito local de las variables es solo dentro de las {}
        //para declarar variable global se usa global $miVariable;

        $nombreLocal = "Pepe";

        echo 'escribe $nombreLocal  ' . $nombreLocal . "<br>";

        function declararVariableGlobal() {
            //la variable global tiene ambito en todo el archivo
            global $nombreGlobal;
            $nombreGlobal = "Juan";
        }

        declararVariableGlobal();

        echo 'escribe $nombreGlobal ' . $nombreGlobal . "<br>";

        //### video 7 variables estáticas ###
        //las variables se reinician o destruyen cuando finaliza la ejecución de
        //la funcion. para que conserven valores se utiliza static al declararlas


        function ejecutaContador() {
            //$contador = 0; cada vez que se ejecute valdrá 0
            static $contador = 0; //se inicia una vez variable y conserva valor
            $contador++;
            echo 'variable estatica $contador= ' . $contador . "<br>";
        }

        ejecutaContador();
        ejecutaContador();
        ejecutaContador();

        //contador valdrá 3 porque es estática, sino cada vez se reiniciaría con 0
        //### video 8 uso de estilos y strings ###
        //los estilos son clases
        //<p> marca Párrafo
        //importante no usar mismas comillas dentro de comillas
        //otra opción es con uso de /antes de las comillas

        echo '<p class="resaltar"> Con Style hago texto resaltado </p>  ';

        echo "<p class=\"resaltar\"> Lo mismo pero usando otra forma de entrecomillar </p>  ";

        echo '<p class="resaltar"> USO DE STRCMP Y STRCASECMP </P> ';
        echo 'Comparación binaria de 2 string teniendo en cuenta mayusculas (strcasecmp) y sin (strcmp<br>';
        echo 'Si son iguales devuelve 0<br>';

        $variable1 = "Bici";
        $variable2 = "BICI";

        $resultado1 = strcasecmp($variable1, $variable2);
        $resultado2 = strcmp($variable2, $variable1); //devuelve 0 si no son iguales


        echo "$variable1 y $variable2 ' strcasecmp = ' " . $resultado1 . "<br>";
        echo "$variable1 y $variable2 ' strcmp = ' " . $resultado2 . "<br>";

        echo "$variable1 y $variable1 ' strcasecmp = ' " . $resultado1 . "<br>";
        echo "$variable1 y $variable1 ' strcmp = ' " . $resultado2 . "<br>";

        echo "$variable2 y $variable2 ' strcasecmp = ' " . $resultado1 . "<br>";
        echo "$variable2 y $variable2 ' strcmp = ' " . $resultado2 . "<br>";


        echo "ejemplo de if<br> if " . '$mivar' . "=1 <br>";
        $miVar1 = 1;
        if ($miVar1 = 1) {
            echo "var = 1 es cierto<br>";
        } else {
            echo "var = 1 es falso<br>";
        }

        //### video 10 definicion de constantes

        define("AUTOR", "Pedro");

        echo "constante AUTOR es " . AUTOR . "<br>";
        echo "constante __FILE__ es " . __FILE__ . "<br>";

        //### video funciones matematicas

        $num1 = rand();
        echo "el numero rand es $num1<br>";
        $num1 = rand(10, 20);
        echo "el numero entre 10 y 20  es $num1<br>";
        $num1 = pow(3, 3);
        echo 'el numero pow(3, 3) es ' . $num1 . '<br>';
        //casting como en java. De string a int
        $num1 = "5";
        $resultado = (int) $num1;
        //casting de int a string
        $num1 = 5;
        $resultado = (string) $num1;


        //bucle while

        $num1 = 1;
        while ($num1 < 6) {
            echo "Bucle while $num1 <br>";
            $num1++;
        }


        $num1 = 1;
        do {
            echo "Bucle do while $num1 <br>";
            $num1++;
        } while ($num1 < 6);

        echo "Bucle For con Continue<br>";
        for ($n = 5; $n >= -5; $n--) {
            if ($n == 0) {
                echo "Division no es por 0. Hacemos instruccion Continue<br>";
                continue;
            }

            echo "5 / $n = " . 5 / $n . "<br>";

            if ($n == -3) {
                echo "-3 , rompemos bucle for con break <br>";
                break;
            }
        }
        echo strtolower("MINUSCULAS CON STRTOLOWER<br>");

        //Paso de parámetros por referencia con &. Añadiendo el & a una variable
        //en una función los cambios de esa variable dentro la función se hacen 
        //también en la variable original de la llamada. Mejor ejemplo para entender

        function hacerAlgo(&$param) {
            $param = strtoupper($param);
            return $param;
        }

        $cadena = "TeXtO A CoNvErTiR";
        echo '$cadena' . " antes de la llamada a la función: " . "$cadena <br>";
        hacerAlgo($cadena);
        echo '$cadena' . " después de la llamada a la función: " . "$cadena <br>";

        //array por indice
        //se pueden declarar arrays sin declarar el indice
        $semana[] = "Lunes";
        $semana[] = "Martes";
        $semana[] = "Miercoles";
        //esto ha creado un array de 3 elementos con indice de 0 a 2.
        //OJO! no está sobreescribiendo.

        for ($i = 0; $i < count($semana); $i++) {
            echo "imprimir array por iteración $semana[$i] <br>";
        }



        //Se pueden declarar arrays especificado el indice. Quizás menos confuso
        $semana[0] = "Lunes";
        $semana[1] = "Martes";
        $semana[2] = "Miercoles";

        //agregar un nuevo elemento a un array. //OJO! no está sobreescribiendo.
        $semana[] = "Jueves";

        //ordenar array, con sort orden alfabetico;
        sort($semana);

        foreach ($semana as $dia) {
            echo " imprimir array con foreach. $dia <br>";
        }


        //se pueden crear todos los indices de una vez usando instruccion array
        $semana = array("Lunes", "Martes", "Miercoles");
        //array asociativo
        //el índice se sustituye por una palabra
        $datosNombre = array("Nombre" => "Pedro", "Apellido" => "Perez", "Ciudad" => "Paris");

        //agregar posteriormente mas elementos al array asociativo
        $datosNombre["Pais"] = "Alemania";

        foreach ($datosNombre as $clave => $valor) {

            echo " A $clave le corresponde $valor  <br>";
        }
        echo var_dump($semana);
        ?>
    </body>
</html>