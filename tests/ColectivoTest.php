<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testHastaDosPLus() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(20);
        $tarjeta->restarViaje();
        $tarjeta->restarViaje();
        $tarjeta->restarViaje();
        $this->assertFalse($tarjeta->restarViaje());
    }

    public function testDescuentoDePLus() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(20);
        $tarjeta->restarViaje();
        $this->assertEquals($tarjeta->mostrarPlus(), 2);
        $tarjeta->restarViaje();
        $this->assertEquals($tarjeta->mostrarPlus(), 1);
        $tarjeta->restarViaje();
        $this->assertEquals($tarjeta->mostrarPlus(), 0);
    }
}
