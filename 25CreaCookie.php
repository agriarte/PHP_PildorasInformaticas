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
        setcookie("idiomaCookie", $_GET["idioma"], time()+30000);
        header("Location:25VerCookie.php");
        ?>
    </body>
</html>
