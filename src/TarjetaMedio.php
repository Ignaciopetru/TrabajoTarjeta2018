<?php

namespace TrabajoTarjeta;


class TarjetaMedio extends  Tarjeta {
  public function restarviaje($valor){
    $this->saldo -= ($valor/2);
    }
}
