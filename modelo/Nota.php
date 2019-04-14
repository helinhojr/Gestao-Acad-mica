<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nota
 *
 * @author Helinho
 */
class Nota {
    private $disciplina;
    private $estudante;
    private $valores;
    private $mediasemestral;
    
    function getDisciplina() {
        return $this->disciplina;
    }

    function getEstudante() {
        return $this->estudante;
    }

    function getValores() {
        return $this->valores;
    }

    function getMediasemestral() {
        return $this->mediasemestral;
    }

    function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    function setEstudante($estudante) {
        $this->estudante = $estudante;
    }

    function setValores($valores) {
        $this->valores = $valores;
    }

    function setMediasemestral($mediasemestral) {
        $this->mediasemestral = $mediasemestral;
    }


}
