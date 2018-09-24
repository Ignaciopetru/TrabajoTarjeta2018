<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testSaldoCero() {
        $tarjeta = new Tarjeta;
        $colectivo = new Colectivo;

        $boleto = new Boleto($tarjeta->obtenerCosto(), $colectivo, $tarjeta, 0);
        $this->assertEquals($boleto->obtenerValor(), $tarjeta->obtenerCosto());
    }

    public function testBoletoNormal() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo(142, "Metrobus", 3541);

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'normal');

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'normal');

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'plus');

        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);
        $this->assertEquals($boleto->obtenerLinea(), $colectivo->linea());
        $this->assertEquals($boleto->obtenerAbonado(), $tarjeta->abonado());
        $this->assertEquals($boleto->obtenerSaldo(), $tarjeta->obtenerSaldo());
        $this->assertEquals($boleto->obtenerIDTarj(), $tarjeta->obtenerID());
    }

    public function testBoletoMedio() {
        $tiempo = new TiempoFalso;
        $tarjeta = new TarjetaMedio($tiempo);
        $tarjeta->recargar(10);
        $colectivo = new Colectivo;
        $tarjeta->avanzarTiempo(300);

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');

        $tarjeta->avanzarTiempo(300);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'plus');
    }

    public function testBoletoMedioUni() {
        $tiempo = new TiempoFalso;
        $tarjeta = new TarjetaMedioUni($tiempo);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo;
        $tarjeta->avanzarTiempo(86400);

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'medio');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        $this->assertEquals($boleto->obtenerValor(), 7.40);

        $tarjeta->avanzarTiempo(300);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        $this->assertEquals($boleto->obtenerValor(), 7.40);

        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
        $this->assertEquals($boleto->obtenerValor(), 14.80);

        $tarjeta->avanzarTiempo(86400);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerValor(), 7.40);

        $tarjeta2 = new TarjetaMedioUni($tiempo);
        $tarjeta2->recargar(10);
        $tarjeta2->restarViaje($colectivo);
        $tarjeta2->avanzarTiempo(86600);
        $this->assertEquals($tarjeta2->restarViaje($colectivo), 1);
        $tarjeta2->avanzarTiempo(86600);
        $tarjeta2->restarViaje($colectivo);
        $this->assertFalse($tarjeta2->restarViaje($colectivo));

    }

    public function testBoletoLibre() {
        $tarjeta = new TarjetaLibre;
        $tarjeta->recargar(30);
        $colectivo = new Colectivo;
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerTipoTarj(), 'libre');
        $this->assertEquals($boleto->obtenerTipo(), 'normal');
    }

    public function testLimiteCinco() {
        $tiempo = new TiempoFalso;
        $tarjeta = new TarjetaMedio($tiempo);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo;
        $boleto = $colectivo->pagarCon($tarjeta);
        // $tarjeta->avanzarTiempo(300);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertFalse($boleto);
    }
}
