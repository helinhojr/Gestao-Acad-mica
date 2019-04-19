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
    private $email;
    private $status;
    function getEmail() {
        return $this->email;
    }

    function getStatus() {
        return $this->status;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setStatus($status) {
        $this->status = $status;
    }

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
