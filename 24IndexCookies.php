<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //cookie sin caducidad y que actua en toda la web
        //setcookie("Prueba", "mi primera cookie");
        //cookie con tiempo de vida en x segundos y solo actua en directorio establecido
        setcookie("Prueba","bla bla bla cookie", time()+60, "/cursoPHP/PHP_POO/");
        
        //para destruir cookie se crea de nuevo con tiempo -1 
        //setcookie("Prueba","bla bla bla cookie", time()-1, "/cursoPHP/PHP_POO/");
                
        ?>
    </body>
</html>
