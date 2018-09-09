<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  protected $tipo = 'medio';
  protected $ultimoPago;
  protected $costo = 7.40;
  public function restarviaje(){
    if($this->sePuedePagar()){
      if($this->saldo > $this->costo){
        $this->saldo -= $this->costo;
        $this->ultimoPago = time();
      }else if($this->saldo < $this->costo && $this->plus_disponibles > 0){
        $this->restarPlus();
        $this->ultimoPago = time();
      }else {
        return false;
      }
    }
    return true;
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
