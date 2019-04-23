<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semestre
 *
 * @author Helinho
 */
class Semestre {

    private $codigo;
    private $numero;
    private $periodo;
    private $dataInicio;
    private $datafim;
    private $estado="activo";

    function getCodigo() {
        return $this->codigo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDatafim() {
        return $this->datafim;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDatafim($datafim) {
        $this->datafim = $datafim;
    }

    public static function verificar($nome,$ano) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome,periodo from semestre");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['nome']) == 0 && strcmp($ano, $nomes['periodo']) == 0)
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function gravar(Semestre $sm) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $gravar = $conexao->prepare("INSERT INTO semestre(nome,dataInicio,dataFinal,estado,periodo) VALUES(:nome,:final,:inicio,:estado,:per)");
        $gravar->bindValue(":nome", $sm->getNumero());
        $gravar->bindValue(":final", $sm->getDatafim());
        $gravar->bindValue(":inicio", $sm->getDatainicio());
        $gravar->bindValue(":estado", $sm->getEstado());
        $gravar->bindValue(":per", $sm->getPeriodo());
        $valor = Semestre::verificar($sm->getNumero(),$sm->getPeriodo());
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, semestre já cadastrado!')</script>";
        } else {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/disciplinas.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/disciplinas.php");
            }
        }
    }

}
