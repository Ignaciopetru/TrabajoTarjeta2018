<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
    protected $linea;
    protected $empresa;
    protected $numero;

    public function __construct($linea, $empresa, $numero){
      $this->$linea = $linea;
      $this->$empresa = $empresa;
      $this->$numero = $numero;
    }

    public function linea(){
      return $this->linea;
    }

    public function empresa(){
      return $this->empresa;
    }

    public function numero(){
      return $this->numero;
    }

    public function pagarCon(TarjetaInterface $tarjeta){

      $pago = $tarjeta->restarViaje();
      if($pago == false){
        return false;//no tiene saldo
      }else if($pago == true){
          return New Boleto($tarjeta->obtenerCosto(), $this, $tarjeta, 'normal');//boleto normal
      }else{
        return New Boleto($tarjeta->obtenerCosto(), $this, $tarjeta, 'plus');//boleto plus



      }
    }

}
