<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {

  protected $tipo = 'libre';

  public function restarViaje(){
      if($this->saldo > 7.40){
        $this->saldo -= 7.40;
        return true;
      }else if($this->saldo < 7.40 && $this->plus_disponibles > 0){
        $this->restarPlus();
        return 1;
      }else {
        return false;
      }
  }
}
