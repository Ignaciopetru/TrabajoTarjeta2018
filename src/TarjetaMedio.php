<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  public function restarviaje($valor){
    $valor = $valor/2;
    if($this->saldo > $valor){
      $this->saldo -= $valor;
    }else if($this->saldo < $valor && $this->plus_disponibles > 0){
      $this->restarPlus();
    }else {
      return false;
    }
}
}
