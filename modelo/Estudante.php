<?php
/**
 * Description of Estudante
 *
 * @author Helinho
 */
class Estudante {
    private $codigo;
    private $nome;
    private $nomePai;
    private $nomeMae;
    private $email;
    private $contacto;
    private $contactoEnc;
    private $dataDeNascimento;
    private $endereco;
    private $genero;
    private $regime;
    private $foto;
    private $senha;
    private $estado;
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getNomePai() {
        return $this->nomePai;
    }

    function getNomeMae() {
        return $this->nomeMae;
    }

    function getEmail() {
        return $this->email;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getContactoEnc() {
        return $this->contactoEnc;
    }

    function getDataDeNascimento() {
        return $this->dataDeNascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getGenero() {
        return $this->genero;
    }

    function getRegime() {
        return $this->regime;
    }

    function getFoto() {
        return $this->foto;
    }

    function getSenha() {
        return $this->senha;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
    }

    function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setContactoEnc($contactoEnc) {
        $this->contactoEnc = $contactoEnc;
    }

    function setDataDeNascimento($dataDeNascimento) {
        $this->dataDeNascimento = $dataDeNascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setRegime($regime) {
        $this->regime = $regime;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
