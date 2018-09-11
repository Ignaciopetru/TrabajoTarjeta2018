<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo() {
        $tarjeta = new Tarjeta;

        $this->assertTrue($tarjeta->recargar(10));
        $this->assertEquals($tarjeta->obtenerSaldo(), 10);

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), 30);

        $this->assertTrue($tarjeta->recargar(510.15));
        $this->assertEquals($tarjeta->obtenerSaldo(), 622.08);

        $this->assertTrue($tarjeta->recargar(962.59));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1184.17);
    }

    public function testCargaPlus(){
        $tarjeta = new Tarjeta;

        $tarjeta->restarViaje();
        $tarjeta->restarViaje();
        $this->assertFalse($tarjeta->restarPlus());
        $tarjeta->recargar(50);
        $this->assertEquals($tarjeta->mostrarPlus(), 2);

        $tarjeta->restarViaje();
        $tarjeta->restarViaje();
        $this->assertEquals($tarjeta->mostrarPlus(), 1);
        $tarjeta->recargar(50);
        $this->assertEquals($tarjeta->mostrarPlus(), 2);
    }

    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta;

      $this->assertFalse($tarjeta->recargar(15));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0);
  }


}
