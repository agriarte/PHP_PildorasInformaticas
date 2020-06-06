<!DOCTYPE html>
<!--
con method get lo introducido en el label viaja por URL. Se recoge con
$busqueda = $_GET["BuscarLabel"]; 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda</title>
        <style>
            table{
                background-color: tan;
                border: 2px dotted aqua;
                margin: auto;
                width: 250px;
                padding: 10px;
            }

            td{
                text-align: right;
                width: 50%
            }
            #miTD{
                text-align: center;
                
            }
        </style>
    </head>
    <body>
        <form action="17conexionPDOMarcadores.php" method="get" >
            <table><tr>
                    <td><label>Pais: </label></td>
                    <td><input type="text" name="buscarPais"></td></tr>
                <tr>
                    <td><label >Sección: </label></td>
                    <td><input type="text" name="buscarSeccion"></td></tr>

                <tr ><td colspan="2" align="center" id="miTD"><input type="submit" name="buscar" value="    Buscar     "></td></tr>
            </table>
        </form>


        <?php
        // put your code here
        ?>
    </body>
</html>
