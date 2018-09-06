<?php

namespace TrabajoTarjeta;


class TarjetaLibre extends Tarjeta {

  protected $tipo = 'libre';
  
  public function restarviaje($valor){
    $this->saldo -= 0;
  }
}
