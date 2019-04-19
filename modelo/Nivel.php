<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nivel
 *
 * @author Helinho
 */
class Nivel {
    private $nome;
    private $codigo;
    private $status;
    private $data;
    function getStatus() {
        return $this->status;
    }

    function getData() {
        return $this->data;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setData($data) {
        $this->data = $data;
    }

        function getNome() {
        return $this->nome;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }


}
