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
      $saldo = $tarjeta->obtenerSaldo();
      $costo = $tarjeta->obtenerCosto();
      if($saldo >= $costo){
        $tarjeta->restarviaje($costo);
        return New Boleto($costo, $this, $tarjeta);
      } else {
        return false;
      }
    }

}
