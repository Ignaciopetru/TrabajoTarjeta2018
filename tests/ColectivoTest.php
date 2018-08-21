<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function libreSiempreLibre() {.
        $tarjeta = new TarjetaLibre;
        $colectivo = new Colectivo;
    //    $this->assertTrue(!($colectivo->pagarCon($tarjeta)));
    //    $this->assertTrue(!($colectivo->pagarCon($tarjeta)));
    //    $this->assertTrue(!($colectivo->pagarCon($tarjeta)));
    //Ver como hacer la comprobacion
    }

    public function medioSiempreMedio() {.
        $tarjeta = new TarjetaMedio;
        $colectivo = new Colectivo;

        $this->assertEquals($colectivo->pagarCon($tarjeta)->obtenerValor(), 14.80/2);

    }
}
