<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends Tarjeta {
  protected $costo = 7.40;
  public function restarviaje($valor){
    $this->saldo -= ($valor/2);
    }
}
