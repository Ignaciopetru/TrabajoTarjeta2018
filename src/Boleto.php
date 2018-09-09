<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

    protected $valor;
    protected $colectivo;
    protected $fecha;
    protected $tipoTarj;
    protected $abonado;
    protected $saldo;
    protected $idTarj;
    protected $tipo;
    protected $linea;


    public function __construct($valor, $colectivo, $tarjeta, $tipo) {
        $this->valor = $valor;
        $this->colectivo = $colectivo;
        $this->fecha = time(); //reemplazar por la clase tiempo
        $this->tipoTarj = $tarjeta->mostrarTipo();
        $this->saldo = $tarjeta->obtenerSaldo();
        $this->idTarj = $tarjeta->obtenerID();
        $this->tipo = $tipo;
        $this->linea = $colectivo->linea();
        $this->abonado = $tarjeta->abonado();
    }

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor() {
        return $this->valor;
    }

    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo() {
        return $this->colectivo;
    }

}
