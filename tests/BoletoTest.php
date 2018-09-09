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
    }

    public function testBoletoMedio() {
        $tarjeta = new TarjetaMedio;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
    }

    public function testBoletoMedioUni() {
        $tarjeta = new TarjetaMedioUni;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
    }

    public function testBoletoLibre() {
        $tarjeta = new TarjetaLibre;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(0,0,0);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'libre');
    }
}
