<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  protected $tipo = 'medio';
  protected $ultimoPago;
  protected $costo = 7.40;

  public function restarviaje(){
    if(sePuedeTransbordo($colectivo)){
      $this->costo = $this->costo * 0.77;
      $this->saldo -= $this->costo;
      $this->ultimoColectivo = $colectivo;
      $this->ultimoPago = $this->obtenerTiempo();
      return true;
    }else{
      if($this->sePuedePagar() === true){
        if($this->saldo > $this->costo){
          $this->saldo -= $this->costo;
          $this->ultimoPago = $this->obtenerTiempo();
          return true;
        }else if($this->saldo < $this->costo && $this->plus_disponibles > 0){
          $this->restarPlus();
          $this->ultimoPago = $this->obtenerTiempo();
          return 1;
        }else {
          return false;
        }
      }else{
        return false;
      }
    }
    public function sePuedePagar(){
      $ahora = $this->obtenerTiempo();
      if(($ahora - $this->ultimoPago) >= 300){
        return true;
      }else{
        return false;
      }
    }
  }

}
