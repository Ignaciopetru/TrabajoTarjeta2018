<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
    protected $linea;
    protected $empresa;
    protected $numero;

    public function __construct($linea = 0, $empresa = 0, $numero = 0){
      $this->linea = $linea;
      $this->empresa = $empresa;
      $this->numero = $numero;
    }

    public function linea(){
      return $this->linea;
    }

    public function empresa(){
      return $this->empresa;
    }

    public function numero(){
      return $this->numero;
    }

    public function pagarCon(TarjetaInterface $tarjeta){
      $pago = $tarjeta->restarViaje();
      if($pago === false){
        return false;//no tiene saldo
      }else if($pago === true){
        return New Boleto($tarjeta->obtenerCosto(), $this, $tarjeta, 'normal');//boleto normal
      }else if ($pago === 'p'){
        return New Boleto($tarjeta->obtenerCosto(), $this, $tarjeta, 'plus');//boleto plus
      }else if ($pago === 't'){
        return New Boleto($tarjeta->obtenerCosto(), $this, $tarjeta, 'trasbordo');// boleto trasbordo
      }
    }
}
