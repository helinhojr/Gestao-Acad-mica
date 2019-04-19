<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Secretario
 *
 * @author Helinho
 */
class Secretario {
    private $codigo;
    private $nome;
    private $dataDeNasc;
    private $email;
    private $user;
    private $senha;
    private $estado="activo";
    private $genero;
    private $numeroBI;
    private $endereco;
    
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

    function getDataDeNasc() {
        return $this->dataDeNasc;
    }

    function getEmail() {
        return $this->email;
    }

    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

    function getGenero() {
        return $this->genero;
    }

    function getNumeroBI() {
        return $this->numeroBI;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataDeNasc($dataDeNasc) {
        $this->dataDeNasc = $dataDeNasc;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setNumeroBI($numeroBI) {
        $this->numeroBI = $numeroBI;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public static function gravar(Secretario $sec) {
            require_once '../controller/conexao.php';
            $conexao = conectar();
            $gravar = $conexao->prepare("INSERT INTO secretario(nome,estado,nascimento,user,bi,endereco,senha,genero,email) VALUES(:nome,:estado,:data,:user,:bi,:endereco,:senha,:genero,:email)");
            $gravar->bindValue(":nome", $sec->getNome());
            $gravar->bindValue(":estado",$sec->getEstado());
            $gravar->bindValue(":data",$sec->getDataDeNasc());
            $gravar->bindValue(":endereco",$sec->getEndereco());
            $gravar->bindValue(":email",$sec->getEmail());
            $gravar->bindValue(":user",$sec->getUser());
            $gravar->bindValue(":senha",$sec->getSenha());
            $gravar->bindValue(":bi",$sec->getNumeroBI());
            $gravar->bindValue(":genero",$sec->getGenero());
            if ($gravar->execute()) {
                $us=$sec->getUser();
                $resultado=$conexao->prepare("SELECT codigo FROM professor WHERE user=$us");
                while ($lin=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $sec->setCodigo($lin['codigo']); 
                }
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/secretarios.php");
                return $sec;
            }else{
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/secretarios.php");
            }
        }

}
