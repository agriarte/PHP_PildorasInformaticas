<!--
//poo en php
//invocación de miembros de clase (métodos, atributos) se usua -> En Java el punto.
//Java > miClase.metodoLoquesea();
//PHP > miClase->metodoLoquesea();
//Si la clase es estática se usa :: En Java solo el punto
//para acceder a elementos estáticos, constantes, y sobrescribir propiedades o métodos de una clase
//Java > ClaseEstatica.Metodo();
//PHP > ClaseEstatica::Metodo();
//consultar para parent, self y ::
//parent de php es super(arg) de java
//https://www.php.net/manual/es/language.oop5.paamayim-nekudotayim.php
-->

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejemplo Básico de POO</title>
        <style>

        </style>
    </head>

    <body>
        <?php
        /*
        include "05Concesionario.php";

        $comprador1 = new CompraVehiculo("berlina");

        $comprador1->climatizador();

        echo $comprador1->getPreciobase() .  "<br>";

        $comprador2 = new cochePremium("berlina");

        $comprador2->getPrecioPremium(); */

        include '05Banco.php';

        $banco = new Banco;

        $banco->infoBanco();

        $cliente1 = new Cliente("Pedro");

        $cliente1->infoBanco();
        $cliente1->infoCliente();

        $cliente1->setSaldocliente(50);

        $cliente1->infoBanco();
        $cliente1->infoCliente();

        $cliente2 = new Cliente("Juan");
        $cliente2->setSaldocliente(25);

//llamada a método static
        Banco::infoBanco();
//llamada a clase del padre desde hijo
        $cliente2->infoBanco();
//llamada a método propio (caso mas normal)
        $banco->infoBanco();
        $cliente1->infoCliente();
        $cliente2->infoCliente();
        ?>
    </body>

</html>