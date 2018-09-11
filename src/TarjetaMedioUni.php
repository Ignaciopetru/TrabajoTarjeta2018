<?php

namespace TrabajoTarjeta;


class TarjetaMedioUni extends Tarjeta {
  protected $tipo = 'medio';
  protected $ultimoPago;
  protected $ultimoPagoMedio;
  protected $mediosDisponibles = 2;
  protected $costo = 7.40;
  public function restarviaje(){
    if($this->sePuedePagar() === true){
      $this->costo = 7.40;
      if($this->saldo > $this->costo){
        $this->saldo -= $this->costo;
        $this->ultimoPago = time();
        $this->ultimoPagoMedio = time();
        $this->mediosDisponibles -= 1;
        return true;
      }else if($this->saldo < $this->costo && $this->plus_disponibles > 0){
        $this->restarPlus();
        $this->ultimoPago = time();
        return 1;
      }else {
        return false;
      }
    }else{
      $this->costo = 14.80;
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
  }
  public function sePuedePagar(){
    $ahora = time();
    if(date('d', $ahora) == (date('d', $this->ultimoPagoMedio) + 1)){
    $this->mediosDisponibles = 2;
    }
    if(($ahora - $this->ultimoPago) > 300 && $this->mediosDisponibles != 0){
      return true;
    }else{
      return false;
    }
  }
}
