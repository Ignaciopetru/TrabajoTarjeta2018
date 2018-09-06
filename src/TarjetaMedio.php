<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {

  protected $tipo = 'libre';

  public function restarViaje($valor){
    $valor = $valor/2;
      if($this->saldo > $valor){
        $this->saldo -= $valor;
        return true;
      }else if($this->saldo < $valor && $this->plus_disponibles > 0){
        $this->restarPlus();
        return 1;
      }else {
        return false;
      }
  }
}
