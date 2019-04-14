<?php

/**
 * Description of Usuario
 *
 * @author Helinho
 */
class Usuario {

    private $codigo;
    private $usuario;
    private $senha;
    private $painel;

    function getCodigo() {
        return $this->codigo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPainel() {
        return $this->painel;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPainel($painel) {
        $this->painel = $painel;
    }

}
