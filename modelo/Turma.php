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
    
    public static function verificar($nome,$ano) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome,ano from turma");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['nome'])==0 && strcmp($ano, $nomes['ano'])==0)
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function gravar(Turma $turma) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data = date("d/m/Y");
        $gravar = $conexao->prepare("INSERT INTO turma(nome,ano,vagas,director,nivel,sala) VALUES(:nome,:ano,:vagas,:director,:nivel,:sala)");
        $gravar->bindValue(":nome", $turma->getNome());
        $gravar->bindValue(":ano", $data);
        $gravar->bindValue(":vagas", $turma->getVagas());
        $gravar->bindValue(":director", $turma->getDirector());
        $gravar->bindValue(":nivel", $turma->getNivel());
        $gravar->bindValue(":sala", $turma->getSala());
        $valor = Turma::verificar($turma->getNome(),$data);
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, turma já cadastrada!')</script>";
        } else {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/turma.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/turma.php");
            }
        }
    }
}
