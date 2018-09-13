<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {


    public function testlibreSiempreLibre() {
        $f = 0;
        $tarjeta = new TarjetaLibre;
        $colectivo = new Colectivo;
        for($i = 0; $i < 10; $i++){
          if($colectivo->pagarCon($tarjeta) == false){
            $f++;
          }
        }
        $this->assertEquals($f, 10);
    }

    public function testMedioSiempreMedio() {
        $tiempo = new TiempoFalso;
        $tarjeta = new TarjetaMedio($tiempo);
        $tarjeta->recargar(30);
        $colectivo = new Colectivo;
        $tarjeta->avanzarTiempo(300);
        $this->assertEquals($colectivo->pagarCon($tarjeta)->obtenerValor(), 14.80/2);
    }

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

    public function testObtenerInfo(){
        $colectivo = new Colectivo(142, 'rosario bus', 55);
        $this->assertEquals($colectivo->empresa(), 'rosario bus');
        $this->assertEquals(55, $colectivo->numero());
    }
}
