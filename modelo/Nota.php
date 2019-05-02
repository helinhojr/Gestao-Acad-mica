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

    private $codigo;
    private $disciplina;
    private $estudante;
    private $semestre;

    function getDisciplina() {
        return $this->disciplina;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function getEstudante() {
        return $this->estudante;
    }

    function getValores() {
        return $this->valores;
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

    function getSemestre() {
        return $this->semestre;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    public static function adicionarNota($estudante, $turma, $semestre) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $nivel = $conexao->prepare("select nivel from turma where codigo=:cod");
        $nivel->bindValue(":cod", $turma);
        $nivel->execute();
        $nivT = 0;
        foreach ($nivel->fetchAll(PDO::FETCH_ASSOC) as $n) {
            $nivT = $n['nivel'];
        }
        $disciplinas = $conexao->prepare("select * from nivel_disciplina where nivel=:nivel");
        $disciplinas->bindValue(":nivel", $nivT);
        $disciplinas->execute();
        $codigo = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
        $disciplina = $disciplinas->fetchAll(PDO::FETCH_ASSOC);
        $notas = $conexao->prepare("Insert into notas(codigo,est,disc,semestre,ano) values (:codigo,:est,:disc,:sem,:ano)");
        foreach ($disciplina as $discipl) {
            $notas->bindValue(":est", $estudante);
            $notas->bindValue(":codigo", $codigo);
            $notas->bindValue(":disc", $discipl['disc']);
            $notas->bindValue(":sem", $semestre);
            $notas->bindValue(":ano", date("Y"));
            $notas->execute();
            Nota::adicionarValores($codigo, $estudante, $discipl['disc'], $turma);
            unset($_SESSION['turma']);
            unset($_SESSION['estudante']);
        }
    }

    public static function adicionarValores($notas, $est, $disc, $turma) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $testes = $conexao->prepare("select testes from discturmpro where turma=:tr and disc=:ds and ano=:an");
        $testes->bindValue(":tr", $turma);
        $testes->bindValue(":ds", $disc);
        $testes->bindValue(":an", date("Y"));
        $testes->execute();
        $nrTeste = 0;
        foreach ($testes->fetchAll(PDO::FETCH_ASSOC) as $teste) {
            $nrTeste = $teste['testes'];
        }
        for ($i = 0; $i < $nrTeste; $i++) {
            $nota = $conexao->prepare("insert into nota(notas,numero) values(:notas,:numero)");
            $nota->bindValue(":notas", $notas);
            $notaaa = "Teste " . ($i + 1);
            $nota->bindValue(":numero", $notaaa);
            $nota->execute();
        }
    }

}
