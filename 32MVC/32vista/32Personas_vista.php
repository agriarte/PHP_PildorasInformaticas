<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>


    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dirección</th>               
                                </tr>
                            </thead>

                            <?php foreach ($matrizPersonas as $persona): ?>

                                <tr>
                                    <td><?php echo $persona["ID"] ?></td>
                                    <td><?php echo $persona["NOMBRE"] ?></td>
                                    <td><?php echo $persona["APELLIDOS"] ?></td>
                                    <td><?php echo $persona["DIRECCION"] ?></td>

                                    <td><a href="32BorrarCRUD.php?id=<?php echo $persona->ID ?>" ><input type='button' name='del' id='del' value='Borrar'></a></td>
                                    <td><a href="32EditarCRUD.php?id=<?php echo $persona->ID ?> 
                                           & nom=<?php echo $persona["NOMBRE"] ?>
                                           & ape=<?php echo $persona["APELLIDOS"] ?>
                                           & dir=<?php echo $persona["DIRECCION"] ?>
                                           "> <input type='button' name='up' id='up' value='Actualizar'></a></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            <tr>
                                <td></td>
                                <td><input type='text' name='Nom' size='10' ></td>
                                <td><input type='text' name='Ape' size='10' ></td>
                                <td><input type='text' name=' Dir' size='10' ></td>
                                <td><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
                        </table>

                    </form>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <h1 class="display-4"> ejemplo MVC </h1>
                    <table class="table table-bordered table-striped table-hover" id="tabla0"><tr><th>Nombre Persona</th></tr>
                        <?php
                        foreach ($matrizPersonas as $registro) {
                            echo "<tr><td>" . $registro["NOMBRE"] . " </td></tr>";
                        }
                        ?>

                    </table></div>
                <div class="col-sm"><p>lo que sea</p></div>
            </div>
        </div>





    </body>
</html>
