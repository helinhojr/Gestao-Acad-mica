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

    public function __toString() {
        return $this->$nome;
    }

    public static function verificar($nome, $ano, $dir) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome,ano from turma where nome=:nome and ano=:ano");
        $niveis->bindValue(":nome", $nome);
        $niveis->bindValue(":ano", $ano);
        $dirs = $conexao->prepare("select director from turma where director=:dir");
        $dirs->bindValue(":dir", $dir);
        $dirs->execute();
        if ($niveis->rowCount() > 0) {
            return 0;
        } else if ($dirs->rowCount() < 0) {
            return 1;
        } else{
            return 2;
        }
    }

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from turma");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function buscarPrT($prof) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select turma.nome as a,disciplina.nome as c,discturmpro.turma as tr,disc,nivel from discturmpro join disciplina on disc=disciplina.codigo join turma on turma=turma.codigo  where professor=:pro");
        $busca->bindValue(":pro", $prof);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function buscarPrTE($prof) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select turma.nome as a,disciplina.nome as c,discturmpro.turma,disc,nivel,estudante.nome as d,estudante.codigo as e from discturmpro join disciplina on disc=disciplina.codigo join turma on turma=turma.codigo join turma_est on turma.codigo=turma_est.turma join estudante on turma_est.estudante=estudante.codigo where professor=:pro");
        $busca->bindValue(":pro", $prof);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function buscarNumero($prof) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $ano=date("Y");
        $busca = $conexao->prepare("select * turma_est where turma=:tr and ano=:an");
        $busca->bindValue(":tr", $prof);
        $busca->bindValue(":an", $ano);
        $busca->execute();
        return count($busca->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function gravar(Turma $turma) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data = date("Y");
        $codigo = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
        $gravar = $conexao->prepare("INSERT INTO turma(codigo,nome,ano,director,nivel,sala) VALUES(:codigo,:nome,:ano,:director,:nivel,:sala)");
        $gravar->bindValue(":nome", $turma->getNome());
        $gravar->bindValue(":ano", $data);
        $gravar->bindValue(":director", $turma->getDirector());
        $gravar->bindValue(":nivel", $turma->getNivel());
        $gravar->bindValue(":sala", $turma->getSala());
        $gravar->bindValue(":codigo", $codigo);
        $valor = Turma::verificar($turma->getNome(), $data, $turma->getDirector());
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, turma já cadastrada!')</script>";
        } else if ($valor == 2) {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/turma.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/turma.php");
            }
        } else {
            echo "<script>alert('Impossível fazer a gravação, Este professor já é director de uma turma!')</script>";
        }
    }

}
