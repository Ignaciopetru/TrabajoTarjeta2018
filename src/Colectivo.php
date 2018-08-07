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
      if($tarjeta->saldo > 14.80){
        $tarjeta->saldo-=14.80;
        $nuevocolectivo = New Colectivo($this->colectivo, $this->empresa, $this->numero);
        return New Boleto(14.80, $nuevocolectivo, $tarjeta);
      }else {
        return false;
      }
    }

}
