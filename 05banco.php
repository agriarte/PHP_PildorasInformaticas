<?php

/*pruebas básicas de herencia de clase, uso de constantes y variables statics y constantes
 */
class Banco {

    const NOMBREBANCO = "Banco Pichinchi";
    private static $numerodeclientes = 0;
    private static $depositototal = 0;

    public function Banco() {
        
    }
    
    function nuevoCliente(){
        self::$numerodeclientes+=1;     
    }

    function getDepositototal() {
        return self::$depositototal;
    }

    public function ingresarDepositototal($ingresodepositototal): void {
        self::$depositototal += $ingresodepositototal;
    }
    
    public static function infoBanco() {
        echo "información del " . self::NOMBREBANCO . "<br>";
        echo "Número de Clientes: " . self::$numerodeclientes . " Deposito Total: " . self::$depositototal . "<br>";        
    }

}

class Cliente extends Banco {


    private $nombrecliente;
    private $saldocliente;
    
    public function Cliente($nombrecliente) {
        
        $this->nombrecliente = $nombrecliente;
        $this->saldocliente=0;
        
        parent::nuevoCliente();
       
    }
    
    public function getNombreCliente() {
        return $this->nombrecliente;
    }

        
    public function getSaldocliente() {
        return $this->saldocliente;
    }

    public function setSaldocliente($ingresocliente) {
        $this->saldocliente = $ingresocliente;
        self::ingresarDepositototal($ingresocliente);
    }
    
    public function infoCliente() {
        echo "Nombre cliente: " . $this->getNombreCliente();
        echo " Saldo cliente: " . $this->getSaldocliente() . "<br>";
    }


}
