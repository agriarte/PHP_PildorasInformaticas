<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--
        <style>
            h1{
                text-align: center;
            }

            #tabla0 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 250px;
                margin-left:auto; 
                margin-right:auto;

            }

            #tabla0 td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #tabla0 tr:nth-child(even){background-color: #f2f2f2;}

            #tabla0 tr:hover {background-color: #ddd;}

            #tabla0 th {
                padding-top: 12px;
                padding-bottom: 12px;
                padding-left: 8px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
        -->
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <h1 class="display-4"> ejemplo MVC </h1>
                    <table class="table table-bordered table-striped table-hover" id="tabla0"><tr><th>Nombre Artículo</th></tr>
                        <?php
                        foreach ($matrizProductos as $registro) {
                            echo "<tr><td>" . $registro["NOMBREARTICULO"] . " </td></tr>";
                        }
                        ?>

                    </table></div>
                <div class="col-sm"><p>lo que sea</p></div>
            </div>
        </div>

    </body>
</html>
