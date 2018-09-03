<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testlibreSiempreLibre() {
        $f = 0;
        $tarjeta = new TarjetaLibre;
        $tarjeta->recargar(14.80);
        $colectivo = new Colectivo(0,0,0);
        for($i = 0; $i < 10; $i++){
          if($colectivo->pagarCon($tarjeta) == false){
            $f++;
          }
        }
        $this->assertEquals($f, 0);
    }

    public function testMedioSiempreMedio() {
        $tarjeta = new TarjetaMedio;
        $tarjeta->recargar(14.80);
        $colectivo = new Colectivo(0,0,0);
        $this->assertEquals($colectivo->pagarCon($tarjeta)->obtenerValor(), 14.80/2);
    }
}
