<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function libreSiempreLibre() {
        $tarjeta = new TarjetaLibre;
        $colectivo = new Colectivo;
        for($i=0; $i < 10; $i++){
          if($colectivo->pagarCon($tarjeta) == false){
            $f++;
          }
        }
        $this->assertEquals($f, 0);
    }

    public function medioSiempreMedio() {
        $tarjeta = new TarjetaMedio;
        $colectivo = new Colectivo;
        $this->assertEquals($colectivo->pagarCon($tarjeta)->obtenerValor(), 14.80/2);
    }
}
