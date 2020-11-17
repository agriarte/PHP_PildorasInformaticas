<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            #miForm {
                background: transparent;
                border: none;
                border-bottom: 2px solid #000;
                outline:none;
                border-radius: 0;
                box-shadow:3px;

            }

            input[type="text"],
            select.form-control {
                background: transparent;
                border: none;
                border-bottom: 1px solid #000000;
                -webkit-box-shadow: none;
                box-shadow: none;
                border-radius: 0;
            }

            input[type="text"]:focus,
            select.form-control:focus {
                border-bottom: 1px solid blue;
                -webkit-box-shadow: none;
                box-shadow: none;
            }

        </style>
        <title>PHP CRUD usando PDO y Bootstrap/Modal</title>

    </head>
    <body>
        <div class="container-fluid">

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Search" type="text">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <h1 class="page-header text-center">PHP CRUD usando PDO</h1>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control ml-3 mr-sm-2" placeholder="Search" type="text">
            <button class="btn btn-secondary ml-3 my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <?php // include('add_modal.php'); ?>

</body>
</html>
