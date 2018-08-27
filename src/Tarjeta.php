<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo;
    protected $plus_disponibles;
    // Revisa si el monto a cargar es aceptado
    public function recargar($monto) {
      if (in_array($monto, array(10,20,30,50,100))) {
        $this->saldo += $monto;
        if($this->saldo > 29.60){
          if($this->$plus_disponibles != 2){
            $this->saldo -= (14.8 * (2 - $this->plus_disponibles));
            $this->plus_disponibles = 2;
          }
        }
        return true;
      }
      else if($monto == 510.15) {
        $this->saldo += ($monto + 81.93);
        if($this->$plus_disponibles != 2){
          $this->saldo -= (14.8 * (2 - $this->plus_disponibles));
          $this->plus_disponibles = 2;
        }
        return true;
      }
      else if($monto == 962.59) {
        $this->saldo += ($monto + 221.58);
        if($this->$plus_disponibles != 2){
          $this->saldo -= (14.8 * (2 - $this->plus_disponibles));
          $this->plus_disponibles = 2;
        }
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

    public function restarviaje($valor){
      $this->saldo -= $valor;
    }

    public function restarplus(){
      if($this->plus_disponibles != 0){
        $this->plus_disponibles -= 1;
      }else{
        return false;
      }
    }

    public function mostrarplus(){
      return $this->plus_disponibles;
    }

}
