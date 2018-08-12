<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo;

    // Revisa si el monto a cargar es aceptado
    public function recargar($monto) {
      if (in_array($monto, array(10,20,30,50,100))) {
        $this->saldo += $monto;
        return true;
      }
      else if($monto == 510.15) {
        $this->saldo += ($monto + 81.93);
        return true;
      }
      else if($monto == 962.59) {
        $this->saldo += ($monto + 221.58);
        return true;
      }
      else {
        return false;
      }

    }

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }

}
