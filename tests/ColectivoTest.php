<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testHastaDosPLus() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(20);
        $this->pagarCon($tarjeta);
        $this->pagarCon($tarjeta);
        $this->assertFalse($this->pagarCon($tarjeta));
    }

    public function testDescuentoDePLus() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(20);
        $this->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->mostrarplus, 2);
        $this->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->mostrarplus, 1);
        $this->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->mostrarplus, 0);
    }
}
