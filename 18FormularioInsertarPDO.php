<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entrada Datos</title>
        <style>

            h1{
                text-align:center;
                color:#3366ff;
                border-bottom:solid 2px #3366ff;
                width:380px;
                margin:auto;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            }            

            table{
                border:2px solid #3366ff;
                border-radius: 4px;
                padding:20px 50px;
                margin-top:50px;
                margin-bottom: 50px;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;               
            }

            body{
                background-color:#ddd;
            }
            input[type=text] {
                width: 100%;
                padding: 1px 2px;
                margin: 3px 0;
                box-sizing: border-box;
                border: 2px solid #3366ff;;
                border-radius: 4px;
            }
            input[type=button], input[type=submit], input[type=reset] {
                background-color: #3366ff;
                border: none;
                color: white;
                padding: 8px 25px;
                text-decoration: blink;
                margin: 4px 2px;
                cursor: pointer;
            }

        </style>
    </head>

    <body>
        <h1>Registro de Artículos</h1>
        <form name="form1" method="post" action="18InsertarRegistroPDO.php">
            <table align="center">

                <tr>
                    <td>Sección</td>
                    <td><label for="seccion"></label>
                        <input type="text" name="seccion" id="seccion"></td>
                </tr>
                <tr>
                    <td>Nombre artículo</td>
                    <td><label for="n_art"></label>
                        <input type="text" name="n_art" id="n_art"></td>
                </tr>

                <tr>
                    <td>Fecha</td>
                    <td><label for="fecha"></label>
                        <input type="text" name="fecha" id="fecha"></td>
                </tr>

                <tr>
                    <td>País de Origen</td>
                    <td><label for="p_orig"></label>
                        <input type="text" name="p_orig" id="p_orig"></td>
                </tr>

                <tr>
                    <td>Precio</td>
                    <td><label for="precio"></label>
                        <input type="text" name="precio" id="precio"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="boton_insertar" value="Insertar">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="Borrar" value="Borrar"></td>
                </tr>
            </table>
             <h1>Borrado de Artículos</h1>
             <form name="form1" method="post" action="18InsertarRegistroPDO.php">
            <table align="center">

                <tr>
                    <td>ID</td>
                    <td><label for="ID"></label>
                        <input type="text" name="ID" id="ID"></td>
                    <td><input type="submit" name="boton_borrar" id="enviando_id" value="Borrar"></td>
                </tr></table>
        </form>
    </body>
</html>