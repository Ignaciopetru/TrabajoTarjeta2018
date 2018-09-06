<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testSaldoCero() {
        $valor = 14.80;
        $tarjeta = new Tarjeta;
        $colectivo = new Colectivo(0,0,0);
        $boleto = new Boleto($valor, $colectivo, $tarjeta, 0);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }
}
