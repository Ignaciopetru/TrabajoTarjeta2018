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
      $plus = $tarjeta->mostrarplus();
      if($saldo > 14.80){
        $tarjeta->restarviaje(14.80);
        return New Boleto(14.80, $this, $tarjeta);
      }if($saldo < 14.80 && $plus > 0){
        $tarjeta->restarplus();
        return New Boleto(14.80, $this, $tarjeta);
      }else {
        return false;
      }
    }

}
