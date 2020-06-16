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
        <?php
        // si la cookie NO existe...
        //
        if (!$_COOKIE["idiomaCookie"]){
            header("Location:25IndexIdioma.php");
        } else if ($_COOKIE["idiomaCookie"] == "es") {
            //si idioma español...
             header("Location:25espanol.php");
        }  else if ($_COOKIE["idiomaCookie"] == "in") {
            //si idioma inglés...
            header("Location:25ingles.php");
        } else {
            echo "no llega idioma";
        }
        
        
        ?>
    </body>
</html>
