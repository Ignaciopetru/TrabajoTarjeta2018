<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  protected $ultimoPago;
  public function restarviaje($valor){
    $valor = $valor/2;
    if($this->sePuedePagar()){
      if($this->saldo > $valor){
        $this->saldo -= $valor;
        $this->ultimoPago = time();
      }else if($this->saldo < $valor && $this->plus_disponibles > 0){
        $this->restarPlus();
        $this->ultimoPago = time();
      }else {
        return false;
      }
    }
  }
  public function sePuedePagar(){
    $ahora = time();
    if(($ahora - $this->ultimoPago) > 300){
      return true;
    }else{
      return false;
    }
  }
}
