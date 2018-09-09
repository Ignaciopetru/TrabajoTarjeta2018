<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  protected $ultimoPago;
  protected $ultimoPagoMedio;
  protected $mediosDisponibles = 2;
  protected $costo = 7.40;
  public function restarviaje(){
    if($this->sePuedePagar()){
      if($this->saldo > $this->costo){
        $this->saldo -= $this->costo;
        $this->ultimoPago = time();
        $this->ultimoPagoMedio = time();
        $this->mediosDisponibles -= 1;
      }else if($this->saldo < $this->costo && $this->plus_disponibles > 0){
        $this->restarPlus();
        $this->ultimoPago = time();
      }else {
        return false;
      }
    }else{
      $normal = $this->costo * 2;
      if($this->saldo > $normal){
        $this->saldo -= $normal);
        $this->ultimoPago = time();
      }else if($this->saldo < $normal && $this->plus_disponibles > 0){
        $this->restarPlus();
        $this->ultimoPago = time();
      }else {
        return false;
      }
    }
  }
  public function sePuedePagar(){
    $ahora = time();
    if($ahora - $this->ultimoPagoMedio > 86400){  // Un dia tiene 86400 segundos
    $this->mediosDisponibles = 2;
    }
    if(($ahora - $this->ultimoPago) > 300 && $this->mediosDisponibles != 0){
      return true;
    }else{
      return false;
    }
  }
}
