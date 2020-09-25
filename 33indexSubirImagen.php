<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{
                margin: auto;
                width: 450px;
                border: 2px dotted #0C3;
            }
        </style>
    </head>
    <body>
        <form action="33datosImagen.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="imagen">Imagen:</label></td>
                    <td><input type="file" name="fileToUpload" ></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center"><input type="submit" value="Enviar Imagen"></td>
                </tr>
            </table>

        </form>

        <form action="33datosImagen.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>


    </body>
</html>
