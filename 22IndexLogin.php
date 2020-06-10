<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de Usuario</title>
        <style>
            h1{
                text-align: center;
            }
            table{
                width: 25%;
                background-color: #FFC;
                border: 2px dotted #F00;
                margin: auto;
                .izq{
                    text-align: right;
                }
                .der{
                    text-align: left;
                }
                                
                td{
                    text-align: center;
                    padding: 10;
                }
            }
        </style>
    </head>
    <body>

        <h1>Introduce tus datos</h1>
        <table>
            <form action="22CompruebaLogin.php" method="post">
                <tr><td class="izq">Login: </td><td class="der"><input type="text" name="login"></td></tr>
                <tr><td class="izq">Password: </td><td class="der"><input type="text" name="password"></td></tr>
                <tr><td colspan="2" style="text-align:center;"><input type="submit" name="enviar" value="LOGIN"></td></tr>
            </form></table>
        <?php
        // put your code here
        ?>
    </body>
</html>
