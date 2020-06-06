<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form name="form1" action="03calculadora.php" method="post" >
            <p>
            <label form="nume1">primer numero</label>
            <input type="text" name="num1_name" id="num1_id">
        
            <label form="nume2">segundo numero</label>
            <input type="text" name="num2_name" id="num2_id">
            
            <label form="operacion"></label>
            <select name="operacion_name" id="operacion_id">
                <option>Suma</option>
                <option>Resta</option>
                <option>Multiplicacion</option>
                <option>Division</option>
                <option>Modulo</option>                            
            </select>
            </p>
            <p>
                <input type="submit" name="button_name" id="button_id" value="Enviar" onclick="Prueba">
            </p>
                
        </form>
        
    </body>
</html>
