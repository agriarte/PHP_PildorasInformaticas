<?php
//ejemplo básico de clase y clase hija
//diferencias con Java:
//-> sustituye al .
//si es una constante self:: sustituye al punto
//parent:: sustituye a super(arg)
//como constructor se puede poner el nombre de la clase o __Construct

// Clase Parent
class CompraVehiculo {

    private $preciobase;
    private $gama;
    static $ayuda;

    function CompraVehiculo($miGama) {
    //constructor que siempre se ejecuta al crear instancia
        echo "construct de la clase CompraVehiculo<br> ha llegado $miGama<br>";
        self::$ayuda = 1000;

        $this->gama=$miGama;
        
        if ($miGama == "urbano") {
            $this->preciobase = 10000;
        } else if ($miGama == "compacto") {
            $this->preciobase = 20000;
        } else if ($miGama == "berlina") {
            $this->preciobase = 30000;
        }
        
        

        echo "$this->gama  precio base es = " . $this->preciobase . "<br>";
    }

    function climatizador() {
        echo "Climatizador vale 1000. Precio base $this->gama es= " . $this->preciobase . "<br>";

        $this->preciobase += 1000;
    }

    function tapiceriacuero() {
        $this->preciobase += 3000;
    }

    function getPreciobase() {
        echo "Suma total de extras - Ayuda Estado de 1000<br>";
        return ($this->preciobase - self::$ayuda);
    }

}

//clase hija

class cochePremium extends CompraVehiculo {

    private $preciopremium;
    private $modelopremium;

    function cochePremium($modelopremium) {

        parent::__construct($this->modelopremium);
        $this->preciopremium = 15000;
    }

    function getPrecioPremium() {
        $precio = parent::getPreciobase();
        $this->preciopremium += $precio;

        echo "Coche Premium = precioBase + preciopremium " . ($this->preciopremium + $precio);
    }

}

?>
    