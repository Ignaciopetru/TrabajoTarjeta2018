<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testSaldoCero() {
        $tarjeta = new Tarjeta;
        $colectivo = new Colectivo(0,0,0);
        $boleto = new Boleto($tarjeta->obtenerCosto(), $colectivo, $tarjeta, 0);

        $this->assertEquals($boleto->obtenerValor(), $tarjeta->obtenerCosto());
    }
}
