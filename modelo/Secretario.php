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
    private $estado = "activo";
    private $genero;
    private $numeroBI;
    private $endereco;
    private $foto;

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

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

    public static function buscarEst($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from secretario where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
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

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from secretario where estado='activo'");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function gravar(Secretario $sec) {
        require_once '../controller/conexao.php';
        require_once '../modelo/Usuario.php';
        $conexao = conectar();
        $senha = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
        $gravar = $conexao->prepare("INSERT INTO secretario(codigo,nome,estado,nascimento,user,bi,endereco,senha,genero,email,foto) VALUES(:codigo,:nome,:estado,:data,:user,:bi,:endereco,:senha,:genero,:email,:foto)");
        $gravar->bindValue(":codigo", $senha);
        $gravar->bindValue(":nome", $sec->getNome());
        $gravar->bindValue(":estado", $sec->getEstado());
        $gravar->bindValue(":data", $sec->getDataDeNasc());
        $gravar->bindValue(":endereco", $sec->getEndereco());
        $gravar->bindValue(":email", $sec->getEmail());
        $gravar->bindValue(":user", $sec->getEmail());
        $gravar->bindValue(":senha", $senha);
        $gravar->bindValue(":bi", $sec->getNumeroBI());
        $gravar->bindValue(":genero", $sec->getGenero());
        $gravar->bindValue(":foto", $sec->getFoto());
        $usuario = new Usuario();
        $usuario->setPainel("sec");
        $usuario->setUsuario($sec->getEmail());
        $usuario->setSenha($senha);
        $usuario->setStatus($sec->getEstado());
        $usuario->setCodUs($sec->senha);
        if (Usuario::gravar($usuario) == true) {
            if ($gravar->execute()) {
                $us = $sec->getUser();
                $resultado = $conexao->prepare("SELECT codigo FROM secretario WHERE user=$us");
                while ($lin = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $sec->setCodigo($lin['codigo']);
                }
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/secretarios.php");
                return $sec;
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/secretarios.php");
            }
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação, Usuário já existente!')</script>";
        }
    }

    public static function eliminar($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("update secretario set estado=:in where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->bindValue(":in", "inactivo");
        $buscar = $conexao->prepare("update usuario set status=:in where codigoUs=:cod");
        $buscar->bindValue(":cod", $cod);
        $buscar->bindValue(":in", "inactivo");
        if ($busca->execute() && $buscar->execute()) {
            echo "<script>alert('Eliminado com Sucesso!')</script>";
            echo "<script>window.location='../paginas/secretarios.php'</script>";
        } else {
            echo "<script>alert('Não foi possível eliminar!')</script>";
            header("../paginas/secretarios.php");
        }
    }

}
