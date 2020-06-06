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
        <h1>Eliminar Artículos</h1>
        <form name="form1" method="get" action="11EliminarRegistro.php">
            <table align="center">

                <tr>
                    <td>ID</td>
                    <td><label for="n_id"></label>
                        <input type="text" name="n_id" id="n_id"></td>
                </tr>

                
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="Eliminar" value="Eliminar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>