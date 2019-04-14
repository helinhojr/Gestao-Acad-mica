<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodoLectivo
 *
 * @author Helinho
 */
class PeriodoLectivo {
    private $codigo;
    private $datainicio;
    private $datafinal;
    
    function __construct() {
        
    }

    
    function getCodigo() {
        return $this->codigo;
    }

    function getDatainicio() {
        return $this->datainicio;
    }

    function getDatafinal() {
        return $this->datafinal;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDatainicio($datainicio) {
        $this->datainicio = $datainicio;
    }

    function setDatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }


}
