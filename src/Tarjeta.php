<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    
    protected $costo = 14.80;
    protected $saldo;
    protected $plus_disponibles = 2;
    protected $tipo = 'normal';
    protected $id;
    protected $recarga_plus = 0;//0 no recargo plus, 1 1, 2 2


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
      if($this->saldo > ($this->costo*2)){
        if($this->plus_disponibles != 2){



          $this->saldo -= ($this->costo * (2 - $this->plus_disponibles));

          if($this->plus_disponibles == 0){
            $recarga_plus = 2;
          }else {
            $recarga_plus = 1;
          }
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

    public function restarViaje(){

        if($this->saldo > $this->costo){
          $this->saldo -= $this->costo;
          return true;
        }else if($this->saldo < $this->costo && $this->plus_disponibles > 0){
          $this->restarPlus();
          return 1;
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

    public function obtenerCosto() {
      return $this->costo;
    }
    public function mostrarTipo(){
      return $this->tipo;
    }
    public function obtenerID(){
      return $this->id;

    /*
    public function obtenerRecargaPlus(){
      return $this->recarga_plus;
    }
    public function resetearRecargaPlus(){
      $this->recarga_plus = 0;
    }
    */

    public function abonado(){ //al recargar se llama y calcula el monto total del viaje
      if($this->recarga_plus == 0){
        return $this->costo;
      }else if($this->recarga_plus == 1){
         $this->recarga_plus = 0;
         return ($this->costo * 2);
      }else{
        $this->recarga_plus = 0;
        return ($this->costo * 3);
        }
      }

    public function mostrarTipo(){
      return $this->tipo;
    }

    public function obtenerID(){
      return $this->id;
    }
/*
    public function obtenerRecargaPlus(){
      return $this->recarga_plus;
    }

    public function resetearRecargaPlus(){
      $this->recarga_plus = 0;
    }
*/
    public function abonado(){ //al recargar se llama y calcula el monto total del viaje
      if($this->recarga_plus == 0){
        return $this->costo;
      }else if($this->recarga_plus == 1){
        $this->recarga_plus = 0;
        return ($this->costo * 2);
      }else{
        $this->recarga_plus = 0;
        return ($this->costo * 3);
      }
    }

}
