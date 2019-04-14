<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semestre
 *
 * @author Helinho
 */
class Semestre {
    private $codigo;
    private $numero;
    private $periodo;
    private $dataInicio;
    private $datafim;
    private $estado;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDatafim() {
        return $this->datafim;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDatafim($datafim) {
        $this->datafim = $datafim;
    }


}
