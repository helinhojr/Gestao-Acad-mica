<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turma
 *
 * @author Helinho
 */
class Turma {
    private $nome;
    private $sala;
    private $director;
    private $ano;
    private $nivel;
    private $vagas;

    function getNome() {
        return $this->nome;
    }

    function getSala() {
        return $this->sala;
    }

    function getDirector() {
        return $this->director;
    }

    function getAno() {
        return $this->ano;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getVagas() {
        return $this->vagas;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSala($sala) {
        $this->sala = $sala;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setVagas($vagas) {
        $this->vagas = $vagas;
    }

    public function __toString() {
        return $this->$nome;
    }

}
