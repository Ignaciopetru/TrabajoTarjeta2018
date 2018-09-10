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

    public function testBoletoNormal() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'normal');
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'plus');
    }

    public function testBoletoMedio() {
        $tarjeta = new TarjetaMedio;
        $tarjeta->recargar(10);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        $boleto = $colectivo->pagarCon($tarjeta);
        // Hace falta implementar un tiempo falso para un testeo optimo
        // $this->assertEquals($boleto->obtenerTipo(), 'plus'); se deben esperar 5 minutos para poder realizar otro pago
    }

    public function testBoletoMedioUni() {
        $tarjeta = new TarjetaMedioUni;
        $tarjeta->recargar(50);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        // Hace falta implementar un tiempo falso para un testeo optimo
        // $this->assertEquals($boleto->obtenerTipoValor(), 14.80);
        // $this->assertEquals($boleto->obtenerTipoValor(), 7.40); se deben esperar 24 horas para poder realizar otro pago del medio
    }

    public function testBoletoLibre() {
        $tarjeta = new TarjetaLibre;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'libre');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
    }

    public function testLimiteCinco() {
        $tarjeta = new TarjetaMedio;
        $tarjeta->recargar(50);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertFalse($colectivo->pagarCon($tarjeta));
    }
}
