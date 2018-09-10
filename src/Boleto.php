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
        $this->fecha = date("d/m/Y H:i:s"); //reemplazar por la clase tiempo
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

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerTipoTarj() {
        return $this->tipoTarj;
    }

    public function obtenerTipo() {
        return $this->tipo;
    }

    public function obtenerLinea() {
        return $this->linea;
    }

    public function obtenerAbonado() {
        return $this->abonado;
    }

    public function obtenerSaldo() {
        return $this->saldo;
    }

    public function obtenerIdTarj() {
        return $this->idTarj;
    }

}
