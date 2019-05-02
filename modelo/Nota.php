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

    public static function adicionarNota($estudante,$turma,$semestre){
        require_once '../controller/conexao.php';
        $conexao= conectar();
        $nivel=$conexao->prepare("select nivel from turma where codigo=:cod");
        $nivel->bindValue(":cod", $turma);
        $nivel->execute();
        
        $disciplinas=$conexao->prepare("select * from nivel_disciplina where nivel=:nivel");
        $disciplinas->bindValue(":nivel", $nivel->fetchAll(PDO::FETCH_ASSOC)[0]['nivel']);
        $disciplinas->execute();
        
        foreach ($disciplinas->fetchAll(PDO::FETCH_ASSOC) as $disciplina){
            $notas=$conexao->prepare("Insert into notas(est,disc,semestre) values (:est,:disc,:sem)");
            $notas->bindValue(":est", $estudante);
            $notas->bindValue(":disc", $disciplina['disc']);
            $notas->bindValue(":sem", $semestre);
            $notas->execute();
        }
    }
}
