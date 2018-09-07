<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo;
    protected $plus_disponibles = 2;
    

    // Revisa si el monto a cargar es aceptado
    public function recargar($monto) {
      if (in_array($monto, array(10,20,30,50,100))) {
        $this->saldo += $monto;
      }
      else if($monto == 510.15) {
        $this->saldo += ($monto + 81.93);
      }
      else if($monto == 962.59) {
        $this->saldo += ($monto + 221.58);
      }
      else {
        return false;
      }
      if($this->saldo > 29.60){
        if($this->plus_disponibles != 2){
          $this->saldo -= (14.8 * (2 - $this->plus_disponibles));
          $this->plus_disponibles = 2;
        }
      }
      return true;
    }




    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }

    public function restarViaje($valor){
        if($this->saldo > $valor){
          $this->saldo -= $valor;
        }else if($this->saldo < $valor && $this->plus_disponibles > 0){
          $this->restarPlus();
        }else {
          return false;
        }
    }

    public function restarPlus(){
      if($this->plus_disponibles != 0){
        $this->plus_disponibles -= 1;
      }else{
        return false;
      }
    }

    public function mostrarPlus(){
      return $this->plus_disponibles;
    }


}
